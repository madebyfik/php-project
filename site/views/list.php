<main>
    
    <?php if(count($liste) > 0) {
        foreach($liste as $lEl) {
            echo $lEl->getNom() . '<br>';
        }
    } else { ?>
        <h1>Il y'a une liste ici normalement</h1>
    <?php } ?>
    


</main>