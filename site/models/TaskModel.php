<?php

class TaskModel {

    private $_taskGateway;

    public function __construct() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $this->_taskGateway = new TaskGateway($con);
    }

    public function getTask($idList) {
        Validation::valString($idList);

        $taskArray = $this->_taskGateway->getTaskByListId($idList);

        return $taskArray;
    }

    public function addTask($taskName, $taskDescription, $listId) {
        $errorArray = [];

        Validation::valFormTask($taskName, $taskDescription, $errorArray);

        if(count($errorArray) > 0) {
            throw new Exception($errorArray[0]);
        }

        $this->_taskGateway->insert($taskName, $taskDescription, $listId);

        header('Location: index.php');
    }

}