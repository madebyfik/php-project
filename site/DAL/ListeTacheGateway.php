<?php

class ListeTacheGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $public, $idUtilisateur) {
        $query = 'INSERT into listetache(nom, public, idUtilisateur) VALUES(:nom, :public, :idUtilisateur)';

        $this->_con->executeQuery($query,array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_INT),
            ':idUtilisateur' => array($idUtilisateur, PDO::PARAM)
        ))

    }
    public function update($id, $nom, $public, $idUtilisateur) {}
    public function delete($id) {}
}