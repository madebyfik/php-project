<!DOCTYPE html>

<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700,700i" rel="stylesheet"> 
        <link rel="stylesheet" href="vues/style/style.css">
        <title>To Do List</title>
    </head>


    <body>


        <header>
            <nav class="navbar navbar-expand-lg  navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Dragon_Ball_%28manga%2C_perfect%29_Logo.svg" alt="" width="100" height="42">
                </a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-principal, #navbar-secondaire" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php if(!$isLoggedIn) { ?>
                    <div class="collapse navbar-collapse navbar-header justify-content-end" id="navbar-secondaire">
                        <a href="index.php?action=connect" class="nav-btn btn btn-light my-2 my-sm-0 ml-1 mr-2" role="btn">Login</a>
                        <a href="index.php?action=register" class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2" role="btn">Register</a>
                    </div>
                <?php } else { ?>
                    <div class="collapse navbar-collapse navbar-header justify-content-end" id="navbar-secondaire">
                        <form action="index.php?action=disconnect" method="post">
                            <button class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2">Log out</button>
                        </form>
                    </div>
                <?php } ?>
            </nav>
        </header>