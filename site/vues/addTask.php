<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700,700i" rel="stylesheet"> 
        <link rel="stylesheet" href="vues/style/style-form.css">
        <title>Add a task : <?php echo $listTask->getNom(); ?></title>
    </head>

    <body class="text-center">
        <form id="formulaire-login" action="index.php?action=addTask&listId=<?php echo $listTask->getId(); ?>" method="POST">
            <a href="index.php">
                <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Dragon_Ball_%28manga%2C_perfect%29_Logo.svg" alt="" width="200" height="72">
            </a>
            <h1 class="h3 mb-3 font-weight-normal">Add a task to <?php echo $listTask->getNom(); ?></h1>
            <?php if($error) { ?> 
            <div class="mb-3 pb-0 alert alert-danger" role="alert">
                <p><?php echo $error ?></p> 
            </div>   
            <?php } ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                </div>
                <input class="form-control" type="text" name="taskName" id="taskName" placeholder="task name" aria-label="Liste Name">
            </div>

            <div class="input-group mb-3">
                <textarea id="taskDescription" name="taskDescription" placeholder="description..." class="form-control" aria-label="With textarea"></textarea>
            </div>

            <button type="submit" class="btn-block btn-lg btn btn-warning">Add</button>


            <p class="mt-5 mb-3 text-muted">&copy; 2018 Fifi & Roro - All rights reserved</p>
        </form>

    </body>

</html>