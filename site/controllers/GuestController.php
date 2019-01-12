<?php

ini_set('display_errors', 0);

class GuestController extends Controller{

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
                default:
                    $this->navigation('error');
                    break;
            }
            
        } catch (Exception $e) {
            
        }
    }

    public function connect() {
        global $vues, $rep;

        $userModel = new UserModel();
        $data = [];

        if(isset($_POST['usermail']) && isset($_POST['userpass'])) {
            extract($_POST);

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

    public function register(){
        global $vues, $rep;

        $data =[];
        $userModel = new UserModel();
        
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail']) && isset($_POST['password'])){
            extract($_POST);

            try{
                $userModel->register($nom,$prenom,$mail,$password);
            } catch(Exception $e){
                $data = array(
                    "error" => $e->getMessage()
                );
            }
        }
        $this->render($rep, $vues['register'], false, $data);

    }

}