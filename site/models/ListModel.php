<?php

class ListModel {

    private $_listeGateway;

    function __construct() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $this->_listeGateway = new ListGateway($con);
    }

    function addListPublic($nom) {
        $dVueErreur = [];
        Validation::valFormListTache($nom, $dVueErreur);
        
        $list = $this->_listeGateway->findByName($nom);

        if(count($dVueErreur) > 0) {
            throw new Exception($dVueErreur[0]);
        }

        if($list == null) {
            $this->_listeGateway->insertPublic($nom);
            header('Location: index.php');
        } else {
            throw new Exception("Liste déjà existante sous se nom");
        }
    }

    function addList($nom, $public, $utilisateurId) {
        $dVueErreur = [];
        Validation::valFormListTache($nom, $dVueErreur);

        $list = $this->_listeGateway->findByName($nom);

        if(count($dVueErreur) > 0) {
            throw new Exception($dVueErreur[0]);
        }

        if($list == null) {
            $this->_listeGateway->insert($nom, $public, $utilisateurId);
            header('Location: index.php');
        } else {
            throw new Exception("Liste déjà existante sous se nom");
        }
    }

    function deleteList($id) {
        Validation::valString($id);
        
        $liste = $this->_listeGateway->delete($id);
    }

    function deleteListPrivate($userId, $id) {
        Validation::valString($userId);
        Validation::valString($id);

        $liste = $this->_listeGateway->deletePrivate($userId, $id);
    }

    function listPrivate($id) {
        Validation::valString($id);

        $liste = $this->_listeGateway->getPrivate($id);

        return $liste;
    }

    function listPublic() {
        $liste = $this->_listeGateway->getAllPublic();
        return $liste;
    }

}