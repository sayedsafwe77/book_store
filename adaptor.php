<?php

// Step 1: Define the target interface that our application expects
interface PaymentProcessor {
    public function processPayment(float $amount, array $paymentDetails): array;
    public function refundPayment(string $transactionId, float $amount): bool;
    public function getTransactionStatus(string $transactionId): string;
}


// Step 2: Existing third-party payment services with incompatible interfaces

// PayPal SDK (third-party class that we can't modify)
class PayPalAPI {
    public function __construct(private string $apiKey, private string $secret) {}

    public function makePayment(float $amount, string $currency, array $sourceDetails): string {
        // Simulate PayPal API call
        echo "PayPal: Processing payment of {$amount} {$currency}\n";

        // In a real implementation, this would call the PayPal API
        return 'PP-' . uniqid();
    }

    public function refund(string $paymentId, float $amount): bool {
        echo "PayPal: Refunding payment {$paymentId} for amount {$amount}\n";
        return true;
    }

    public function checkStatus(string $paymentId): string {
        $statuses = ['completed', 'pending', 'failed'];
        $status = $statuses[array_rand($statuses)];
        echo "PayPal: Transaction {$paymentId} status is {$status}\n";
        return $status;
    }
}

// Stripe SDK (another third-party class with a different interface)
class StripeAPI {
    public function __construct(private string $secretKey) {}

    public function createCharge(float $amountInCents, string $currency, array $cardDetails, array $metadata = []): array {
        // Convert dollars to cents for Stripe
        $amount = $amountInCents * 100;

        echo "Stripe: Creating charge of {$amount} cents in {$currency}\n";

        // In a real implementation, this would call the Stripe API
        return [
            'id' => 'ch_' . uniqid(),
            'amount' => $amount,
            'currency' => $currency,
            'status' => 'succeeded'
        ];
    }

    public function issueRefund(string $chargeId, float $amountInCents = null): array {
        $amount = $amountInCents ? $amountInCents * 100 : null;
        $amountText = $amount ? " for amount {$amount} cents" : " (full amount)";

        echo "Stripe: Refunding charge {$chargeId}{$amountText}\n";

        return [
            'id' => 're_' . uniqid(),
            'charge' => $chargeId,
            'amount' => $amount,
            'status' => 'succeeded'
        ];
    }

    public function retrieveCharge(string $chargeId): array {
        $statuses = ['succeeded', 'pending', 'failed'];
        $status = $statuses[array_rand($statuses)];

        echo "Stripe: Retrieved charge {$chargeId} with status {$status}\n";

        return [
            'id' => $chargeId,
            'status' => $status
        ];
    }
}

// Square SDK (another third-party payment gateway)
class SquareAPI {
    public function __construct(private string $accessToken, private string $locationId) {}

    public function takePayment(array $cardData, float $amountMoney, string $currencyCode): array {
        echo "Square: Taking payment of {$amountMoney} {$currencyCode} at location {$this->locationId}\n";

        return [
            'payment_id' => 'sq_' . uniqid(),
            'amount_money' => $amountMoney,
            'currency' => $currencyCode,
            'status' => 'COMPLETED'
        ];
    }

    public function returnPayment(string $paymentId, float $amountMoney): array {
        echo "Square: Returning payment {$paymentId} for amount {$amountMoney}\n";

        return [
            'refund_id' => 'sqr_' . uniqid(),
            'payment_id' => $paymentId,
            'amount_money' => $amountMoney,
            'status' => 'COMPLETED'
        ];
    }

    public function getPaymentById(string $paymentId): array {
        $statuses = ['COMPLETED', 'PENDING', 'FAILED'];
        $status = $statuses[array_rand($statuses)];

        echo "Square: Payment {$paymentId} has status {$status}\n";

        return [
            'payment_id' => $paymentId,
            'status' => $status
        ];
    }
}

$adaptor = PaymentGatewayAdapter::create('paypal',['api_key' => '','secret' => '']);

// Step 3: Create a single unified adapter for all payment gateways
class PaymentGatewayAdapter implements PaymentProcessor {
    private $gateway;
    private string $gatewayType;

