<?php 
class RoomMembersDB {
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

    public function insertMembers($room_id, $user_id, $is_banned) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO room_members (room_id, user_id, is_banned) VALUES (:room_id, :user_id, :is_banned)");
    
            $stmt->bindParam(':room_id', $room_id, PDO::PARAM_INT);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':is_banned', $is_banned, PDO::PARAM_INT);
            
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }
    
    public function displayRoomMembers($roomId){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM room_members WHERE room_id = :roomId");
            $stmt->bindParam(':roomId', $roomId, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch the user as an associative array
            $user = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            return $user;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }  

}

$room_members_database = new RoomMembersDB('localhost', 'chat', 'root', '');
?>
