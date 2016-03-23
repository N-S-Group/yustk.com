<?header("Content-type: application/x-javascript;charset=windows-1251");?>
{"aaData": [


<?
$i = 0;
foreach($roles as $val){
    $i++;

    ?>

["2","<input type='hidden' name='selectItem[]' value='<?=$val->id?>'/>","<?=$val->name;?>","<?=$val->ClientAgreements->number?>","<?=MYChtml::filterJSON($val->ClientAgreements->client->name)?>","<?=MYDate::contactsDate($val->date)?>","<?if($val->type == 2 && ($img = MYChtml::getImage('orders/'.$val->id,'Order'))):?><a href='<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>' download>Скачать</a><?endif;?>"]
<? if ($i!=sizeof($roles)) echo",";
}?>
]}