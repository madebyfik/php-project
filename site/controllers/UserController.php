<?php

ini_set('display_errors', 0);

class UserController extends Controller {

    public function __construct() {

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
        $listTaskModel = new ListTaskModel();
        
        $user = $userModel->userProfile($_SESSION['email']);
        $listTaskModel->deleteListPrivate($user->getId(), $_POST['idListe']);

        header('Location: index.php?action=profilePage');
    }

    public function profile() {
        global $vues, $rep;

        $userModel = new UserModel();
        $listTaskModel = new ListTaskModel();
        
        try {
            $user = $userModel->userProfile($_SESSION['email']);
            $listTask = $listTaskModel->listPrivate($user->getId());

            $data = array (
                "user" => $user,
                "liste" => $listTask,
                "isLoggedIn" => true
            );
        
            $this->render($rep, $vues['profile'], true, $data);
        } catch (Exception $e) {
            header("Location: index.php");
        }
    }

    public function disconnect() {
        global $vues, $rep;

        $userModel = new UserModel();
        
        $userModel->disconnect();

        header('Location: index.php');
    }

}