<?php
session_start();
require_once '../../models/MessagesDB.php';
require_once '../../models/UsersDB.php';

$room_id = $_POST['groupId'];
$sender_id = $_SESSION['user-id'];

$messages = $messages_database->getMessagesByRoomId($room_id);
// print_r($messages);
$html = '';
foreach($messages as $message) {
    $user = $users_database->displayUserById($message->sender_id);
    if($message->sender_id == $sender_id)
    {
        $html .=<<<HEREDOC
        <div class="flex items-center justify-end gap-1">
            <div class="bg-green-400 p-2 self-end rounded-lg rounded-tr-none">
                $message->message
            </div>
            <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
        </div>
        HEREDOC;
    }
    else
    {
        $html .=<<<HEREDOC
        <div class="flex items-center gap-1">
            <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
            <div class="bg-gray-200 p-2 self-start rounded-lg rounded-tl-none">
                $message->message
            </div>
        </div>
        HEREDOC;
    } 
}
echo $html;
?>