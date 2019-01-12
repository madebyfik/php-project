<main>
    <div>
    <h1 class="text-center display-5 mt-5 mb-5">List : <?php echo $listTask->getNom(); ?></h1>

        <?php if(count($tasks) > 0) { ?>
            <div class="row text-center"> 
            <?php foreach($tasks as $task) { ?>
                <div class="col-md-4 listediv">
                    <h1 class="titre-liste"><?php echo $task->getNom(); ?></h1>
                </div>     
            <?php } ?>
            </div>
        <?php } else { ?>
            <h1 class="display-4 text-center mb-5">currently no task for this list</h1>
        <?php } ?>

    </div>

    <div id="third-container" class="container">
        <a href="index.php?action=addTask&listId=<?php echo $listId; ?>" class="btn-style mt-2 btn btn-warning" role="btn">add a new task</a>   
    </div>
</main>