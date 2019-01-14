<?php

/**
 * Class Connection
 */
class Connection extends PDO{
    /**
     * @var
     */
    private $_stmt;

    /**
     * Connection constructor.
     * @param $dsn Represente le data source name
     * @param $username Represente l'identifiant de la base de donnée
     * @param $password Represente le mot de passe de la base de donnée
     */
    function __construct($dsn, $username, $password) {
        parent::__construct($dsn, $username, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**Permet d'executer une requete
     * @param $query Represente la requete
     * @param array $parameters Represente la liste des parametres
     * @return bool
     */
    public function executeQuery($query, $parameters=[]) {
        $this->_stmt=parent::prepare($query);
        
        foreach($parameters as $name => $value){
            $this->_stmt->bindValue($name,$value[0],$value[1]);
        }

        return $this->_stmt->execute();
    }

    /**
     * @return mixed
     */
    public function getResults(){
        return $this->_stmt->fetchall();
    }
}

?>