    // Factory method to create the appropriate gateway instance
    public static function create(string $gatewayType, array $config): PaymentGatewayAdapter {
        return new self($gatewayType, $config);
    }

    private function __construct(string $gatewayType, array $config) {
        $this->gatewayType = $gatewayType;

        // Initialize the appropriate gateway based on type
        switch ($gatewayType) {
            case 'paypal':
                $this->gateway = new PayPalAPI(
                    $config['api_key'] ?? '',
                    $config['secret'] ?? ''
                );
                break;

            case 'stripe':
                $this->gateway = new StripeAPI(
                    $config['secret_key'] ?? ''
                );
                break;

            case 'square':
                $this->gateway = new SquareAPI(
                    $config['access_token'] ?? '',
                    $config['location_id'] ?? ''
                );
                break;

            default:
                throw new \InvalidArgumentException("Unsupported payment gateway: {$gatewayType}");
        }
    }

    public function processPayment(float $amount, array $paymentDetails): array {
        // Delegate to the appropriate gateway method based on gateway type
        switch ($this->gatewayType) {
            case 'paypal':
                $currency = $paymentDetails['currency'] ?? 'USD';
                $transactionId = $this->gateway->makePayment($amount, $currency, $paymentDetails);
                $status = $this->mapPayPalStatus($this->gateway->checkStatus($transactionId));

                return [
                    'transaction_id' => $transactionId,
                    'amount' => $amount,
                    'currency' => $currency,
                    'status' => $status
                ];

            case 'stripe':
                $currency = $paymentDetails['currency'] ?? 'USD';
                $cardDetails = [
                    'number' => $paymentDetails['card_number'] ?? '',
                    'exp_month' => $paymentDetails['exp_month'] ?? '',
                    'exp_year' => $paymentDetails['exp_year'] ?? '',
                    'cvc' => $paymentDetails['cvc'] ?? ''
                ];

                $response = $this->gateway->createCharge($amount, $currency, $cardDetails);

                return [
                    'transaction_id' => $response['id'],
                    'amount' => $amount,
                    'currency' => $currency,
                    'status' => $this->mapStripeStatus($response['status'])
                ];

            case 'square':
                $currency = $paymentDetails['currency'] ?? 'USD';
                $cardData = [
                    'card_number' => $paymentDetails['card_number'] ?? '',
                    'expiration_date' => $paymentDetails['exp_month'] . '/' . $paymentDetails['exp_year'] ?? '',
                    'cvv' => $paymentDetails['cvc'] ?? ''
                ];

                $response = $this->gateway->takePayment($cardData, $amount, $currency);

                return [
                    'transaction_id' => $response['payment_id'],
                    'amount' => $amount,
                    'currency' => $currency,
                    'status' => $this->mapSquareStatus($response['status'])
                ];

            default:
                throw new \RuntimeException("Unsupported payment gateway: {$this->gatewayType}");
        }
    }

    public function refundPayment(string $transactionId, float $amount): bool {
        switch ($this->gatewayType) {
            case 'paypal':
                return $this->gateway->refund($transactionId, $amount);

            case 'stripe':
                $response = $this->gateway->issueRefund($transactionId, $amount);
                return $response['status'] === 'succeeded';

            case 'square':
                $response = $this->gateway->returnPayment($transactionId, $amount);
                return $response['status'] === 'COMPLETED';

            default:
                throw new \RuntimeException("Unsupported payment gateway: {$this->gatewayType}");
        }
    }

    public function getTransactionStatus(string $transactionId): string {
        switch ($this->gatewayType) {
            case 'paypal':
                $status = $this->gateway->checkStatus($transactionId);
                return $this->mapPayPalStatus($status);

            case 'stripe':
                $response = $this->gateway->retrieveCharge($transactionId);
                return $this->mapStripeStatus($response['status']);

            case 'square':
                $response = $this->gateway->getPaymentById($transactionId);
                return $this->mapSquareStatus($response['status']);

            default:
                throw new \RuntimeException("Unsupported payment gateway: {$this->gatewayType}");
        }
    }

