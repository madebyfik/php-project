<?php

class ListTaskModel {

    private $_listTaskGateway;

    public function __construct() {
        global $bdd;

        $con = new Connection('mysql:host=localhost;dbname=projetphp', $bdd["username"], $bdd["password"]);
        $this->_listTaskGateway = new ListTaskGateway($con);
    }

    public function addListPublic($name) {
        $errorArray = [];
        Validation::valFormListTask($name, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listTaskGateway->insertPublic($name);
        header('Location: index.php');
    }

    public function addList($name, $public, $userId) {
        $errorArray = [];

        $public = $public === '0' ? false : true;

        Validation::valFormListTask($name, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listTaskGateway->insert($name, $public, $userId);
    }

    public function deleteList($id) {
        Validation::valString($id);
        
        $this->_listTaskGateway->delete($id);
    }

    public function deleteListPrivate($userId, $id) {
        Validation::valString($userId);
        Validation::valString($id);

        $this->_listTaskGateway->deletePrivate($userId, $id);
    }

    public function listPrivate($id) {
        Validation::valString($id);

        $listTask = $this->_listTaskGateway->getPrivate($id);

        return $listTask;
    }

    public function listPublic() {
        $listTask = $this->_listTaskGateway->getAllPublic();
        
        return $listTask;
    }

    public function isList($listId) {
        if(isset($listId)) {
            Validation::valString($listId);

            $listTask = $this->_listTaskGateway->getListById($listId);
            
            if($listTask === null) {
                throw new Exception("Aucune liste");
            } else {
                return $listTask;
            } 
        } else {
            throw new Exception("Aucune liste");
        }
    }

}