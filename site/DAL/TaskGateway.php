<?php

/**
 * Class TaskGateway
 */
class TaskGateway {

    /**
     * @var
     */
    private $_con;

    /**
     * TaskGateway constructor.
     * @param $con
     */
    public function __construct($con) {
        $this->_con = $con;
    }

    /**
     * Permet d'inserer une nouvelle tache dans la table tache
     * @param $nom Represente le nom de la tache
     * @param $description Represente la description de la tache
     * @param $id_list Represente l'identifiant de la liste
     */
    public function insert($nom, $description, $id_list) {
        $query = 'INSERT INTO tache (nom, description, completed, id_list) VALUES (:nom, :description, 0, :id_list)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':description' => array($description, PDO::PARAM_STR),
            ':id_list' => array($id_list, PDO::PARAM_INT)
        ));
    }

    /**
     * Permet de mettre a jour la completion d'une tache dans la table tache
     * @param $id Represente l'identifiant de la tache
     * @param $completed Represente la completion de la tache
     */
    public function updateCompleted($id, $completed) {
        $query = 'UPDATE tache SET completed=:completed WHERE id=:id';

        $this->_con->executeQuery($query, array(
            ':completed' => array($completed, PDO::PARAM_BOOL),
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    /**
     * Permet d'obtenir les taches d'une liste
     * @param $list_id Represente l'identifiant de la liste
     * @return array|null Retourne un array de taches
     */
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