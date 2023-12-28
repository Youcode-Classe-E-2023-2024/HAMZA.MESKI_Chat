<?php
if(file_exists('../../models/RoomMembersDB.php'))require_once '../../models/RoomMembersDB.php';
else require_once '../models/RoomMembersDB.php';
if(file_exists('../../models/RoomDB.php'))require_once '../../models/RoomDB.php';
else require_once '../models/RoomDB.php';

@session_start();
$user_id = $_SESSION['user-id'];
$myRooms = $room_members_database->displayRoomsIbelong($user_id);

$html = '';
foreach($myRooms as $room) {
    $roomName = $room_database->displayRoomByName($room->room_id);
    $html .=<<<HEREDOC
    <form class="contactList" action="homeGroupsDescussion.php" method="POST">
        <input type="hidden" name="groupId" value="$room->room_id">
        <button type="submit" class="w-full flex items-center gap-1 border-b border-solid  p-2 cursor-pointer">
            <div class="h-14 w-14 bg-gray-900 rounded-full flex items-center justify-center">
                <ion-icon name="people-circle-outline" class="text-white text-8xl"></ion-icon>
            </div>
            <p class="text-white">$roomName->room_name</p>
        </button>
    </form>
    HEREDOC;
}
echo $html;
?>