<?php

class TaskGateway {

    private $_con;

    public function __construct($con) {
        $this->_con = $con;
    }

    public function insert($nom, $description, $id_list) {
        $query = 'INSERT INTO tache (nom, description, completed, id_list) VALUES (:nom, :description, 0, :id_list)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':id_list' => array($id_list, PDO::PARAM_INT)
        ));
    }


    public function update($id, $nom, $description, $id_list) {
        $query = 'UPDATE tache SET nom=:nom, description=:description, id_list=:idlist WHERE id=:id';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':id_list' => array($id_list, PDO::PARAM_INT),
            ':id' => array($id, PDO::PARAM_INT)
        ));

    }

    public function delete($id) {
        $query = 'DELETE FROM tache WHERE id=:id';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function getTaskByListId($list_id) {
        $query = 'SELECT * FROM tache WHERE id_list = :id_list';

        $this->_con->executeQuery($query, array(
            ':id_list' => array($list_id, PDO::PARAM_INT)
        ));
        
        $results = $this->_con->getResults();

        if(count($results) > 0) {
            $taskArray = [];
            
            foreach($results as $task) {
                $taskArray[] = new Task(
                    $task['id'], 
                    $task['nom'], 
                    $task['description'], 
                    $task['completed'],
                    $task['id_list']
                );
            }
            return $taskArray;
        }

        return null;
    }
}