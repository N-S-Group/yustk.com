<?=header('Content-Type: text/html; charset=windows-1251')?>
<?if($r = Orders::model()->findAll("`agreement_id`=:agreement_id and `type`=:type",array(":agreement_id"=>$d,":type"=>$request))):?>
    <b class="blues">История заявок</b><br>
<table class="price">
    <thead>
    <tr>
        <td>№ заявки</td>
        <td>Дата</td>
        <td>Тип</td>
        <?if($request==2):?>
        <td>Скачать</td>
        <?endif;?>
    </tr>
    </thead>
    <tbody>
    <?foreach($r as $item):?>
        <tr>
            <td><?=$item->id;?></td>
            <td><?=MYDate::contactsDate($item->date)?></td>
            <td><?=$item->name;?></td>
        <?if($request==2):?>
            <td> <?if($img = MYChtml::getImage('orders/'.$item->id,'Order')):?><a href="<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>" download>Cкачать</a><?endif?></td>
        <?endif;?>
        </tr>
    <?endforeach;?>
    <!--<tr>
        <td>11<td>
        <td>12.01.2015<td>
        <td>Запрос акта сверки</td>
        <td><a href="">Cкачать</a></td>
    </tr>

    <tr>
        <td>12<td>
        <td>12.01.2015<td>
        <td>Запрос акта сверки</td>
        <td><a href="">Cкачать</a></td>
    </tr>-->
    </tbody>

</table>
<?endif;?>