<?php
    session_start();

    require_once(__DIR__ . '/config/config.php');

    require_once(__DIR__ . '/config/Autoload.php');

    require_once(__DIR__ . '/config/Validation.php');

    Autoload::charger();

    /*$options = [
        'cost' => 12,
    ];
    echo password_hash("fafafa", PASSWORD_BCRYPT, $options);*/

    $mdlUtilisateur = new MdlUtilisateur();

    if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $_SESSION['isLoggedIn'] = $mdlUtilisateur->isUtilisateur($_SESSION['email']);

        if($_SESSION['isLoggedIn'] === false) {
            $guestController = new GuestController(); 
        } else {
            $userController = new UserController();
        }
    
    } else {
        $guestController = new GuestController();
    }
    
?>