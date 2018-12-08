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

}