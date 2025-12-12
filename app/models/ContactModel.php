<?php
/**
 * Contact Model - Handles contact form processing and email sending
 */

// Load PHPMailer
require_once __DIR__ . '/../../vendor/PHPMailer.php';
require_once __DIR__ . '/../../vendor/SMTP.php';
require_once __DIR__ . '/../../vendor/Exception.php';

// Load email config
require_once __DIR__ . '/../../config/email.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactModel {
    
    private $config;
    private $logFile;
    
    public function __construct() {
        global $emailConfig;
        $this->config = $emailConfig;
        $this->logFile = __DIR__ . '/../../logs/email.log';
        
        // Ensure logs directory exists
        $logDir = dirname($this->logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        // Log initialization
        $this->log("ContactModel initialized");
    }
    
    /**
     * Log messages to file
     */
    private function log($message) {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] $message" . PHP_EOL;
        file_put_contents($this->logFile, $logMessage, FILE_APPEND | LOCK_EX);
    }
    
    /**
     * Process the contact form submission
     */
    public function processContactForm($postData) {
        $this->log("=== START processContactForm ===");
        $this->log("POST data received: " . print_r($postData, true));
        
        // Validate required fields
        $errors = $this->validateForm($postData);
        
        if (!empty($errors)) {
            $this->log("Validation errors: " . implode(", ", $errors));
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        
        $this->log("Validation passed");
        
        // Prepare email data - map form fields correctly
        $emailData = [
            'name' => $this->sanitize($postData['name'] ?? ''),
            'title' => $this->sanitize($postData['title'] ?? ''),
            'company' => $this->sanitize($postData['company'] ?? ''),
            'email' => $this->sanitize($postData['email'] ?? ''),
            'address' => $this->sanitize($postData['address'] ?? ''),
            'phone' => $this->sanitize($postData['phone'] ?? ''),
            'fax' => $this->sanitize($postData['fax'] ?? ''),
            'interest' => $this->sanitize($postData['interest'] ?? ''),
            'comments' => $this->sanitize($postData['comments'] ?? ''),
        ];
        
        $this->log("Email data prepared: " . print_r($emailData, true));
        
        // Send email to admin
        $adminResult = $this->sendAdminNotification($emailData);
        $this->log("Admin notification result: " . ($adminResult ? 'SUCCESS' : 'FAILED'));
        
        // Send confirmation to user
        $userResult = $this->sendUserConfirmation($emailData);
        $this->log("User confirmation result: " . ($userResult ? 'SUCCESS' : 'FAILED'));
        
        if ($adminResult) {
            $this->log("=== END processContactForm - SUCCESS ===");
            return [
                'success' => true,
                'message' => 'Your message has been sent successfully!'
            ];
        } else {
            $this->log("=== END processContactForm - FAILED ===");
            return [
                'success' => false,
                'errors' => ['Failed to send email. Please try again later.']
            ];
        }
    }
    
    /**
     * Validate form data
     */
    private function validateForm($data) {
        $errors = [];
        
        // Required fields
        if (empty($data['name'])) {
            $errors[] = 'Name is required';
        }
        
        if (empty($data['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Please enter a valid email address';
        }
        
        return $errors;
    }
    
    /**
     * Sanitize input
     */
    private function sanitize($input) {
        return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
    }
    
    /**
     * Send notification email to admin
     */
    private function sendAdminNotification($data) {
        $this->log("Sending admin notification...");
        
        $subject = "New Contact Form Submission - FAST International";
        if (!empty($data['interest'])) {
            $subject .= " - " . $data['interest'];
        }
        
        $body = $this->buildAdminEmailBody($data);
        
        // Send to all admin emails
        $success = true;
        foreach ($this->config['admin_emails'] as $adminEmail) {
            $this->log("Sending to admin: $adminEmail");
            $result = $this->sendWithPHPMailer($adminEmail, $subject, $body, $data['email'], $data['name']);
            if (!$result) {
                $success = false;
                $this->log("Failed to send to: $adminEmail");
            } else {
                $this->log("Successfully sent to: $adminEmail");
            }
        }
        
        return $success;
    }
    
    /**
     * Send confirmation email to user
     */
    private function sendUserConfirmation($data) {
        $this->log("Sending user confirmation to: " . $data['email']);
        
        $subject = "Thank you for contacting FAST International";
        $body = $this->buildUserConfirmationBody($data);
        
        return $this->sendWithPHPMailer($data['email'], $subject, $body);
    }
    
    /**
     * Build admin email body
     */
    private function buildAdminEmailBody($data) {
        $html = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #00539B, #8DC63F); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
                .field { margin-bottom: 15px; padding: 10px; background: white; border-radius: 5px; }
                .field-label { font-weight: bold; color: #00539B; }
                .footer { background: #333; color: white; padding: 15px; text-align: center; border-radius: 0 0 10px 10px; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>New Contact Form Submission</h2>
                </div>
                <div class="content">
                    <div class="field">
                        <span class="field-label">Name:</span><br>
                        ' . htmlspecialchars($data['name']) . '
                    </div>
                    <div class="field">
                        <span class="field-label">Title:</span><br>
                        ' . htmlspecialchars($data['title'] ?: 'Not provided') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Company:</span><br>
                        ' . htmlspecialchars($data['company'] ?: 'Not provided') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Email:</span><br>
                        <a href="mailto:' . htmlspecialchars($data['email']) . '">' . htmlspecialchars($data['email']) . '</a>
                    </div>
                    <div class="field">
                        <span class="field-label">Address:</span><br>
                        ' . htmlspecialchars($data['address'] ?: 'Not provided') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Phone:</span><br>
                        ' . htmlspecialchars($data['phone'] ?: 'Not provided') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Fax:</span><br>
                        ' . htmlspecialchars($data['fax'] ?: 'Not provided') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Interest:</span><br>
                        ' . htmlspecialchars($data['interest'] ?: 'Not specified') . '
                    </div>
                    <div class="field">
                        <span class="field-label">Comments/Message:</span><br>
                        ' . nl2br(htmlspecialchars($data['comments'] ?: 'No message')) . '
                    </div>
                </div>
                <div class="footer">
                    <p>This email was sent from the FAST International website contact form.</p>
                    <p>Submitted on: ' . date('F j, Y \a\t g:i A') . '</p>
                </div>
            </div>
        </body>
        </html>';
        
        return $html;
    }
    
    /**
     * Build user confirmation email body
     */
    private function buildUserConfirmationBody($data) {
        $html = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #00539B, #8DC63F); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .header h1 { margin: 0; font-size: 24px; }
                .content { background: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
                .footer { background: #333; color: white; padding: 20px; text-align: center; border-radius: 0 0 10px 10px; font-size: 12px; }
                .highlight { color: #8DC63F; font-weight: bold; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>FAST International</h1>
                    <p>Thank You for Contacting Us!</p>
                </div>
                <div class="content">
                    <p>Dear <strong>' . htmlspecialchars($data['name']) . '</strong>,</p>
                    
                    <p>Thank you for reaching out to <span class="highlight">FAST International</span>. We have received your message and appreciate your interest in our services.</p>
                    
                    <p>Our team will review your inquiry and get back to you as soon as possible, typically within 24-48 business hours.</p>
                    
                    <p><strong>Here\'s a summary of your submission:</strong></p>
                    <ul>
                        <li><strong>Interest:</strong> ' . htmlspecialchars($data['interest'] ?: 'General Inquiry') . '</li>
                        <li><strong>Message:</strong> ' . htmlspecialchars(substr($data['comments'], 0, 100)) . (strlen($data['comments']) > 100 ? '...' : '') . '</li>
                    </ul>
                    
                    <p>If you have any urgent questions, please don\'t hesitate to contact us directly.</p>
                    
                    <p>Best regards,<br>
                    <strong>The FAST International Team</strong></p>
                </div>
                <div class="footer">
                    <p>FAST International - Your Trusted Partner in Freight and Logistics</p>
                    <p>&copy; ' . date('Y') . ' FAST International. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>';
        
        return $html;
    }
    
    /**
     * Send email using PHPMailer
     */
    private function sendWithPHPMailer($to, $subject, $body, $replyTo = null, $replyToName = null) {
        $this->log("sendWithPHPMailer called - To: $to, Subject: $subject");
        
        try {
            $mail = new PHPMailer(true);
            
            // Enable verbose debug output
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Debugoutput = function($str, $level) {
                $this->log("PHPMailer Debug [$level]: $str");
            };
            
            // Server settings
            $mail->isSMTP();
            $mail->Host = $this->config['host'];
            $mail->SMTPAuth = $this->config['smtp_auth'];
            $mail->Username = $this->config['username'];
            $mail->Password = $this->config['password'];
            $mail->SMTPSecure = $this->config['encryption'];
            $mail->Port = $this->config['port'];
            
            // Set timeout
            $mail->Timeout = 30;
            
            $this->log("SMTP Config - Host: {$this->config['host']}, Port: {$this->config['port']}, Auth: " . ($this->config['smtp_auth'] ? 'Yes' : 'No'));
            
            // Recipients
            $mail->setFrom($this->config['from_email'], $this->config['from_name']);
            $mail->addAddress($to);
            
            // Reply-To
            if ($replyTo) {
                $mail->addReplyTo($replyTo, $replyToName ?? '');
            }
            
            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $body));
            
            $this->log("Attempting to send email...");
            $result = $mail->send();
            $this->log("Email sent successfully to: $to");
            
            return true;
            
        } catch (Exception $e) {
            $this->log("PHPMailer Exception: " . $e->getMessage());
            $this->log("Mailer Error: " . (isset($mail) ? $mail->ErrorInfo : 'Unknown'));
            return false;
        } catch (\Exception $e) {
            $this->log("General Exception: " . $e->getMessage());
            return false;
        }
    }
}
