<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:700,700i" rel="stylesheet"> 
        <link rel="stylesheet" href="views/style/style-form.css">
        <title>QLF Connexion</title>
    </head>

    <body class="text-center">
        <form id="formulaire-login" action="index.php?action=connect" method="POST" novalidate>
        <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/8/8b/Dragon_Ball_%28manga%2C_perfect%29_Logo.svg" alt="" width="200" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input class="form-control" type="email" name="usermail" id="usermail" placeholder="user@example.com" aria-label="User Email">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                </div>
                <input class="form-control" type="password" name="userpass" id="userpass" placeholder="****" aria-label="User Password">
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Rester connecté
                </label>
            </div>

            <button type="submit" class="btn-block btn-lg btn btn-warning">Connexion</button>

            <div class="mt-2">
                <p><a href="/signup">S'inscrire</a> ou <a href="/reset">Mot de passe oublié</a> ?</p>
            </div>


            <p class="mt-5 mb-3 text-muted">&copy; 2018 Los Igos Games - Tous droits réservés</p>
        </form>

    </body>

</html>