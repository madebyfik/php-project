<?php

/**
 * Class Validation
 */
class Validation {

    /**
     * @param $action Represente l'action à faire
     * @throws Exception
     */
    static function valAction($action) {
        if (!isset($action)) {
            throw new Exception('There isn\'t any action');
        }
    }

    /**
     * Permet de valider le formulaire de connexion
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $password Represente le mot de passe de l'utilisateur
     * @param $errorArray Represente le message d'erreur
     */
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

    /**
     * Permet de valider le formulaire de création d'une liste
     * @param $name Represente le nom de la liste
     * @param $errorArray Represente le message d'erreur
     */
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

    /**
     * Permet de valider le formulaire de création de tache
     * @param $name Represente le nom de la tache
     * @param $description Represente la descriptionde la tache
     * @param $errorArray Represente le message d'erreur
     */
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

    /**
     * Permet de verifier la saisie d'une adresse mail
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $errorArray Represente le message d'erreur
     */
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

    /**
     * Permet de valisder une chaine de caracteres
     * @param $string Represente une chaine de caractères
     */
    static function valString(&$string) {
        filter_var($string, FILTER_SANITIZE_STRING);
    }

    /**
     * Permet de valider le formulaire de création de compte
     * @param $email Represente l'adresse mail de l'utilisateur
     * @param $name Represente le prenom de l'utilisateur
     * @param $surname Represente le nom de l'utilisateur
     * @param $password Represente le mot de saas de l'utilisateur
     * @param $passwordConfirmation Represente la confirmation du mot de passe de l'utilisateur
     * @param $errorArray Represente le message d'erreur
     */
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

    /**
     * Permet de valider le formulaire de création de tache
     * @param $idTask Represente l'identifiant de la tache
     * @param $completeTask Represente la completion de la tache
     * @param $errorArray Represente le message d'erreur
     */
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