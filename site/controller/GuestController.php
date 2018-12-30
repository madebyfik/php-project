<?php

ini_set('display_errors', 0);

class GuestController extends Controller{

    function __construct() {
        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->liste();
                    break;
                case 'contactPage':
                    $this->navigation('contact');
                    break;
                case 'ajoutListePage':
                    $this->ajoutListe();
                    break;
                case 'ajoutListe':
                    $this->ajouterListe();
                    break;
                case 'aproposPage':
                    $this->navigation('apropos');
                    break; 
                case 'connectPage':
                    $this->navigationAuth('connect');
                    break;
                case 'connect':
                    $this->connexion();
                    break;
                case 'supprimerListe':
                    $this->supprimerListe();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            
        }
    }

    public function navigationAuth($page) {
        global $vues, $rep;

        $this->render($rep, $vues[$page], false);
    }

    public function connexion() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        $data = [];
        extract($_POST);

        try {
            $mdlUtilisateur->connexion($usermail, $userpass);
        } catch(Exception $e) {
            $data = array (
                "error" => $e->getMessage()
            );
        }

        $this->render($rep, $vues['connect'], false, $data);
    }

}