<?php
require_once '../models/UsersDB.php';

$users = $users_database->displayUsers($_SESSION['user-id']);
$html = '';
foreach($users as $user) {
    if($_SESSION['user-id'] != $user->user_id)
    {
        $html .=<<<HEREDOC
        <div contactId="$user->user_id" class="contactList w-full flex items-center gap-1 border-b border-solid  p-2 cursor-pointer">
            <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
            <p class="text-white">$user->username</p>
        </div>
        HEREDOC;
    }
}
echo $html;
// $html .=<<<HEREDOC
// <form class="contactList">
//     <input type="hidden" name="contactId" value="$user->user_id">
//     <button type="submit" class="w-full flex items-center gap-1 border-b border-solid  p-2 cursor-pointer">
//         <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
//         <p class="text-white">$user->username</p>
//     </button>
// </form>
// HEREDOC;
?>