    // Helper methods to map gateway-specific statuses to our standardized statuses
    private function mapPayPalStatus(string $paypalStatus): string {
        return match($paypalStatus) {
            'completed' => 'success',
            'pending' => 'pending',
            'failed' => 'failed',
            default => 'unknown'
        };
    }

    private function mapStripeStatus(string $stripeStatus): string {
        return match($stripeStatus) {
            'succeeded' => 'success',
            'pending' => 'pending',
            'failed' => 'failed',
            default => 'unknown'
        };
    }

    private function mapSquareStatus(string $squareStatus): string {
        return match($squareStatus) {
            'COMPLETED' => 'success',
            'PENDING' => 'pending',
            'FAILED' => 'failed',
            default => 'unknown'
        };
    }
}

// Step 4: Client code that uses the payment processor interface
class PaymentService {
    private PaymentProcessor $paymentProcessor;

    public function __construct(PaymentProcessor $paymentProcessor) {
        $this->paymentProcessor = $paymentProcessor;
    }

    public function makePayment(float $amount, array $paymentDetails): array {
        return $this->paymentProcessor->processPayment($amount, $paymentDetails);
    }

    public function refundTransaction(string $transactionId, float $amount): bool {
        return $this->paymentProcessor->refundPayment($transactionId, $amount);
    }

    public function checkTransactionStatus(string $transactionId): string {
        return $this->paymentProcessor->getTransactionStatus($transactionId);
    }
}

// Usage example
try {
    echo "=== PayPal Payment Example ===\n";

    // Create PayPal adapter using the unified adapter
    $paypalAdapter = PaymentGatewayAdapter::create('paypal', [
        'api_key' => 'paypal-api-key-123',
        'secret' => 'paypal-secret-456'
    ]);

    // Create payment service with PayPal
    $paymentService = new PaymentService($paypalAdapter);

    // Process a payment
    $paypalPaymentDetails = [
        'email' => 'customer@example.com',
        'currency' => 'USD'
    ];

    $paypalResult = $paymentService->makePayment(99.99, $paypalPaymentDetails);
    echo "Payment processed with transaction ID: {$paypalResult['transaction_id']}\n";
    echo "Payment status: {$paypalResult['status']}\n";

    // Refund the payment
    if ($paymentService->refundTransaction($paypalResult['transaction_id'], 99.99)) {
        echo "Refund processed successfully\n";
    }

    echo "\n=== Stripe Payment Example ===\n";

    // Create Stripe adapter using the unified adapter
    $stripeAdapter = PaymentGatewayAdapter::create('stripe', [
        'secret_key' => 'stripe-secret-key-789'
    ]);

    // Update payment service to use Stripe
    $paymentService = new PaymentService($stripeAdapter);

    // Process a payment with Stripe
    $stripePaymentDetails = [
        'card_number' => '4242424242424242',
        'exp_month' => '12',
        'exp_year' => '2025',
        'cvc' => '123',
        'currency' => 'USD'
    ];

    $stripeResult = $paymentService->makePayment(49.99, $stripePaymentDetails);
    echo "Payment processed with transaction ID: {$stripeResult['transaction_id']}\n";
    echo "Payment status: {$stripeResult['status']}\n";

    // Check transaction status
    $status = $paymentService->checkTransactionStatus($stripeResult['transaction_id']);
    echo "Current transaction status: {$status}\n";

    echo "\n=== Square Payment Example ===\n";

    // Create Square adapter using the unified adapter
    $squareAdapter = PaymentGatewayAdapter::create('square', [
        'access_token' => 'square-access-token-123',
        'location_id' => 'square-location-456'
    ]);

    // Update payment service to use Square
    $paymentService = new PaymentService($squareAdapter);

    // Process a payment with Square
    $squarePaymentDetails = [
        'card_number' => '4111111111111111',
        'exp_month' => '12',
        'exp_year' => '2025',
        'cvc' => '123',
        'currency' => 'USD'
    ];

    $squareResult = $paymentService->makePayment(79.99, $squarePaymentDetails);
    echo "Payment processed with transaction ID: {$squareResult['transaction_id']}\n";
    echo "Payment status: {$squareResult['status']}\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}







