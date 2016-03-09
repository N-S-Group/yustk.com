<?
$type[1] = "Продажа";
$type[2] = "Аренда";
?>

<div style="color:#000000; width:500px;">
	<table>
						<tr><td><b>Тип сделки:</b></td><td><?=$type[$post['type']];?></td></tr>
                        <tr><td><b>Контактное лицо (ФИО):</b></td><td><?=$post['contact'];?></td></tr>
                        <tr><td><b>Телефон:</b></td><td><?=$post['tel'];?></td></tr>
                        <tr><td><b>Email:</b></td><td><?=$post['email'];?></td></tr>
                        <tr><td><b>Объект недвижимости:</b></td><td><?=$post['object'];?></td></tr>
                        <tr><td><b>Город:</b></td><td><?=$post['city'];?></td></tr>
                        <tr><td><b>Стоимость:</b></td><td><?=$post['price'];?></td></tr>
                        <tr><td><b>Описание объекта недвижимости:</b></td><td><?=$post['description'];?></td></tr>
    </table>
</div>