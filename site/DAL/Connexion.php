<?php

class Connection extends PDO{
    private $_stmt;

    public function __construct($dsn, $username, $password){
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, array $parameters=[]){
        $this->_stmt=parent::prepare($query);
        foreach($parameters as $name => $value){
            $this->_stmt->bindValue($name,$value[0],$value[1]);
        }
        return $this->_stmt->execute();
    }

    public function getResults(){
        return $this->_stmt->fetchall();
    }
}

?>