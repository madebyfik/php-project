<main>
    <div class="container mt-5">
        <h1 class="text-center display-4">Profile</h1>

        <h1 class="text-center display-5 mb-5"><?php echo $user->getPrenom() . ' ' . $user->getNom() ?></h1>

        <?php if(count($liste) > 0) { ?>
            <div class="row text-center"> 
            <?php foreach($liste as $lEl) { ?>
                <div class="col-md-4 listediv">
                    <h1 class="titre-liste"><?php echo $lEl->getNom() ; ?></h1>
                    <a class="btn-style btn btn-warning my-2 my-sm-0 ml-1 mr-2" role="btn" href="index.php?action=tasks&listId=<?php echo $lEl->getId(); ?>">display tasks</a>
                    <form class="mt-1" action="index.php?action=deleteListPrivate" method="post">
                        <input type="hidden" value="<?php echo $lEl->getId(); ?>" id="idListe" name="idListe">
                        <button class="btn-style btn btn-warning my-2 my-sm-0 ml-1 mr-2">delete</button>
                    </form>
                </div>     
            <?php } ?>
            </div>
        <?php } else { ?>
            <h1 class="display-4 text-center mb-5">There should be a list here</h1>
        <?php } ?>
    </div>

</main>