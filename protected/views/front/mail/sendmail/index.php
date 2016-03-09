<?
$type[1] = "Продажа";
$type[2] = "Аренда";
?>

<div style="color:#000000; width:500px;">
	<table>
						<tr><td><b>ФИО:</b></td><td><?=htmlspecialchars($post['fio']);?></td></tr>
                        <tr><td><b>EMAIL:</b></td><td><?=htmlspecialchars($post['email']);?></td></tr>
                        <tr><td><b>Телефон:</b></td><td><?=htmlspecialchars($post['tel']);?></td></tr>
                        <tr><td><b>Сообщение:</b></td><td><?=htmlspecialchars($post['message']);?></td></tr>
    </table>
</div>