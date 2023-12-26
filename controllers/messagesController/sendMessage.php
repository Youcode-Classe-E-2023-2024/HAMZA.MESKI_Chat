<?php
session_start();
require_once '../../models/MessagesDB.php';

$message = $_POST['message_input'];
$room_id = 1;
$sender_id = $_SESSION['user-id'];
$receiver_id = $_POST['contactId'];

$messages_database->insertMessage($message, $room_id, $sender_id, $receiver_id);
echo 'message have sended succussfully';
?>