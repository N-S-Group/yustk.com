<?$data = Clients::getData();?>
<div class="login">
    <span><b><?=$data['user']?></b></span> / <a href="<?=$this->createUrl("/login/exit")?>"><b>�����</b></a><br>
    <?if(count($data['clientAgreements'])){?>
        �������� ����� ��������:
        <select id="clientAgreements">
            <?foreach($data['clientAgreements'] as $key):?>
                <option type="text" value="<?=$key['id'];?>"><?=$key['name'];?></option>
            <?endforeach;?>
        </select><br>
        <b>������:</b> -590 ���. &nbsp;&nbsp;&nbsp;
        <?if ($this->section != "docs") {?><a href="<?=$this->createUrl("/cabinet/index")?>">���������</a><?} else echo "<b>���������</b>"?>&nbsp;&nbsp;&nbsp;
        <?if ($this->section != "invoices") {?><a href="<?=$this->createUrl("/cabinet/invoices")?>">�����</a><?} else echo "<b>�����</b>"?>&nbsp;&nbsp;&nbsp;
        <?if ($this->section != "requests" AND $this->section != "requests2") {?><a href="<?=$this->createUrl("/cabinet/requests")?>">������</a><?} else echo "<b>������</b>"?>&nbsp;&nbsp;&nbsp;
    <?}else{?>
        �� ������ �������� �� ��������� �� ���� �������<br>

    <?}?>
        <?if ($this->section != "contracts") {?><a href="<?=$this->createUrl("/cabinet/contracts")?>">������� ��������</a><?} else echo "<b>������� ��������</b>"?>&nbsp;&nbsp;&nbsp;
</div>

<script>
    var url = "<?=$this->path?>";
</script>