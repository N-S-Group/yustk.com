<div class="content main" style="border-top: 2px solid #d6d6d6">
    <h3>������</h3><br>
    <b class="blues">������ ���� ������</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class="blues" href="<?=$this->createUrl("/cabinet/requests2")?>">������ �� ���� �����������</a>
    <p>
    ����� ������� ��� ������ �� <b>������</b>: <input type="text" value="01.01.2015"> - <input type="text" value="01.01.2016"><br>
    <b>�� �������� �: </b><span id="request_dogovor"></span><br><br>
    <input type="button" id="request_send" value="��������� ������">
    <img id="send_load" style="display: none" src="<?=$this->path?>/images/loaders/loader19.gif">
    </p>
    <br><br>
    <div id="info_request">
    </div>
</div>
<script>
    var request = 1;
</script>
<div class="remodal" data-remodal-id="modal_request">
    <h1>��� ������ ��������� �������!</h1>
</div>
<script src="<?=$this->path?>/js/request.js"></script>