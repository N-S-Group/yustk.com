<?header("Content-type: application/x-javascript;charset=windows-1251");?>
{"aaData": [


<?
$clients = Clients::model()->findAll();
$i = 0;

foreach ($roles as $val) {
    $i++;

    ?>

 ["2","<input type='checkbox' name='selectItem[]' value='bl<?=$val->id?>'/>","<?=$val->name;?>","<?=$val->login?$val->login:'-';?>","<?=$val->phone;?>","Администратор","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='' class='tipS'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/pencil.png' class='forEditConfirm' id='imgEdit<?=$val->id?>' alt='' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' class='tipS' ><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/cross.png' alt='' class='forDelConfirm' style='margin-left:0;' id='idForSend<?=$val->id?>' ref=''/></a>"]
    <?

   if ($i!=sizeof($roles) OR sizeof($clients)) echo",";
}?>

<?
$i = 0;

foreach ($clients as $val) {
    $i++;

    ?>

    ["2","<input type='checkbox' name='selectItem[]' value='cl<?=$val->id?>'/>","<?=$val->name;?>","<?=$val->login?$val->login:'-';?>","","Пользователь сайта","&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#' title='' class='tipS'><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/pencil.png' class='forEditConfirm' id='cliEdit<?=$val->id?>' alt='' /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0);' class='tipS' ><img src='<?php echo Yii::app()->request->baseUrl; ?>/images/icons/color/cross.png' alt='' class='forDelConfirm' style='margin-left:0;' id='clForSend<?=$val->id?>' ref=''/></a>"]
    <?

    if ($i!=sizeof($clients)) echo ",";
}?>

]}