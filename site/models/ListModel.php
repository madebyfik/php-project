<?php

class ListModel {

    private $_listeGateway;

    function __construct() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $this->_listeGateway = new ListGateway($con);
    }

    function addListPublic($name) {
        $errorArray = [];
        Validation::valFormListTask($name, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listeGateway->insertPublic($name);
        header('Location: index.php');
    }

    function addList($name, $public, $userId) {
        $errorArray = [];
        Validation::valFormListTask($name, $errorArray);

        $list = $this->_listeGateway->findByName($name);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listeGateway->insert($name, $public, $userId);
        header('Location: index.php');
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