<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php

$dataSourceName = "mysql:host=localhost;dbname=projetphp";

try {
    $db = new PDO($dataSourceName, 'root', '');
    $db->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo("<h1>" . $e->getMessage() . "</h1>");
}



$query = "SELECT * FROM list_tache";

$stmt = $db->prepare($query);

$stmt->execute();
$results = $stmt->fetchAll();

foreach($results as $row) {
    echo('<h3>Nom de la liste : '.$row['nom'].'</h3>');

    echo("<h4>Taches de la liste: </h4>");

    $query2 = "SELECT * FROM tache WHERE id_list=:id_list";
    $stmt2 = $db->prepare($query2);
    $stmt2->bindValue(':id_list', $row['id'], PDO::PARAM_INT);
    $stmt2->execute();

    $results2 = $stmt2->fetchAll();

    foreach($results2 as $row2) {
        echo('Nom de la tache: '. $row2['nom'] .'<br>');
        echo('Description de la tache: '. $row2['description'].'<br>'); 
    }
    echo("<br><br>");   
}
?>

</body>
</html>

