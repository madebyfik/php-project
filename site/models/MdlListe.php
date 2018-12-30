<?php

class MdlListe {

    private $_listeGateway;

    function __construct() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $this->_listeGateway = new ListeTacheGateway($con);
    }

    function ajouterListePublic($nom) {
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

    function ajouterListe($nom, $public, $utilisateurId) {
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

    function supprimerListe($id) {
        Validation::valString($id);
        
        $liste = $this->_listeGateway->delete($id);
    }

    function supprimerListePrivate($userId, $id) {
        Validation::valString($userId);
        Validation::valString($id);

        $liste = $this->_listeGateway->deletePrivate($userId, $id);
    }

    function listePrivate($id) {
        Validation::valString($id);

        $liste = $this->_listeGateway->getPrivate($id);

        return $liste;
    }

    function listePublic() {
        $liste = $this->_listeGateway->getAllPublic();
        return $liste;
    }

}