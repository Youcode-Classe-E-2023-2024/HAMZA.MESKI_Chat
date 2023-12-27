<?php
session_start();
require_once '../../models/UsersDB.php';

$users = $users_database->displayUsers();
$html = '';
foreach($users as $user) {
    if($_SESSION['user-id'] != $user->user_id)
    {
        $html .=<<<HEREDOC
        <main class="flex gap-1 items-center pl-2 border-b border-solid">
            <input type="checkbox" name="selected_users[]"  value="$user->user_id" class="w-5 h-5 ">
            <div>
                <div type="submit" class="w-full flex items-center gap-1 p-2 cursor-pointer">
                    <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
                    <p class="text-white">$user->username</p>
                </div>
            </div>
        </main>
        HEREDOC;
    }
}
echo $html;
?>