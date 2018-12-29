<?php

class MdlListe {

    function listePublic() {
        $con = new Connection('mysql:host=localhost;dbname=projetphp', 'root', '');
        $listeGateway = new ListeTacheGateway($con);
        $liste = $listeGateway->getAllPublic();
        return $liste;
    }

}