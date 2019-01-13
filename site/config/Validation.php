<?php

class Validation {

    static function valAction($action) {
        if (!isset($action)) {
            throw new Exception('There isn\'t any action');
        }
    }

    static function valFormConnection(&$email, &$password, &$errorArray) {
        if(isset($email) && !empty($email)) {
            if($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorArray[] = "Mail is incorrect";
                $email = "";
            }   
        } else {
            $errorArray[] = "Mail is incorrect";
            $email = "";
        }

        if(isset($password) && !empty($password)) {
            if($password != filter_var($password, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Password is incorrect";
                $password = "";
            }
        } else {
            $errorArray[] = "Mail is incorrect";
            $password = "";
        }
    }

    static function valFormListTask(&$name, &$errorArray) {
        if(isset($name) && !empty($name)) {
            if($name != filter_var($name, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "List name is incorrect";
                $name = "";
            }
        } else {
            $errorArray[] = "List name is incorrect";
            $name = "";
        }
    }

    static function valFormTask(&$name, &$description, &$errorArray) {
        if(isset($name) && !empty($name)) {
            if($name != filter_var($name, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Task name is incorrect";
                $name = "";
            }
        } else {
            $errorArray[] = "Task name is incorrect";
            $name = "";
        }

        if(isset($description) && !empty($description)) {
            if($description != filter_var($description, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Task description is incorrect";
                $description = "";
            }
        } else {
            $errorArray[] = "Task description is incorrect";
            $description = "";
        }
    }

    static function valEmail(&$email, &$errorArray) {
        if(isset($email) && !empty($email)) {
            if($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorArray[] = "Mail is incorrect";
                $email = "";
            }   
        } else {
            $errorArray[] = "Mail is incorrect";
            $email = "";
        }
    }

    static function valString(&$string) {
        filter_var($string, FILTER_SANITIZE_STRING);
    }

    static function valFormRegister(&$email, &$name, &$surname, &$password, &$passwordConfirmation, &$errorArray){
        if(isset($email) && !empty($email)) {
            if($email != filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorArray[] = "Mail is incorrect";
                $email = "";
            }   
        } else {
            $errorArray[] = "Please enter your email adress";
            $email = "";
        }

        if(isset($surname) && !empty($surname)) {
            if($surname != filter_var($surname, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Surname is incorrect";
                $surname = "";
            }
        } else {
            $errorArray[] = "Please enter your surname";
            $surname = "";
        }

        if(isset($name) && !empty($name)) {
            if($name != filter_var($name, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Name is incorrect";
                $name = "";
            }
        } else {
            $errorArray[] = "Please enter your first name";
            $name = "";
        }

        if(isset($password) && !empty($password)) {
            if($password != filter_var($password, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "Password is incorrect";
                $password = "";
            }
        } else {
            $errorArray[] = "Please enter a password";
            $password = "";
        }

    }

    static function valFormCompleteTask($idTask, $completeTask, $errorArray) {
        if(isset($idTask) && !empty($idTask)) {
            if($idTask != filter_var($idTask, FILTER_SANITIZE_NUMBER_INT)) {
                $errorArray[] = "id task is incorrect";
                $idTask = "";
            }
        } else {
            $errorArray[] = "id task is incorrect";
            $name = "";
        }

        if(isset($completeTask) && !empty($completeTask)) {
            if($completeTask != filter_var($completeTask, FILTER_SANITIZE_STRING)) {
                $errorArray[] = "complete task value is incorrect";
                $completeTask = "";
            }
        } else {
            $errorArray[] = "complete task value is incorrect";
            $completeTask = "";
        }
    }

}