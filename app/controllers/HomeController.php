<?php
require_once APP_PATH . '/controllers/BaseController.php';
require_once APP_PATH . '/models/ContactModel.php';

class HomeController extends BaseController {
    private $contactModel;
    private $emailConfig;
    
    public function __construct($translations, $lang) {
        parent::__construct($translations, $lang);
        $this->contactModel = new ContactModel();
        
        // Load email config for reCAPTCHA keys
        global $emailConfig;
        $this->emailConfig = $emailConfig;
    }
    
    /**
     * Verify reCAPTCHA response with Google
     */
    private function verifyRecaptcha($recaptchaResponse) {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $this->emailConfig['recaptcha_secret_key'],
            'response' => $recaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ];
        
        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        
        if ($result === false) {
            return false;
        }
        
        $resultJson = json_decode($result, true);
        return isset($resultJson['success']) && $resultJson['success'] === true;
    }
    
    public function index() {
        $data = [
            'page_title' => $this->translate('company_name'),
            'meta_description' => $this->translate('hero_subtitle'),
            'contact_message' => '',
            'contact_errors' => [],
            'form_data' => [],
            'recaptcha_site_key' => $this->emailConfig['recaptcha_site_key']
        ];
        
        // Handle contact form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
            // Verify reCAPTCHA first
            $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
            
            if (empty($recaptchaResponse)) {
                $data['contact_errors'] = ['recaptcha' => $this->translate('recaptcha_required') ?? 'Please complete the reCAPTCHA verification.'];
                $data['form_data'] = $_POST;
            } elseif (!$this->verifyRecaptcha($recaptchaResponse)) {
                $data['contact_errors'] = ['recaptcha' => $this->translate('recaptcha_failed') ?? 'reCAPTCHA verification failed. Please try again.'];
                $data['form_data'] = $_POST;
            } else {
                $result = $this->contactModel->processContactForm($_POST);
                
                if ($result['success']) {
                    $data['contact_message'] = $this->translate('success_message') ?? 'Votre message a été envoyé avec succès!';
                    $data['contact_message_type'] = 'success';
                    $data['form_data'] = []; // Clear form on success
                } else {
                    $data['contact_errors'] = $result['errors'];
                    $data['form_data'] = $_POST; // Keep form data for user convenience
                }
            }
        }
        
        $this->render('home', $data);
    }
}
?>
