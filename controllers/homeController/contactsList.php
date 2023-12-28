<?php
require_once '../models/UsersDB.php';
require_once '../models/InvitationsDB.php';

$users = $users_database->displayUsers();
$html = '';
foreach($users as $user) {
    $invitation = $invitations_database->displayInvitationBySenderId($user->user_id);

    
    // 
    if($_SESSION['user-id'] != $user->user_id && $invitation == false)
    {
        $html .=<<<HEREDOC
        <main class="flex items-center border-b border-solid">
            <form class="contactList flex-grow" action="homeDescussion.php" method="POST">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="w-full flex items-center gap-1   p-2 cursor-pointer">
                    <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
                    <p class="text-white">$user->username</p>
                </button>
            </form>
            <form class="sendFriendRequestForm">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                    Add Friend
                </button>
            </form>
        </main>
        HEREDOC;
    }
    else if($_SESSION['user-id'] != $user->user_id && $invitation->checker == 0)
    {
        $html .=<<<HEREDOC
        <main class="flex items-center border-b border-solid">
            <form class="contactList flex-grow" action="homeDescussion.php" method="POST">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="w-full flex items-center gap-1   p-2 cursor-pointer">
                    <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
                    <p class="text-white">$user->username</p>
                </button>
            </form>
            <form class="sendFriendRequestForm">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                    Request send
                </button>
            </form>
        </main>
        HEREDOC;
    }
    else if($_SESSION['user-id'] != $user->user_id && $invitation->checker == 1)
    {
        $html .=<<<HEREDOC
        <main class="flex items-center border-b border-solid">
            <form class="contactList flex-grow" action="homeDescussion.php" method="POST">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="w-full flex items-center gap-1   p-2 cursor-pointer">
                    <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
                    <p class="text-white">$user->username</p>
                </button>
            </form>
            <form class="sendFriendRequestForm">
                <input type="hidden" name="contactId" value="$user->user_id">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Friend
                </button>
            </form>
        </main>
        HEREDOC;
    }
}
echo $html;
?>