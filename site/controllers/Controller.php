<?php

ini_set('display_errors', 0);

abstract class Controller {

    public function render($rep, $page, $layoutRequire=true, $data=[]) {
        global $layout;

        extract($data);

        if($layoutRequire) {
            require($rep . $layout['head']);

            require($rep . $page);

            require($rep . $layout['footer']);
        } else {
            require($rep . $page);
        }
            
    }

    public function navigation($page) {
        global $vues, $rep, $data;

        $this->render($rep, $vues[$page], true, $data);
    }

    public function addList() {
        global $vues, $rep, $data;

        extract($_POST);
        
        $userModel = new UserModel();
        $listTaskModel = new ListTaskModel();

        if(isset($listeName) && isset($privatePublic)) {

            if(isset($data['isLoggedIn'])) {
                try {
                    $user = $userModel->userProfile($_SESSION['email']);
                    $listTaskModel->addList($listeName, $privatePublic, $user->getId());
                    header("Location: index.php");
                } catch(Exception $e) {
                    $this->render($rep, $vues['addList'], false, $data);
                }
            } else {
                try {
                    $listTaskModel->addListPublic($listeName);
                } catch(Exception $e) {
                    $data['error'] = $e->getMessage();
                    $this->render($rep, $vues['addList'], false, $data);
                }
            }
        } else {
            $this->render($rep, $vues['addList'], false, $data);
        }
        
    }
 
    public function list() {
        global $vues, $rep, $data;

        $listTaskModel = new ListTaskModel();
        $userModel = new UserModel();

        $listTask = $listTaskModel->listPublic();

        if(isset($_SESSION["email"])) {
            try {
                $user = $userModel->userProfile($_SESSION['email']);
                $listTaskPrivate = $listTaskModel->listPrivate($user->getId());

                $data["listPrivate"] = $listTaskPrivate;
            } catch (Exception $e) {
                header("Location: index.php");
            }
        }

        $data["liste"] = $listTask;

        $this->render($rep, $vues['list'], true, $data);

    }

    public function deleteList() {
        global $vues, $rep, $data;

        $listTaskModel = new ListTaskModel();
        
        $listTaskModel->deleteList($_POST['idListe']);

        header("Location: index.php");
    }

    public function displayTasks() {
        global $vues, $rep, $data;

        extract($_GET);

        $listTaskModel = new ListTaskModel();
        $userModel = new UserModel();
        $taskModel = new TaskModel();

        try {
            $listTask = $listTaskModel->isList($listId);

            if($listTask->getPublic() === '1') {
                $taskArray = $taskModel->getTask($listId);
                $data["listTask"] = $listTask;
                $data["tasks"] = $taskArray;
                $data["listId"] = $listTask->getId();
            } else {
                if(isset($_SESSION["email"])) {
                    try {
                        $user = $userModel->userProfile($_SESSION['email']);
            
                        if($user->getId() === $listTask->getIdUtilisateur()) {
                            $taskArray = $taskModel->getTask($listId);
                            $data["listTask"] = $listTask;
                            $data["tasks"] = $taskArray;
                            $data["listId"] = $listTask->getId();
                        } else {
                            header("Location: index.php");
                        }
                    } catch (Exception $e) {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            }
        } catch(Exception $e) {
            header("Location: index.php");
        }

        $this->render($rep, $vues['tasks'], true, $data);
    }

    public function addTask() {
        global $vues, $rep, $data;

        extract($_GET);
        extract($_POST);
        
        $userModel = new UserModel();
        $listTaskModel = new ListTaskModel();
        $taskModel = new TaskModel();

        if(isset($listId)) {
            try {
                $listTask = $listTaskModel->isList($listId);
                $data["listTask"] = $listTask;
            } catch(Exception $e) {
                header("Location: index.php");
            }
        }
        
        if(isset($taskName) && isset($taskDescription)) {
            
            if($listTask->getPublic() === '1') {
                try {
                    $taskModel->addTask($taskName, $taskDescription, $listTask->getId());
                    header("Location: index.php?action=tasks&listId=".$listTask->getId());
                } catch (Exception $e) {
                    $data['error'] = $e->getMessage();
                }
            } else {
                if(isset($_SESSION["email"])) {
                    try {
                        $user = $userModel->userProfile($_SESSION['email']);
            
                        if($user->getId() === $listTask->getIdUtilisateur()) {
                            try {
                                $taskModel->addTask($taskName, $taskDescription, $listTask->getId());
                                header("Location: index.php?action=tasks&listId=".$listTask->getId());
                            } catch(Exception $e) {
                                $data['error'] = $e->getMessage();
                                $this->render($rep, $vues['addTask'], false, $data);
                            }
                        } else {
                            header("Location: index.php");
                        }
                    } catch (Exception $e) {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            }
        }
        $this->render($rep, $vues['addTask'], false, $data);
    }

    public function completeTask() {
        global $vues, $rep, $data;

        extract($_POST);
        
        $userModel = new UserModel();
        $listTaskModel = new ListTaskModel();
        $taskModel = new TaskModel();
        
        if(isset($listId) && isset($idTask) && isset($completeTask)) {

            try {
                $listTask = $listTaskModel->isList($listId);
            } catch(Exception $e) {
                header("Location: index.php");
            }
            
            if($listTask->getPublic() === '1') {
                try {
                    $taskModel->updateCompleted($idTask, $completeTask);
                    header("Location: index.php?action=tasks&listId=" . $listId);
                } catch (Exception $e) {
                    $data['error'] = $e->getMessage();
                }
            } else {
                if(isset($_SESSION["email"])) {
                    try {
                        $user = $userModel->userProfile($_SESSION['email']);
            
                        if($user->getId() === $listTask->getIdUtilisateur()) {
                            try {
                                $taskModel->updateCompleted($idTask, $completeTask);
                            } catch(Exception $e) {}
                            header("Location: index.php?action=tasks&listId=" . $listId);
                        } else {
                            header("Location: index.php");
                        }
                    } catch (Exception $e) {
                        header("Location: index.php");
                    }
                } else {
                    header("Location: index.php");
                }
            }
        } else {
            header("Location: index.php");
        } 
    }

}