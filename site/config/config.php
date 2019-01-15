<?php

$rep = __DIR__ . '/../';

$bdd["dsn"] = "mysql:host=localhost;dbname=projetphp";
$bdd["username"] = "root";
$bdd["password"] = "";

$layout['head'] = 'vues/includes/head.php';
$layout['footer'] = 'vues/includes/footer.php';

$vues['list'] = 'vues/list.php';
$vues['error'] = 'vues/error.php';
$vues['contact'] = 'vues/contact.php';
$vues['connect'] = 'vues/connect.php';
$vues['addList'] = 'vues/addList.php';
$vues['tasks'] = 'vues/tasks.php';
$vues['addTask'] = 'vues/addTask.php';
$vues['register'] = 'vues/register.php';