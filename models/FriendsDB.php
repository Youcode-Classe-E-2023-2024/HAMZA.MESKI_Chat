<?php 
class FriendsDB {
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

    public function insertFriend($me, $myfriend, $is_blocked) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO friends_list (me, myfriend, is_blocked) VALUES (:me, :myfriend, :is_blocked)");
    
            $stmt->bindParam(':me', $me, PDO::PARAM_INT);
            $stmt->bindParam(':myfriend', $myfriend, PDO::PARAM_INT);
            $stmt->bindParam(':is_blocked', $is_blocked, PDO::PARAM_INT);
    
            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            die('Insert failed: ' . $e->getMessage());
        }
    }

    public function displayFriends() {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM friends_list");
    
            // Execute the statement
            $stmt->execute();
    
            // Fetch all rows as an associative array
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            return $result;
        } catch (PDOException $e) {
            die('Display failed: ' . $e->getMessage());
        }
    }

    public function displayFriendsById($myId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM friends_list WHERE me = :myId");
            $stmt->bindParam(':myId', $myId, PDO::PARAM_INT);
    
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

$friends_database = new FriendsDB('localhost', 'chat', 'root', '');
?>
