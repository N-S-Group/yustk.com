<div class="main content" style="height: 300px">
    <?if($id){?>
    <h3>�������������� ������.</h3>

    <br>

    <div class="form">
        <a name="send"></a>

        <form id="form_send_to_director" method="POST" action="?#send">
            <p>���������� ����� ������*:<br>
                <input type="text" value="" name="password" id="passwordr" class="required"><br>
                <label class="error" style="color: red" for="password"></label>
            </p>
            <br>
            <p>
                <input type="button" id="recovery" value="���������">
            </p>

        </form>

    </div>
    <?}else{?>
        <br><br><br>
        <h3 style="text-align: center">������ ��� �������������� ������ �� �����. ����������, �������� ��������� ������.</h3>
    <?}?>
</div>
<script>
    var url = "<?=$this->path?>";
    var us = "<?=$id;?>";
    var lo = "<?=$l;?>";
</script>
<script src="<?=$this->path?>/js/recovery.js"></script>