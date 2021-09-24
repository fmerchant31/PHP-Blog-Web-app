<?php 
    require_once('classes/User.php');
    $user = new User();
    $user->Logout();
    header('Location: admin/index.php');
?>