<?php

ini_set('display_errors', 0);

class UserController extends GuestController {

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
                case 'aproposPage':
                    $this->navigation('apropos');
                    break;
                case 'ajoutListePage':
                    $this->ajoutListe();
                    break;
                case 'ajoutListe':
                    $this->ajouterListe();
                    break;
                case 'profilePage':
                    $this->profile();
                    break;
                case 'supprimerListe':
                    $this->supprimerListe();
                    break;
                case 'supprimerListePrivate':
                    $this->supprimerListePrive();
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

    public function supprimerListePrive() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        $mdlListe = new MdlListe();
        
        $user = $mdlUtilisateur->userProfile($_SESSION['email']);
        $mdlListe->supprimerListePrivate($user->getId(), $_POST['idListe']);

        header('Location: index.php?action=profilePage');
    }

    public function profile() {
        global $vues, $rep;

        $mdlUtilisateur = new MdlUtilisateur();
        $mdlListe = new MdlListe();
        
        $user = $mdlUtilisateur->userProfile($_SESSION['email']);
        $liste = $mdlListe->listePrivate($user->getId());

        $data = array (
            "user" => $user,
            "liste" => $liste,
            "isLoggedIn" => true
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