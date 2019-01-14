<?php

/**
 * Class TaskModel
 */
class TaskModel {

    /**
     * @var TaskGateway
     */
    private $_taskGateway;

    /**
     * TaskModel constructor.
     */
    public function __construct() {
        global $bdd;
        $con = new Connection('mysql:host=localhost;dbname=projetphp', $bdd["username"], $bdd["password"]);
        $this->_taskGateway = new TaskGateway($con);
    }

    /**
     * Permet d'afficher les taches d'une liste
     * @param $idList
     * @return array|null
     */
    public function getTask($idList) {
        Validation::valString($idList);

        $taskArray = $this->_taskGateway->getTaskByListId($idList);

        return $taskArray;
    }

    /**
     * Permet d'ajouter une tache a une liste
     * @param $taskName Represente le nom de la tache
     * @param $taskDescription Represente la description de la tache
     * @param $listId Represente l'identifiant de la liste
     * @throws Exception
     */
    public function addTask($taskName, $taskDescription, $listId) {
        $errorArray = [];

        Validation::valFormTask($taskName, $taskDescription, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_taskGateway->insert($taskName, $taskDescription, $listId);
    }

    /**
     * Permet de mettre a jour la complétion d'une tache
     * @param $idTask Represente l'identifiant de la tache
     * @param $completeTask Represente la la completion de la tache
     * @throws Exception
     */
    public function updateCompleted($idTask, $completeTask) {
        $errorArray = [];

        Validation::valFormCompleteTask($idTask, $completeTask, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }
        
        $completeTask = $completeTask === '0' ? '1' : '0';

        $this->_taskGateway->updateCompleted($idTask, $completeTask);
    }

}