<?php

class TaskGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $description, $id_list) {
        $query = 'INSERT INTO tache (nom, description, id_list) VALUES (:nom, :description, :id_list)';

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
}