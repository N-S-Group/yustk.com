<div style="color:#000000; width:500px;">
	<table>
			<tr><td><b>Здравствуйте!</b></td></tr>
            <tr><td>Вам поступила новая заявка от <?=$model->ClientAgreements->client->name?></td></tr>
    </table>
    <?if($model->type == 2):?>
     <a href="http://yustk.com/uploads/orders/<?=$model->id;?>/Order.pdf" target="_blank">Cкачать</a>
    <?endif;?>
</div>