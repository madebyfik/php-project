<?php

class TacheGateway {

    private $_con;

    public function($con) {
        $this->_con = $con;
    }

    public function insert($nom, $description, $idList) {}
    public function update($id, $nom, $description, $idList) {}
    public function delete($id) {}
}