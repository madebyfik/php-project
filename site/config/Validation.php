<?php

class Validation {

    static function valAction($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }

    }

    static function valFormConnexion(&$mail, &$password, &$dVueErreur) {
        if(isset($mail) && !empty($mail)) {
            if($mail != filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $dVueErreur[] = "Adresse mail incorrecte";
                $mail = "";
            }   
        } else {
            $dVueErreur[] = "Veuillez entrer une adresse mail";
            $mail = "";
        }

        if(isset($password) && !empty($password)) {
            if($password != filter_var($password, FILTER_SANITIZE_STRING)) {
                $dVueErreur[] = "Mot de passe incorrecte";
                $password = "";
            }
        } else {
            $dVueErreur[] = "Veuillez entrer un mot de passe";
            $password = "";
        }
    }

    static function valFormListTache(&$nom, &$public, &$idUtilisateur) {

        if(!isset($nom) && !empty($nom)) {
            if($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
                $dVueErreur[] = "Nom de liste incorrecte";
                $nom = "";
            }
        } else {
            $dVueEreur[] = "Veuillez entrer une adresse mail";
            $nom = "";
        }

        if(!isset($public) && !empty($public)) {
            if($public != filter_var($public, FILTER_VALIDATE_BOOLEAN)) {
                $dVueErreur[] = "Boolean non valide";
                $public = "";
            }
        } else {
            $dVueErreur[] = "Boolean non valide";
            $public = "";
        }

        if(!isset($idUtilisateur) && !empty($idUtilisateur)) {
            if($idUtilisateur != filter_var($idUtilisateur, FILTER_VALIDATE_INT)) {
                $dVueErreur[] = "Erreur lors de la création de la liste";
                $public = "";
            }
        } else {
            $dVueErreur[] = "Erreur lors de la création de la liste";
            $idUtilisateur = "";
        }

    }

    static function valFormListTacheVisiteur(&$nom) {

        if(!isset($nom) && !empty($nom)) {
            if($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
                $dVueErreur[] = "Nom de liste incorrecte";
                $nom = "";
            }
        } else {
            $dVueEreur[] = "Veuillez entrer une adresse mail";
            $nom = "";
        }

    } 

    static function valString(&$string) {
        filter_var($string, FILTER_SANITIZE_STRING);
    }

}