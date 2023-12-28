<?php 
class InvitationDB {
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

    public function sendInvitation($sender_id, $receiver_id, $checker) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO invitation (sender_id, receiver_id, checker) VALUES (:sender_id, :receiver_id, :checker)");
    
            $stmt->bindParam(':sender_id', $sender_id, PDO::PARAM_STR);
            $stmt->bindParam(':receiver_id', $receiver_id, PDO::PARAM_STR);
            $stmt->bindParam(':checker', $checker, PDO::PARAM_STR);
    
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function displayInvitations() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM invitation");
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            return $result;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }

    public function displayInvitationBySenderId($receiverId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM invitation WHERE receiver_id = :receiverId");
            $stmt->bindParam(':receiverId', $receiverId, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch the user as an associative array
            $user = $stmt->fetch(PDO::FETCH_OBJ);
    
            return $user;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }
    
}

$invitations_database = new InvitationDB('localhost', 'chat', 'root', '');
?>
