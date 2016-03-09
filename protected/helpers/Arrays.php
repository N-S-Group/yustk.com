<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 02.02.13
 * Time: 11:44
 * To change this template use File | Settings | File Templates.
 */

class Arrays
{


    static function toCountsArray($array) {
    if (!is_array($array)) return array();
        $resultArray = array();
        foreach ($array as $val) {
            $resultArray[$val["pid"]] = $val["COUNT(id)"];
        }
        return $resultArray;
    }


}