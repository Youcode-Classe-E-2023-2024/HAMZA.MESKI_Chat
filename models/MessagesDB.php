<?php 
class MessagesDB {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        $this->connect();
    }

    private function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function insertMessage($message, $room_id, $sender_id, $receiver_id) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO messages (message, room_id, sender_id, receiver_id) VALUES (:message, :room_id, :sender_id, :receiver_id)");
    
            $stmt->bindParam(':message', $message, PDO::PARAM_STR);
            $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
            $stmt->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
            $stmt->bindParam(':receiver_id', $receiver_id, PDO::PARAM_INT);
            
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function getMessagesBySenderReceiver($sender_id, $receiver_id) {
        try {
            $stmt = $this->pdo->prepare(" SELECT * FROM messages 
            WHERE (sender_id = :sender_id AND receiver_id = :receiver_id)
            OR (sender_id = :receiver_id AND receiver_id = :sender_id)");
    
            $stmt->bindParam(':sender_id', $sender_id, PDO::PARAM_INT);
            $stmt->bindParam(':receiver_id', $receiver_id, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            return $result;
        } catch (PDOException $e) {
            die('Query failed: ' . $e->getMessage());
        }
    }
}

$messages_database = new MessagesDB('localhost', 'chat', 'root', '');
// // Display messages
// $messages = $messages_database->displayUsers();
?>
