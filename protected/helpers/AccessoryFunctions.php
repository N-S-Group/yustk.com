<?php

class AccessoryFunctions {

    public static function clearTel($tel) {
        return ereg_replace("[+ ()-]","",$tel);
    }

    public static function doubleLogin($login){
        return Users::model()->count("login=:login",array(":login"=>self::clearTel($login)));
    }

    public static function doubleEmail($email){
        return Users::model()->count("email=:email",array(":email"=>self::clearTel($email)));
    }

    public static function ajaxMessage($text){
        echo $text;
        die;
    }

}