<div class="login">
    <span><b>��� "�������-�����"</b></span> / <a href="<?=$this->createUrl("/login/exit")?>"><b>�����</b></a><br>
    �������� ����� ��������: <select><option type="text" value="">11/155521-2</option><option type="text" value="">11/15FA21-2</option></select><br>
    <b>������:</b> -590 ���. &nbsp;&nbsp;&nbsp;
    <?if ($this->section != "docs") {?><a href="<?=$this->createUrl("/cabinet/index")?>">���������</a><?} else echo "<b>���������</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "invoices") {?><a href="<?=$this->createUrl("/cabinet/invoices")?>">�����</a><?} else echo "<b>�����</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "requests") {?><a href="<?=$this->createUrl("/cabinet/requests")?>">������</a><?} else echo "<b>������</b>"?>&nbsp;&nbsp;&nbsp;
    <?if ($this->section != "contracts") {?><a href="<?=$this->createUrl("/cabinet/contracts")?>">������� ��������</a><?} else echo "<b>������� ��������</b>"?>&nbsp;&nbsp;&nbsp;
</div>
