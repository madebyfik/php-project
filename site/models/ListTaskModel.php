<?php

/**
 * Class ListTaskModel
 */
class ListTaskModel {

    /**
     * @var ListTaskGateway
     */
    private $_listTaskGateway;

    /**
     * ListTaskModel constructor.
     */
    public function __construct() {
        global $bdd;

        $con = new Connection($bdd["dsn"], $bdd["username"], $bdd["password"]);
        $this->_listTaskGateway = new ListTaskGateway($con);
    }

    /**
     * Permet d'ajouter une liste publique
     * @param $name Represente le nom de la liste
     * @throws Exception
     */
    public function addListPublic($name) {
        $errorArray = [];
        Validation::valFormListTask($name, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listTaskGateway->insertPublic($name);
        header('Location: index.php');
    }

    /**
     * Permet d'ajouter une liste
     * @param $name Represente le nom de la liste
     * @param $public Represente la visibilité de la liste
     * @param $userId Represente l'identifiant de l'utilisateur
     * @throws Exception
     */
    public function addList($name, $public, $userId) {
        $errorArray = [];

        $public = $public === '0' ? false : true;

        Validation::valFormListTask($name, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_listTaskGateway->insert($name, $public, $userId);
    }

    /**
     * Permet de supprimer une liste
     * @param $id Represente l'identifiant de la liste
     */
    public function deleteList($id) {
        Validation::valString($id);
        
        $this->_listTaskGateway->delete($id);
    }

    /**
     * Permet de supprimer une liste privée
     * @param $userId Represente l'identifiant de l'utilisateur
     * @param $id Represente l'identifiant de la liste
     */
    public function deleteListPrivate($userId, $id) {
        Validation::valString($userId);
        Validation::valString($id);

        $this->_listTaskGateway->deletePrivate($userId, $id);
    }

    /**
     * Permet de selectionner toutes les listes privées
     * @param $id Represente l' identifiant de la liste
     * @return array|null
     */
    public function listPrivate($id) {
        Validation::valString($id);

        $listTask = $this->_listTaskGateway->getPrivate($id);

        return $listTask;
    }

    /**
     * Permet de selectionnner toutes les listes publiques
     * @return array|null Retourne une liste de tache
     */
    public function listPublic() {
        $listTask = $this->_listTaskGateway->getAllPublic();
        
        return $listTask;
    }

    /**
     * Permet de retourner une liste en fonction de son identifiant
     * @param $listId Represente l'identifiant de la liste
     * @return ListTask|null Retourne une liste de tache
     * @throws Exception
     */
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