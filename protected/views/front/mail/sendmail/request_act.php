<div style="color:#000000; width:500px;">
	<table>
			<tr><td><b>������������!</b></td></tr>
            <tr><td>��� ��������� ����� ������ �� <?=$model->ClientAgreements->client->name?></td></tr>
    </table>
    <?if($model->type == 2):?>
     <a href="http://yustk.com/uploads/orders/<?=$model->id;?>/Order.pdf" target="_blank">C������</a>
    <?endif;?>
</div>