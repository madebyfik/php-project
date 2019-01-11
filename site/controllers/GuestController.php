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

}