<div class="login">
    <span><b>������ �������:</b></span><br>
    ��� ������������: <input type="text" value="" id="login"> ������: <input type="password" value="" id="password"><br>

    <a href="">�����������</a>&nbsp;&nbsp;&nbsp;
    <a href="#modal">������ ������</a>&nbsp;&nbsp;&nbsp;
    <a href="#" id="submit"><b>����</b></a>
    <script>
        var url = "<?=$this->path?>";
    </script>
    <script src="<?=$this->path?>/js/login.js"></script>
</div>

<div class="remodal" data-remodal-id="modal">
    <h1>�������������� ������</h1>
    <p>
        ������� ��� e-mail
    </p>
    <p>
        <input type="text" id="email"><span id="validEmail"></span>

        <br><span id="showerrorsEmail" style="color: red;"></span>
    </p>

    <button type="button"  class="confirm" value="������������">������������
        <br>
        <!--<a class="remodal-cancel" href="#">������</a>-->
        <!--<a class="remodal-confirm" href="#">������������</a>-->
</div>