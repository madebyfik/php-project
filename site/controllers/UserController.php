<?php

ini_set('display_errors', 0);

/**
 * Class UserController
 */
class UserController extends Controller {

    /**
     * UserController constructor.
     */
    public function __construct() {

        try {
            $action = $_REQUEST['action'];
            switch($action) {
                case NULL:
                    $this->homePage();
                    break;
                case 'addList':
                    $this->addList();
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
                case 'tasks':
                    $this->displayTasks();
                    break;
                case 'addTask':
                    $this->addTask();
                    break;
                case 'completeTask':
                    $this->completeTask();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Permet de supprimer une liste privée
     * @throws Exception
     */
    public function deleteListPrivate() {
        global $vues, $rep;

        $userModel = new UserModel();
        $listTaskModel = new ListTaskModel();
        
        $user = $userModel->userProfile($_SESSION['email']);
        $listTaskModel->deleteListPrivate($user->getId(), $_POST['idListe']);

        header('Location: index.php?action=profilePage');
    }

    /**
     *Permet à l'utilisateur de se deconnecter
     */
    public function disconnect() {
        global $vues, $rep;

        $userModel = new UserModel();
        
        $userModel->disconnect();

        header('Location: index.php');
    }

}