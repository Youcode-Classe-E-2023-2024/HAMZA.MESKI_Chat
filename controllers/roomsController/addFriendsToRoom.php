<?php
session_start();
require_once '../../models/RoomMembersDB.php';

print_r($_POST);
$selected_users = $_POST['selected_users']; 
$groupId = $_POST['groupId'];
$is_banned = 0;


for($i = 0; $i < count($selected_users); $i++) {
    $room_members_database->insertMembers($groupId,$selected_users[$i], $is_banned);
}
?>