<?php 
session_start();
require_once '../../models/RoomDB.php';
$room_name = $_POST['room_name']; 
$creator_id = $_SESSION['user-id'];
$room_database->createRoom($room_name, $creator_id);
?>