<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700,700i" rel="stylesheet"> 
        <link rel="stylesheet" href="views/style/style.css">
        <title>To Do List</title>
    </head>


    <body>


        <header>
            <nav class="navbar navbar-expand-lg  navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    To Do List GANG
                </a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-principal, #navbar-secondaire" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navbar-principal">
                    <ul class="navbar-nav">
                        <li class="nav-item ml-2">
                            <a class="nav-link hvr-underline-from-center" href="index.php">Liste</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link hvr-underline-from-center" href="index.php?action=contact">Contact</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link hvr-underline-from-center" href="index.php?action=apropos">A Propos</a>
                        </li>
                    </ul>
                </div>

                <div class="collapse navbar-collapse navbar-header justify-content-end" id="navbar-secondaire">
                    <a href="index.php?action=connectGet" class="nav-btn btn btn-light my-2 my-sm-0 ml-1 mr-2" role="btn">Connexion</a>
                    <a href="#" class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2" role="btn">Inscription</a>
                </div>
            </nav>
        </header>