<?header("Content-type: application/x-javascript;charset=windows-1251");?>
{"aaData": [


<?
$i = 0;
foreach ($roles as $val) {
    $i++;

    ?>

 ["2","<input type='checkbox' name='selectItem[]' value='<?=$val->id?>'/>","<?=MYChtml::filterJSON($val->num_document);?>","<?=MYChtml::filterJSON($val->description)?>","<?=MYDate::contactsDate($val->date)?>","<?=MYChtml::filterJSON($val->ClientAgreements->number)?>","<?=$val->status ==0?'не оплачено':'Оплачено';?>","<?=MYChtml::filterJSON($val->ClientAgreements->client->name)?>","&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='' class='tipS'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/pencil.png' class='forEditConfirm' id='imgEdit<?=$val->id?>' alt='' /></a>&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' class='tipS' ><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/cross.png' alt='' class='forDelConfirm' style='margin-left:0;' id='idForSend<?=$val->id?>' ref=''/></a>"]
    <?
   if($i!=sizeof($roles)) echo",";
}?>

]}