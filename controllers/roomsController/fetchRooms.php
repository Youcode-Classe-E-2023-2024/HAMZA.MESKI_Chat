<?php 
// session_start();
require_once '../models/RoomDB.php';
$creator_id = $_SESSION['user-id'];
$myRooms = $room_database->fetchMyRooms($creator_id);

// echo '<pre>'; 
// print_r($myRooms); 
// echo '</pre>';
$html = '';
foreach($myRooms as $room) {
    $html .=<<<HEREDOC
    <form class="contactList" action="homeGroupsDescussion.php" method="POST">
        <input type="hidden" name="groupId" value="$room->room_id">
        <button type="submit" class="w-full flex items-center gap-1 border-b border-solid  p-2 cursor-pointer">
            <div class="h-14 w-14 bg-orange-500 rounded-full flex items-center justify-center">
                <ion-icon name="people-circle-outline" class="text-white text-8xl"></ion-icon>
            </div>
            <p class="text-white">$room->room_name</p>
        </button>
    </form>
    HEREDOC;
}
echo $html;
?>