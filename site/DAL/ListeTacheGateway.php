<?php

class ListeTacheGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $public, $idUtilisateur) {}
    public function update($id, $nom, $public, $idUtilisateur) {}
    public function delete($id) {}
}