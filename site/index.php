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

    /*
    
        - Création d'une tache au sein d'une liste / Suppression
        - Validation d'une tache
    
    */

    $mdlUtilisateur = new MdlUtilisateur();
    $data = [];

    if($mdlUtilisateur->isUtilisateur()) {
        $data['isLoggedIn'] = true;
        $userController = new UserController();
    } else {
        $data = [];
        $guestController = new GuestController(); 
    }
    
?>