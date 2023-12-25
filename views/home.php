<?php 
    session_start();
    echo 'hamza<br>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    $_SESSION['user-id'];
?>