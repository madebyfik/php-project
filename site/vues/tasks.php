<main>
    <div>
        <h1 class="text-center display-5 mt-5 mb-5">List : <?php echo $listTask->getNom(); ?></h1>

        <?php if(count($tasks) > 0) { ?>
            <div class="text-center"> 
            <?php foreach($tasks as $task) { ?>
                <div class="card-task card card text-center">
                
                    <div class="card-header">
                        <h3 style="text-decoration: <?php echo $task->getCompleted() === '1' ? 'line-through' : 'none';?>;"><?php echo $task->getNom(); ?></h3>
                    </div>

                    <div class="card-body">
                        <p class="card-text"><?php echo $task->getDescription(); ?></p>
                    </div>

                    <div class="card-footer">
                        <form action="index.php?action=completeTask" method="post">
                            <input id="listId" name="listId" value="<?php echo $_GET["listId"]; ?>" type="hidden">
                            <input id="idTask" name="idTask" value="<?php echo $task->getId(); ?>" type="hidden">
                            <input id="completeTask" name="completeTask" value="<?php echo $task->getCompleted(); ?>" type="hidden">
                            <button class="btn-style btn btn-warning my-2 my-sm-0 ml-1 mr-2"><?php echo $task->getCompleted() === '1' ? 'Uncomplete' : 'Complete';?></button>
                        </form>
                    </div>

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