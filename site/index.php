<?php
    session_start();

    require_once(__DIR__ . '/config/config.php');

    require_once(__DIR__ . '/config/Autoload.php');

    require_once(__DIR__ . '/config/Validation.php');

    Autoload::load();

    $userModel = new UserModel();
    $data = [];

    try {
        $userBoolean = $userModel->isUser();
    } catch (Exception $e) {
        $userBoolean = false;
    }

    if($userBoolean) {
        $data['isLoggedIn'] = true;
        $userController = new UserController();
    } else {
        $data = [];
        $guestController = new GuestController(); 
    }
    
?>