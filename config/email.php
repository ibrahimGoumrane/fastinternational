<?php
/**
 * Configuration Email pour FAST International - Production
 */

$emailConfig = [
    // SMTP Configuration
    'host' => 'mail.formafast.com',
    'port' => 25,
    'smtp_auth' => true,
    'username' => 'mail@formafast.com',
    'password' => 'Mail.Formafast.216',
    'encryption' => '',  // No encryption for port 25
    
    // Email addresses
    'from_email' => 'mail@formafast.com',
    'from_name' => 'FAST International',
    'admin_emails' => ['mail@formafast.com', 'mizoxrizox@gmail.com'],
    'reply_to' => 'mail@formafast.com',
    
    // Templates
    'templates' => [
        'admin_subject' => 'Nouveau message - FAST International: {subject}',
        'user_subject' => 'Confirmation de reception - FAST International',
        'signature' => 'FAST International - Formation Conseil Developpement | mail@formafast.com'
    ]
];
?>
