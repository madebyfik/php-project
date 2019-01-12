<main>
    <div class="container mt-5">
        <h1 class="display-4 text-center mb-5">Public List</h1>
        <?php if(count($liste) > 0) { ?>
            <div class="row text-center"> 
            <?php foreach($liste as $lEl) { ?>
                <div class="col-md-4 listediv">
                    <h1 class="titre-liste"><?php echo substr($lEl->getNom(), 0, 25) ; ?></h1>
                    <a class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2" role="btn" href="index.php?action=tasks&list=<?php echo $lEl->getId(); ?>">Display tasks</a>
                    <form class="mt-1" action="index.php?action=deleteList" method="post">
                        <input type="hidden" value="<?php echo $lEl->getId(); ?>" id="idListe" name="idListe">
                        <button class="nav-btn btn btn-warning my-2 my-sm-0 ml-1 mr-2">Remove</button>
                    </form>
                </div>     
            <?php } ?>
            </div>
        <?php } else { ?>
            <h1 class="display-4 text-center mb-5">currently no public list</h1>
        <?php } ?>
    </div>

    <div id="third-container"  class="container">
        <h1 class="display-4">add a new list</h1>
        <a id="big-ajout-btn" href="index.php?action=addList" class="mt-2 btn btn-warning" role="btn">ADD</a>   
    </div>

</main>