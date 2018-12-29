<?php

ini_set('display_errors', 0);

class UserController extends GuestController {

    function __construct() {

        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->navigation('list');
                    break;
                case 'contactPage':
                    $this->navigation('contact');
                    break;
                case 'aproposPage':
                    $this->navigation('apropos');
                    break;
                case 'profilePage':
                    $this->profile();
                    break; 
                case 'deconnexion':
                    $this->deconnexion();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function navigation($page) {
        global $vues, $rep;

        $this->render($rep, $vues[$page]);
    }

    public function profile() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        
        $user = $mdlUtilisateur->userProfileDate($_SESSION['email']);

        $data = array (
            "user" => $user
        );
        
        $this->render($rep, $vues['profile'], true, $data);
    }

    public function deconnexion() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        
        $mdlUtilisateur->deconnexion();

        header('Location: index.php');
    }

}