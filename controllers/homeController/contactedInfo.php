<?php
if(file_exists('../models/UsersDB.php'))require_once '../models/UsersDB.php'; 
else require_once '../../models/UsersDB.php'; 

$user = $users_database->displayUserById($_POST['contactId']);
$html =<<<HEREDOC
<div contactId="$user->user_id" class="contactList bg-gray-800 h-20 w-full flex items-center gap-1 border-l border-solid  p-2 cursor-pointer">
    <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
    <p class="text-white">$user->username</p>
</div>
HEREDOC;
echo $html;
?>