<?
$type[1] = "�������";
$type[2] = "������";
?>

<div style="color:#000000; width:500px;">
	<table>
						<tr><td><b>���:</b></td><td><?=htmlspecialchars($post['fio']);?></td></tr>
                        <tr><td><b>EMAIL:</b></td><td><?=htmlspecialchars($post['email']);?></td></tr>
                        <tr><td><b>�������:</b></td><td><?=htmlspecialchars($post['tel']);?></td></tr>
                        <tr><td><b>���������:</b></td><td><?=htmlspecialchars($post['message']);?></td></tr>
    </table>
</div>