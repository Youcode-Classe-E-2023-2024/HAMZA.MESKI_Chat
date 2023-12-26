<?php
session_start();
require_once '../models/UsersDB.php'; 

$users = $users_database->displayUserById($_SESSION['user-id']);

$html =<<<HEREDOC
<p class="text-white">$users->username</p>
<p class="h-12 w-12 bg-black rounded-full" style="background-image: url('../images/$users->avatar');background-size: cover;"></p>
HEREDOC;
echo $html;
?>