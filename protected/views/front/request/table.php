<?=header('Content-Type: text/html; charset=windows-1251')?>
<?if($r = Orders::model()->findAll("`agreement_id`=:agreement_id and `type`=:type",array(":agreement_id"=>$d,":type"=>$request))):?>
    <b class="blues">������� ������</b><br>
<table class="price">
    <thead>
    <tr>
        <td>� ������</td>
        <td>����</td>
        <td>���</td>
        <?if($request==2):?>
        <td>�������</td>
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
            <td> <?if($img = MYChtml::getImage('orders/'.$item->id,'Order')):?><a href="<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>" download>C������</a><?endif?></td>
        <?endif;?>
        </tr>
    <?endforeach;?>
    <!--<tr>
        <td>11<td>
        <td>12.01.2015<td>
        <td>������ ���� ������</td>
        <td><a href="">C������</a></td>
    </tr>

    <tr>
        <td>12<td>
        <td>12.01.2015<td>
        <td>������ ���� ������</td>
        <td><a href="">C������</a></td>
    </tr>-->
    </tbody>

</table>
<?endif;?>