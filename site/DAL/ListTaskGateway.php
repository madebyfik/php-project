    <?php

    /**
     * Class ListTaskGateway
     */
    class ListTaskGateway {

        /**
         * @var
         */
        private $_con;

        /**
         * ListTaskGateway constructor.
         * @param $con
         */
        function __construct($con) {
        $this->_con = $con;
    }

        /**
         * Permet d'inserer une liste publique dans la table liste
         * @param $nom Represente le nom de la liste
         */
        public function insertPublic($nom) {
        $query = 'INSERT INTO list_tache (nom, public) VALUES (:nom, 1)';

        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR)
        ));
    }

        /**
         * Permet d'inserer une nouvelle liste dans la table list_tache
         * @param $nom Represente le nom de la liste
         * @param $public Represente la visibilité de la liste
         * @param $id_utilisateur Represente l'identifiant de l'utilisateur
         */
        public function insert($nom, $public, $id_utilisateur) {
        $query = 'INSERT INTO list_tache (nom, public, id_utilisateur) VALUES (:nom, :public, :id_utilisateur)';
        
        $this->_con->executeQuery($query, array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_BOOL),
            ':id_utilisateur' => array($id_utilisateur, PDO::PARAM_INT)
        ));
    }

        /**
         * Permet de mettre a jour une liste de tache dans la table list_tache
         * @param $id Represente l'identifiant de la liste
         * @param $nom Represente le nom de la liste
         * @param $public Represente la visibilié de la liste
         * @param $idUtilisateur Represente l'identifiant de l'utilisateur
         */
        public function update($id, $nom, $public, $idUtilisateur) {
        $query = 'UPDATE list_tache SET nom=:nom, public=:public, idUtilisateur=:idUtilisateur WHERE id=:id';

        $this->_con->executeQuery($query,array(
            ':nom' => array($nom, PDO::PARAM_STR),
            ':public' => array($public, PDO::PARAM_INT),
            ':idUtilisateur' => array($idUtilisateur, PDO::PARAM_INT),
            'id' => array($id, PDO::PARAM_INT)
        ));
    }


        /**
         * Permet de supprimer une liste publique de la table list_tache
         * @param $id Represente l'identifiant de la liste
         */
        public function delete($id) {
        $query = 'DELETE FROM list_tache WHERE id=:id';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT)
        ));
    }

        /**
         * Permet de supprimer une liste privée de la table list_tache
         * @param $userId Represente l'identifiant de l'utilisateur
         * @param $id Represente l'identifiant de la liste
         */
        public function deletePrivate($userId, $id) {
        $query = 'DELETE FROM list_tache WHERE id=:id AND id_utilisateur=:idUser';

        $this->_con->executeQuery($query, array(
            ':id' => array($id, PDO::PARAM_INT),
            ':idUser' => array($userId, PDO::PARAM_INT)
        ));
    }

        /**
         * Permet de selectionner toutes les listes publiques de la table list_tache
         * @return array|null retourne une liste de listes publiques
         */
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

        /**
         * Permet de selectionner toute les listes privées de la table list_tache
         * @param $id Represente l'identifiant de l'utilisateur
         * @return array|null
         */
        public function getPrivate($id) {
        $query = 'SELECT * FROM list_tache WHERE id_utilisateur = :id_utilisateur AND public = 0';

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

        /**
         * Permet de selectionner une liste par son identifiant
         * @param $id Represente l'identifiant de la liste
         * @return ListTask|null
         */
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

        /**
         * Permet de selectionner une liste par son nom
         * @param $name Represente le nom de la liste
         * @return ListTask|null
         */
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

