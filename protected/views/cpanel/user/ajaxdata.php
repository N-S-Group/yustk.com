<?header("Content-type: application/x-javascript;charset=windows-1251");?>
{"aaData": [

<?
$i = 0;
foreach ($roles as $val) {
    $i++;
	$checkAuthItem = new extendAythManager();
	$group = $checkAuthItem->getRoleName($val->id);
    ?>

["2","<input type='checkbox' name='selectItem[]' value='<?=$val->id?>'/>","<?=$val->login?>","<?=$val->name?>","<?=$val->email?>","<?=$val->tel?>","<?=$group?>","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='' class='tipS'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png' class='forEditConfirm' id='imgEdit<?=$val->id?>' alt='' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' class='tipS' ><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/remove.png' alt='' class='forDelConfirm' id='idForSend<?=$val->id?>' ref=''/></a>"]
<?
if ($i!=sizeof($roles)) echo ",";
}?>

]}