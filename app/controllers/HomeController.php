<?php
require_once APP_PATH . '/controllers/BaseController.php';
require_once APP_PATH . '/models/ContactModel.php';

class HomeController extends BaseController {
    private $contactModel;
    
    public function __construct($translations, $lang) {
        parent::__construct($translations, $lang);
        $this->contactModel = new ContactModel();
    }
    
    public function index() {
        $data = [
            'page_title' => $this->translate('company_name'),
            'meta_description' => $this->translate('hero_subtitle'),
            'contact_message' => '',
            'contact_errors' => [],
            'form_data' => []
        ];
        
        // Handle contact form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
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
        
        $this->render('home', $data);
    }
}
?>
