<?php
session_start();
require_once '../../models/MessagesDB.php';

$sender_id = $_SESSION['user-id'];
$receiver_id = $_POST['contactId'];
$messages = $messages_database->getMessagesBySenderReceiver($sender_id, $receiver_id);
// print_r($messages);
$html = '';
foreach($messages as $message) {
    if($message->sender_id == $sender_id)
    {
        $html .=<<<HEREDOC
        <div class="bg-green-400 p-2 self-end rounded-lg rounded-tr-none">
            $message->message
        </div>
        HEREDOC;
    }
    else
    {
        $html .=<<<HEREDOC
        <div class="bg-gray-200 p-2 self-start rounded-lg rounded-tl-none">
            $message->message
        </div>
        HEREDOC;
    } 
}
echo $html;
?>