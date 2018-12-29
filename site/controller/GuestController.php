<?php

ini_set('display_errors', 0);

class GuestController extends Controller{

    function __construct() {
        session_start();

        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->navigation('list');
                    break;
                case 'contact':
                    $this->navigation('contact');
                    break;
                case 'apropos':
                    $this->navigation('apropos');
                    break; 
                case 'connectGet':
                    $this->navigationAuth('connect');
                    break;
                case 'connectPOST':
                    $this->connexion();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            
        }
    }

    public function navigation($page) {
        global $vues, $rep;
        
        $this->layout($rep, $vues[$page]);
        //require($rep . $vues[$page]);
    }

    public function navigationAuth($page) {
        global $vues, $rep;

        require($rep . $vues[$page]);
    }

    public function connexion() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        
        extract($_POST);

        try {
            MdlUtilisateur::connexion($usermail, $userpass);
        } catch(Exception $e) {
            echo $e;
        }

        require($rep . $vues['connect']);
     }

}