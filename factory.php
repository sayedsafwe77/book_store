<?php

// Step 1: Create a Notification Interface

interface NotificationService {
    public function send(string $to, string $message): bool;
    public function validateRecipient(string $to): bool;
}



// Step 2: Create Concrete Notification Classes
class EmailNotification implements NotificationService {
    private $smtpServer;
    private $smtpPort;
    private $senderEmail;

    public function __construct(string $smtpServer, int $smtpPort, string $senderEmail) {
        $this->smtpServer = $smtpServer;
        $this->smtpPort = $smtpPort;
        $this->senderEmail = $senderEmail;
    }

    public function send(string $to, string $message): bool {
        // Simulate sending an email
        echo "Sending email to {$to} from {$this->senderEmail} via {$this->smtpServer}:{$this->smtpPort}\n";
        echo "Message: {$message}\n";
        return true;
    }

    public function validateRecipient(string $to): bool {
        // Simple email validation
        return filter_var($to, FILTER_VALIDATE_EMAIL) !== false;
    }
}

class SMSNotification implements NotificationService {
    private $apiKey;
    private $sender;

    public function __construct(string $apiKey, string $sender) {
        $this->apiKey = $apiKey;
        $this->sender = $sender;
    }

    public function send(string $to, string $message): bool {
        // Simulate sending an SMS
        echo "Sending SMS to {$to} from {$this->sender} using API key: {$this->apiKey}\n";
        echo "Message: {$message}\n";
        return true;
    }

    public function validateRecipient(string $to): bool {
        // Simple phone number validation (very basic)
        return preg_match('/^\+?[1-9]\d{9,14}$/', $to);
    }
}

class PushNotification implements NotificationService {
    private $appId;
    private $appSecret;

    public function __construct(string $appId, string $appSecret) {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
    }

    public function send(string $to, string $message): bool {
        // Simulate sending a push notification
        echo "Sending push notification to device ID: {$to} using App ID: {$this->appId}\n";
        echo "Message: {$message}\n";
        return true;
    }

    public function validateRecipient(string $to): bool {
        // Simple device token validation (just checking if not empty)
        return !empty($to) && strlen($to) > 10;
    }
}

// Step 3: Create the Notification Factory
class NotificationFactory {
    public static function createNotification(string $channel): NotificationService {
        switch ($channel) {
            case 'email':
                return new EmailNotification('smtp.example.com', 587, 'noreply@example.com');
            case 'sms':
                return new SMSNotification('sms_api_key_456', 'COMPANY');
            case 'push':
                return new PushNotification('push_app_id_789', 'push_app_secret_789');
            default:
                throw new Exception("Unsupported notification channel: {$channel}");
        }
    }
}



// Step 4: Usage Example
try {
    // Client code
    $message = "Your order #12345 has been processed successfully!";

    // Send an email notification
    $emailService = NotificationFactory::createNotification('email');


    if ($emailService->validateRecipient('customer@example.com')) {
        $emailService->send('customer@example.com', $message);
    }

    // Send an SMS notification
    $smsService = NotificationFactory::createNotification('sms');
    if ($smsService->validateRecipient('+1234567890')) {
        $smsService->send('+1234567890', $message);
    }

    // Send a push notification
    $pushService = NotificationFactory::createNotification('push');
    if ($pushService->validateRecipient('device_token_123456789')) {
        $pushService->send('device_token_123456789', $message);
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
