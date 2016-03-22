<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class MYFiles
{
    public static function uploadFile($name,$object){

        $info_dir = getcwd().'/uploads/'.$name.'/';

        self::clearDir($info_dir);

        if(!is_dir($info_dir)) mkdir($info_dir,7777);
        return(!$object->saveAs($info_dir.strtolower($object))) ? false : true;
    }

    public static function clearDir( $dir ) {
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? MYFiles::clearDir($obj) : unlink($obj);
            }
        }
    }
}
