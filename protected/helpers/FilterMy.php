<?
Class FilterMy {

    static function string($arg) {
        if (preg_match("/(^[a-zA-Z0-9]+([a-zA-Z\_0-9\.-]*))$/" , $arg)==NULL)
            return false;
        else
            return true;
    }

    static function stringR($arg) {
        if (preg_match("/(^[a-zA-Z0-9]+([a-zA-Z\_0-9\.-]*))$/" , $arg)==NULL)
            return false;
        else
            return true;
    }

    static function login($arg) {
        if (self::string($arg)) {return self::text($arg);} else return "";
    }

    static function text($arg) {
        return $arg;
    }

    static function int($arg){
        return (int)$arg;
    }

    static function date($arg){
        return $arg;
    }


}

?>