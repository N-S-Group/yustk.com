<script type="text/javascript" src="<?=$this->path?>/js/datepicker/picker.js"></script>
<script type="text/javascript" src="<?=$this->path?>/js/datepicker/picker.date.js"></script>
<div class="content main" style="border-top: 2px solid #d6d6d6">
    <h3>Заявки</h3><br>
    <b class="blues">Запрос акта сверки</b>&nbsp;&nbsp;&nbsp;&nbsp;<a class="blues" href="<?=$this->createUrl("/cabinet/requests2")?>">Заявка на рейс бункеровоза</a>
    <p>
    <form action="#" id="request2_data" method="post">
    Прошу сделать акт сверки за <b>период</b>: <input type="text" name="date_start" value="" class="datepicker" id="date_start"> - <input type="text" class="datepicker" name="date_end" id="date_end" value=""><br>
    </form>
    <b>по договору №: </b><span id="request_dogovor"></span><br><br>
    <input type="button" id="request_send" value="отправить запрос">
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
    <h1>Ваш запрос отправлен успешно!</h1>
</div>
<script src="<?=$this->path?>/js/request.js"></script>