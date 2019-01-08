<?php

ini_set('display_errors', 0);

abstract class Controller {

    public function render($rep, $page, $layoutRequire=true, $data=[]) {
        global $layout;

        extract($data);

        if($layoutRequire) {
            require($rep . $layout['head']);

            require($rep . $page);

            require($rep . $layout['footer']);
        } else {
            require($rep . $page);
        }
            
    }

    public function navigation($page) {
        global $vues, $rep, $data;

        $this->render($rep, $vues[$page], true, $data);
    }

    public function addList() {
        global $vues, $rep, $data;

        
        $userModel = new UserModel();
        $listModel = new ListModel();

        if(isset($_POST['listeName']) && isset($_POST['privatePublic'])) {
            extract($_POST);

            if(isset($data['isLoggedIn'])) {
                try {
                    $user = $userModel->userProfile($_SESSION['email']);
                    $privatePublic = $privatePublic === '0' ? false : true;
                    
                    $listModel->ajouterListe($listeName, $privatePublic, $user->getId());
                } catch(Exception $e) {
                    $data['error'] = $e->getMessage();
                }
            } else {
                try {
                    $listModel->ajouterListePublic($listeName);
                } catch(Exception $e) {
                    $data['error'] = $e->getMessage();
                }
            }
        }

        $this->render($rep, $vues['addList'], false, $data);
    }
 
    public function list() {
        global $vues, $rep, $data;

        $listModel = new ListModel();

        $liste = $listModel->listePublic();

        $data["liste"] = $liste;
        $data["activeListe"] = true;

        $this->render($rep, $vues['list'], true, $data);
    }

    public function deleteList() {
        global $vues, $rep, $data;

        $listModel = new ListModel();
        
        $listModel->supprimerListe($_POST['idListe']);

        header("Location: index.php");
    }

}