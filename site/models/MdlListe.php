<?php

class MdlListe {

    function supprimerListe($id) {
        Validation::valString($id);
        
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $listeGateway = new ListeTacheGateway($con);
        
        $liste = $listeGateway->delete($id);
    }

    function supprimerListePrivate($userId, $id) {
        Validation::valString($userId);
        Validation::valString($id);

        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $listeGateway = new ListeTacheGateway($con);

        $liste = $listeGateway->deletePrivate($userId, $id);
    }

    function listePrivate($id) {
        Validation::valString($id);

        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $listeGateway = new ListeTacheGateway($con);

        $liste = $listeGateway->getPrivate($id);

        return $liste;
    }

    function listePublic() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $listeGateway = new ListeTacheGateway($con);
        $liste = $listeGateway->getAllPublic();
        return $liste;
    }

}