<?php
/**
 * Configuration Email pour FAST International - Production
 */

$emailConfig = [
    // SMTP Configuration
    'host' => 'mail.formafast.com',
    'port' => 587,
    'smtp_auth' => true,
    'username' => 'mail@formafast.com',
    'password' => 'Mail.Formafast.216',
    'encryption' => 'tls',  // TLS encryption
    
    // Email addresses
    'from_email' => 'mail@formafast.com',
    'from_name' => 'FAST International',
    'admin_emails' => ['contact@fastinternational.com', 'mizoxrizox@gmail.com'],
    'reply_to' => 'mail@formafast.com',
    
    // Templates
    'templates' => [
        'admin_subject' => 'Nouveau message - FAST International: {subject}',
        'user_subject' => 'Confirmation de reception - FAST International',
        'signature' => 'FAST International - Formation Conseil Developpement | mail@formafast.com'
    ],
    
    // reCAPTCHA Configuration
    // Get your keys at: https://www.google.com/recaptcha/admin/create
    // Select reCAPTCHA v2 "I'm not a robot" Checkbox
    'recaptcha_site_key' => '6Lfe4jAsAAAAAE1A23dYGNGzErvCwwndPuA_vPlv',
    'recaptcha_secret_key' => '6Lfe4jAsAAAAABHBk5R3p9wFDESyz5JdsZoj14zS'
];
?>
