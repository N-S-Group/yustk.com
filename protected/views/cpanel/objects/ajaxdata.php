<?header("Content-type: application/x-javascript;charset=windows-1251");?>
{"aaData": [
<?

$i = 0;

foreach ($objects as $val) {
    $i++;
    ?>
["<?=$val->cid;?>","<input type='checkbox' id='titleCheck<?=$val->cid;?>' name='selectItem[]' value='<?=$val->cid?>'/>","<?=$val->date_create;?>","<?=$val->title;?>","<?=str_replace('"',"'",$val->shot_description);?>","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='' class='tipS'><img src='<?=Yii::app()->request->baseUrl; ?>/images/icons/edit.png' class='forEditConfirm' id='imgEdit<?=$val->cid?>' alt='' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' class='tipS' ><img src='<?=Yii::app()->request->baseUrl; ?>/images/icons/remove.png' alt='' class='forDelConfirm' id='imgDel<?=$val->cid;?>'/></a>"]<?
    if ($i!=sizeof($objects)) echo ",";
}?>

]}