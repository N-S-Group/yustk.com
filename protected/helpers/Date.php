<?php
/**
 * Created by JetBrains PhpStorm.
 * User: �������������
 * Date: 21.12.12
 * Time: 16:02
 * To change this template use File | Settings | File Templates.
 */
class Date
{
    static $months = Array("������", "�������", "�����", "������", "���", "����", "����", "�������", "��������", "�������", "������", "�������");
    static $weekday = Array("�����������", "�������", "�����", "�������", "�������", "�������", "�����������");

    static function createDateRus($time=false) {
        $time = strtotime($time);
        $date = date("d",$time);
        $mnth = self::$months[(int)date("m",$time)-1];
        $year = date("Y",$time);
        $weekday =  self::$weekday[(int)date("w",$time)];
        return $date.".".date("m",$time).".".$year." �.";

    }

   static  function mysql_date_time($arg) {
        $arr_arg1=explode(" ",$arg);
        $arr_arg=explode("-",$arr_arg1[0]);

        return implode(array_reverse($arr_arg),"-").$arr_arg1[1];

    }


}
