<?php 
require_once '../../models/InvitationsDB.php';

$invitations = $invitations_database->displayInvitations();
print_r($invitations);
?>