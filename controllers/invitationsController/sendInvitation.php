<?php 
session_start();
require_once '../../models/InvitationsDB.php';

$sender_id = $_SESSION['user-id'];
$receiver_id = $_POST['contactId'];
$checker = 0; 

$invitations_database->sendInvitation($sender_id, $receiver_id, $checker);
?>