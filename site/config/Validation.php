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

    static function valEmail(&$email, &$errorArray) {
        if(isset($mail) && !empty($mail)) {
            if($mail != filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $errorArray[] = "Mail is incorrect";
                $mail = "";
            }   
        } else {
            $errorArray[] = "Mail is incorrect";
            $mail = "";
        }
    }

    static function valString(&$string) {
        filter_var($string, FILTER_SANITIZE_STRING);
    }

}