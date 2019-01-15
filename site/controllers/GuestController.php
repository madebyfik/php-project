<?php

ini_set('display_errors', 0);

/**
 * Class GuestController
 */
class GuestController extends Controller{

    /**
     * GuestController constructor.
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
                case 'connect':
                    $this->connect();
                    break;
                case 'deleteList':
                    $this->deleteList();
                    break;
                case 'tasks':
                    $this->displayTasks();
                    break;
                case 'addTask':
                    $this->addTask();
                    break;
                case 'register':
                    $this->register();
                    break;
                case 'completeTask':
                    $this->completeTask();
                    break;
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            
        }
    }

    /**
     *Permet à un utilisateur de se connecter
     */
    public function connect() {
        global $vues, $rep;

        extract($_POST);

        $userModel = new UserModel();
        $data = [];

        if(isset($usermail) && isset($userpass)) {
            
            try {
                $userModel->connect($usermail, $userpass);
            } catch(Exception $e) {
                $data = array (
                    "error" => $e->getMessage()
                );
            }
        }   

        $this->render($rep, $vues['connect'], false, $data);
    }

    /**
     *Permet à un utilisateur de créer un compte
     */
    public function register(){
        global $vues, $rep;

        extract($_POST);

        $data =[];
        $userModel = new UserModel();
        
        if(isset($usermail) && isset($username) && isset($usersurname) && isset($userpass) && isset($userpassconf)){

            try{
                $userModel->register($usermail, $username, $usersurname, $userpass, $userpassconf);
            } catch(Exception $e){
                $data = array(
                    "error" => $e->getMessage()
                );
            }
        }
        
        $this->render($rep, $vues['register'], false, $data);

    }

}