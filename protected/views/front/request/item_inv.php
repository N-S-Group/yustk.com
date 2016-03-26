<tr>
    <td><?=$r->num_document;?></td>
    <?if($two):?>
    <td><?=MYDate::getMounth($r->date);?></td>
    <?endif;?>
    <td><?=MYDate::contactsDate($r->date);?></td>
    <td><?=$r->description;?></td>
    <td>
        <?if($r->status == 0){?>
            <span class='reds'>не оплачено</span>
        <?}else{?>
            <span class='greens' style="color: green">оплачено</span>
        <?}?>
    </td>
    <td><?if($img = MYChtml::getImage('invoices/'.$r->id,'invoice')):?><a href="<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>" download>Cкачать</a><?endif;?></td>
</tr>