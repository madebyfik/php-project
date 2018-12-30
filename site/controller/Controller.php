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

    public function ajoutListe() {
        global $vues, $rep, $data;

        if(isset($data['isLoggedIn'])) {
            $mdlUtilisateur = new MdlUtilisateur();
            $user = $mdlUtilisateur->userProfile($_SESSION['email']);
            
            $data["user"] = $user;
        }

        $this->render($rep, $vues['ajoutListe'], false, $data);
    }

    public function ajouterListe() {
        global $vues, $rep, $data;

        extract($_POST);
        
        $mdlUtilisateur = new MdlUtilisateur();
        $mdlListe = new MdlListe();

        if(isset($data['isLoggedIn'])) {
            try {
                $user = $mdlUtilisateur->userProfile($_SESSION['email']);
                $privatePublic = $privatePublic === '0' ? false : true;
                
                $mdlListe->ajouterListe($listeName, $privatePublic, $user->getId());
            } catch(Exception $e) {
                $data['error'] = $e->getMessage();
            }
        } else {
            try {
                $mdlListe->ajouterListePublic($listeName);
            } catch(Exception $e) {
                $data['error'] = $e->getMessage();
            }
        }

        $this->render($rep, $vues['ajoutListe'], false, $data);
    }
 
    public function liste() {
        global $vues, $rep, $data;

        $mdlListe = new MdlListe();

        $liste = $mdlListe->listePublic();

        $data["liste"] = $liste;
        $data["activeListe"] = true;

        $this->render($rep, $vues['list'], true, $data);
    }

    public function supprimerListe() {
        global $vues, $rep, $data;

        $mdlListe = new MdlListe();
        
        $mdlListe->supprimerListe($_POST['idListe']);

        header("Location: index.php");
    }

}