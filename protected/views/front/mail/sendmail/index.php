<?
$type[1] = "�������";
$type[2] = "������";
?>

<div style="color:#000000; width:500px;">
	<table>
						<tr><td><b>��� ������:</b></td><td><?=$type[$post['type']];?></td></tr>
                        <tr><td><b>���������� ���� (���):</b></td><td><?=$post['contact'];?></td></tr>
                        <tr><td><b>�������:</b></td><td><?=$post['tel'];?></td></tr>
                        <tr><td><b>Email:</b></td><td><?=$post['email'];?></td></tr>
                        <tr><td><b>������ ������������:</b></td><td><?=$post['object'];?></td></tr>
                        <tr><td><b>�����:</b></td><td><?=$post['city'];?></td></tr>
                        <tr><td><b>���������:</b></td><td><?=$post['price'];?></td></tr>
                        <tr><td><b>�������� ������� ������������:</b></td><td><?=$post['description'];?></td></tr>
    </table>
</div>