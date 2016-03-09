<?php

class Mysql {

    static public $links;

    //function __construct() {
    //global  $link;
    //$this->links=$link;
    //}

    static function connect() {
        global  $link;
        self::$links=$link;
    }


    static function nonQuery($sql) {
		//mysql_query("SET NAMES cp1251");
        if (!mysql_query($sql)) {
            self::logger("SQL ERROR text-query: ".$sql."\r\n\r\n".mysql_error());
            return false;
        } else {if ( mysql_insert_id()>0) return mysql_insert_id(); else return 1;}
    }

    static  private function  logger($msg) {

        if ($GLOBALS['logger']=="show" or !isset ($GLOBALS['logger'])) trigger_error($msg, E_USER_ERROR);
        if ($GLOBALS['logger']=="sql" and isset ($GLOBALS['logTbl'])) mysql_query("Insert into ".$GLOBALS['logTbl']." (dates, texts) values (now(), '".mysql_escape_string($msg)."')");

    }


    static  function query ($sql) {
	mysql_query("SET NAMES cp1251");
        if (!mysql_query($sql)) {
            self::logger("SQL ERROR text-query: ".$sql."\r\n\r\n".mysql_error());
            return false;
        } else
        {
            return mysql_query($sql);
        }
    }



    static  function error (){
        return mysql_error();
    }

    static  function num_rows($res) {
        return mysql_num_rows($res);
    }

    static  function last_id() {
        return mysql_insert_id();
    }

    static  function fetch_array($res) {

        return mysql_fetch_array($res);

    }

    static function pages_uni ($page, $all, $query)
    {
        $page_1=$page-1;

        $found_rows_temp=mysql_num_rows(mysql_query($query));

        $found_rows=$found_rows_temp;
        $page_all=$page*$all;
        if ($page_all>$found_rows) {$limit2=$all-($page_all-$found_rows); $limit1=$found_rows-$limit2;   }
        else
        { $limit1=$page_1*$all;  $limit2=$all;}
        $Query=$query."  LIMIT ".$limit1.",".$limit2;
        return $Query;
    }

}

?>