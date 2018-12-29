<?php

class ListeTacheGateway {

    private $_con;

    function __construct($con) {
        $this->_con = $con;
    }

    public function insert($nom, $public, $idUtilisateur) {
        $query = 'INSERT into listetache(nom, public, idUtilisateur) VALUES(:nom, :public, :idUtilisateur)';

        $this->_con->executeQuery($query,array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_INT),
            ':idUtilisateur' => array($idUtilisateur, PDO::PARAM_INT)
        ));
    }


    public function update($id, $nom, $public, $idUtilisateur) {
        $query = 'UPDATE listetache SET nom=:nom, public=:public, idUtilisateur=:idUtilisateur WHERE id=:id';

        $this->_con->executeQuery($query,array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_INT),
            ':idUtilisateur' => array($idUtilisateur, PDO::PARAM_INT),
            'id' => array($id, PDO::PARAM_INT)
        ));
    }


    public function delete($id) {
        $query = 'DELETE FROM listetache WHERE id=:id';

        $this->_con->executeQuery($query, array(
            'id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function getAllPublic() {
        $query = 'SELECT * FROM list_tache WHERE public = :public';

        $this->_con->executeQuery($query, array(
            ':public' => array(1, PDO::PARAM_BOOL)
        ));

        $results = $this->_con->getResults();

        if(count($results) > 0) {
            $arrListeTache = [];

            foreach($results as $liste) {
                $arrListeTache[] = new ListeTache(
                    $liste['id'], 
                    $liste['nom'], 
                    $liste['public'], 
                    $liste['idUtilisateur']
                );
            }
            
            return $arrListeTache;
        }

        return null;
    }

}

