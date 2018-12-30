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

        - Création d'une liste public ou privé /
        - Création d'une tache au sein d'une liste / Suppression
        - Validation d'une tache
    
    */

    $mdlUtilisateur = new MdlUtilisateur();

    if($mdlUtilisateur->isUtilisateur()) {
        $userController = new UserController();
    } else {
        $guestController = new GuestController(); 
    }
    
?>