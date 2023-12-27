<?php 
class RoomDB {
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

    public function createRoom($room_name, $creator_id) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO room (room_name, creator_id) VALUES (:room_name, :creator_id)");
    
            $stmt->bindParam(':room_name', $room_name, PDO::PARAM_STR);
            $stmt->bindParam(':creator_id', $creator_id, PDO::PARAM_INT);
            
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }


}

$room_database = new RoomDB('localhost', 'chat', 'root', '');
?>
