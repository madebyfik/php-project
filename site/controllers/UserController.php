<?php

ini_set('display_errors', 0);

class UserController extends Controller {

    function __construct() {

        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->list();
                    break;
                case 'addList':
                    $this->addList();
                    break;
                case 'profilePage':
                    $this->profile();
                    break;
                case 'deleteList':
                    $this->deleteList();
                    break;
                case 'deleteListPrivate':
                    $this->deleteListPrivate();
                    break;
                case 'disconnect':
                    $this->disconnect();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteListPrivate() {
        global $vues, $rep;

        $userModel = new UserModel();
        $listModel = new ListModel();
        
        $user = $userModel->userProfile($_SESSION['email']);
        $listModel->supprimerListePrivate($user->getId(), $_POST['idListe']);

        header('Location: index.php?action=profilePage');
    }

    public function profile() {
        global $vues, $rep;

        $userModel = new UserModel();
        $listModel = new ListModel();
        
        $user = $userModel->userProfile($_SESSION['email']);
        $liste = $listModel->listePrivate($user->getId());

        $data = array (
            "user" => $user,
            "liste" => $liste,
            "isLoggedIn" => true
        );
        
        $this->render($rep, $vues['profile'], true, $data);
    }

    public function disconnect() {
        global $vues, $rep;

        $userModel = new UserModel();
        
        $userModel->disconnect();

        header('Location: index.php');
    }

}