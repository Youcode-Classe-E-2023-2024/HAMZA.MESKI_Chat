<?php
require_once '../../models/RoomMembersDB.php';
require_once '../../models/UsersDB.php';

$groupId = $_POST['groupId'];

$roomMembers = $room_members_database->displayRoomMembers($groupId);

$html = '';
foreach($roomMembers as $roomMember){
    $user = $users_database->displayUserById($roomMember->user_id);
    $html .=<<<HEREDOC
    <div class="w-full flex items-center gap-1 p-2">
        <div class="h-14 w-14 bg-black rounded-full" style="background-image: url('../images/$user->avatar');background-size: cover;"></div>
        <p class="text-white">$user->username</p>
    </div>
    HEREDOC;
}
echo $html;
?>