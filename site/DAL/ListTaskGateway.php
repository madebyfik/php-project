    <?php

class ListTaskGateway {

    private $_con;

    function __construct($con) {
        $this->_con = $con;
    }

    public function insertPublic($nom) {
        $query = 'INSERT INTO list_tache (nom, public) VALUES (:nom, 1)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR)
        ));
    }

    public function insert($nom, $public, $id_utilisateur) {
        $query = 'INSERT INTO list_tache (nom, public, id_utilisateur) VALUES (:nom, :public, :id_utilisateur)';
        
        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_BOOL),
            ':id_utilisateur' => array($id_utilisateur, PDO::PARAM_INT)
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
        $query = 'DELETE FROM list_tache WHERE id=:id';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

    public function deletePrivate($userId, $id) {
        $query = 'DELETE FROM list_tache WHERE id=:id AND id_utilisateur=:idUser';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':idUser' => array($userId, PDO::PARAM_INT)
        ));
    }

    public function getAllPublic() {
        $query = 'SELECT * FROM list_tache WHERE public = :public';

        $this->_con->executeQuery($query, array(
            ':public' => array(1, PDO::PARAM_BOOL)
        ));

        $results = $this->_con->getResults();

        if(count($results) > 0) {
            $listTaskArray = [];

            foreach($results as $liste) {
                $listTaskArray[] = new ListTask(
                    $liste['id'], 
                    $liste['nom'], 
                    $liste['public'], 
                    $liste['idUtilisateur']
                );
            }
            
            return $listTaskArray ;
        }

        return null;
    }

    public function getPrivate($id) {
        $query = 'SELECT * FROM list_tache WHERE id_utilisateur = :id_utilisateur';

        $this->_con->executeQuery($query, array(
            ':id_utilisateur' => array($id, PDO::PARAM_INT)
        ));

        $results = $this->_con->getResults();

        if(count($results) > 0) {
            $listTaskArray = [];

            foreach($results as $liste) {
                $listTaskArray[] = new ListTask(
                    $liste['id'], 
                    $liste['nom'], 
                    $liste['public'], 
                    $liste['idUtilisateur']
                );
            }
            
            return $listTaskArray;
        }

        return null;
    }

    public function getListById($id) {
        $query = 'SELECT * FROM list_tache WHERE id = :id';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));

        $results = $this->_con->getResults();

        if(count($results) > 0) {
            $results = $results[0];
            return new ListTask($results['id'], $results['nom'], $results['public'], $results['id_utilisateur']);
        }

        return null;
    }

    public function findByName($name) {
        $query = 'SELECT * FROM list_tache WHERE nom = :nom LIMIT 1';
        
        $this->_con->executeQuery($query, array(
            ':nom' => array($name, PDO::PARAM_STR)
        ));
        
        $results = $this->_con->getResults();

        if(count($results) == 1) {
            $listTask = new ListTask(
                $results[0]['id'], 
                $results[0]['nom'], 
                $results[0]['public'], 
                $results[0]['id_utilisateur']
            );
            return $listTask;
        }

        return null;
    }

}

