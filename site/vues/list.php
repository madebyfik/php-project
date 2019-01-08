<main>
    <div class="container mt-5">
        <h1 class="display-4 text-center mb-5">Liste Public</h1>
        <?php if(count($liste) > 0) { ?>
            <div class="row text-center"> 
            <?php foreach($liste as $lEl) { ?>
                <div class="col-md-4 listediv">
                    <h1 class="titre-liste"><?php echo $lEl->getNom() ; ?></h1>
                    <form action="index.php?action=deleteList" method="post">
                        <input type="hidden" value="<?php echo $lEl->getId(); ?>" id="idListe" name="idListe">
                        <button class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2">Supprimer</button>
                    </form>
                </div>     
            <?php } ?>
            </div>
        <?php } else { ?>
            <h1 class="display-4 text-center mb-5">il y'a aucune liste public actuellement</h1>
        <?php } ?>
    </div>

    <div id="third-container"  class="container">
        <h1 class="display-4">ajouter une nouvelle liste</h1>
        <a id="big-ajout-btn" href="index.php?action=addList" class="mt-2 btn btn-warning" role="btn">AJOUTER</a>   
    </div>

</main>