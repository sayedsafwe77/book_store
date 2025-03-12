<?php

class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;

    private $connection;
    private string $host;
    private string $username;
    private string $password;
    private string $database;
    private int $port;

    private function __construct() {
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->username = getenv('DB_USERNAME') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: '12345';
        $this->database = getenv('DB_DATABASE') ?: 'book_store';
        $this->port = (int)(getenv('DB_PORT') ?: 3306);
    }

    private function __clone() {}

    public static function getInstance(): DatabaseConnection {

        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function connect() {
        if ($this->connection === null) {
            try {
                $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                $this->connection = new PDO($dsn, $this->username, $this->password, $options);

                echo "Database connection established successfully.\n";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return $this->connection;
    }

    public function query(string $sql, array $params = []): array {
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getStatus(): string {
        return $this->connection ? "Connected" : "Disconnected";
    }
}

function getUserData($userId) {
    $db = DatabaseConnection::getInstance();
    $users = $db->query("SELECT * FROM users WHERE id = ?", [$userId]);
    return $users[0] ?? null;
}

function updateUserEmail($userId, $newEmail) {
    $db = DatabaseConnection::getInstance();

    $db->query("UPDATE users SET email = ? WHERE id = ?", [$newEmail, $userId]);

    echo "User email updated successfully.\n";
}

try {
    echo "Connection status: " . DatabaseConnection::getInstance()->getStatus() . "\n";

    DatabaseConnection::getInstance()->connect();

    $user = getUserData(5);
    if ($user) {
        echo "Found user: " . ($user['first_name'] ?? 'Unknown') . "\n";
    }

    echo "Connection status: " . DatabaseConnection::getInstance()->getStatus() . "\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}



// class Car{
//     public array $carProp = [];
//     public function __construct(private string $model,private string $color) {
//         $this->carProp['model'] = $model;
//         $this->carProp['color'] = $color;
//     }
//     function drive()  {
//         echo 'car in driveing';
//     }
//     function __call($name, $arguments)
//     {
//         echo 'welcome from call';
//     }
//     static function __callStatic($name, $arguments)
//     {
//         echo 'welcome from call static';
//     }
//     function __get($name)
//     {
//         return $this->carProp[$name] ?? 'message';
//     }
//     function __set($name, $value)
//     {
//         $this->carProp[$name] = $value;
//     }
//     function __unset($name)
//     {
//         unset($this->carProp[$name]);
//     }
//     function __toString()
//     {
//        return implode(",",$this->carProp);
//     }
//     function __clone()
//     {
//         echo 'object cloning...';
//     }

// }
// $car = new Car('2020','red');
// $car2 = clone $car;

// echo $car2->model;
// unset($car->model);
// echo $car->model;


// echo $car;


// $car->variant = 'BYD';
// echo $car->variantt;

