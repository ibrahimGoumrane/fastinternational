<?php
class BaseController {
    protected $translations;
    protected $lang;
    
    public function __construct($translations, $lang) {
        $this->translations = $translations;
        $this->lang = $lang;
    }
    
    protected function translate($key) {
        return $this->translations[$key] ?? $key;
    }
    
    protected function render($view, $data = []) {
        // Make translations and lang available to all views
        $data['t'] = $this->translations;
        $data['lang'] = $this->lang;
        $data['translate'] = [$this, 'translate'];
        
        // Extract data to make variables available in view
        extract($data);
        
        include APP_PATH . '/views/layout/header.php';
        include APP_PATH . '/views/' . $view . '.php';
        include APP_PATH . '/views/layout/footer.php';
    }
}
?>
