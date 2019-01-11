<?php

class Validation {

    static function valAction($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }

    }

    static function valFormConnection(&$mail, &$password, &$dVueErreur) {
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

    static function valFormListTask(&$nom, &$dVueErreur) {
        if(isset($nom) && !empty($nom)) {
            if($nom != filter_var($nom, FILTER_SANITIZE_STRING)) {
                $dVueErreur[] = "Nom de liste incorrecte";
                $nom = "";
            }
        } else {
            $dVueErreur[] = "Nom de liste incorrecte";
            $nom = "";
        }
    }

    static function valEmail(&$email, &$dVueErreur) {
        if(isset($mail) && !empty($mail)) {
            if($mail != filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $dVueErreur[] = "Adresse mail incorrecte";
                $mail = "";
            }   
        } else {
            $dVueErreur[] = "Veuillez entrer une adresse mail";
            $mail = "";
        }
    }

    static function valString(&$string) {
        filter_var($string, FILTER_SANITIZE_STRING);
    }

}