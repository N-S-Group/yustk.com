<div class="content main" style="border-top: 2px solid #d6d6d6">

    <h3>Заявки</h3><br>
    <a class="blues" href="<?=$this->createUrl("/cabinet/requests")?>">Запрос акта сверки</a>&nbsp;&nbsp;&nbsp;&nbsp;<b class="blues">Заявка на рейс бункеровоза</b>


    <p><table>
        <tr style="border-bottom: 1px solid #dadada"><td style="vertical-align: middle; width: 250px">Дата:</td><td><input type="text" value="01.01.2015"></td></tr>
        <tr  style="border-bottom: 1px solid #dadada"><td >Адрес объекта<br> установки/вывоза: </td><td  style="vertical-align: middle"> <input type="text" value="Героев десантников"></td></tr>
        <tr  style="border-bottom: 1px solid #dadada"><td>Количество заказываемых<br> бункеров: </td><td  style="vertical-align: middle"><input type="text" value="4" size=4></td></tr>
        <tr  style="border-bottom: 1px solid #dadada"><td>Количество собственных<br> бункеров, подлежащих вывозу:  </td><td  style="vertical-align: middle"><input type="text" value="4" size=4></td></tr>

        <tr><td colspan="2" style="vertical-align: middle"><br><b>Дополнительные пожелания:</b><br>
        <textarea style="width: 350px"></textarea></td></tr>

    </table>
    <br>
        <input type="checkbox" id="conditions_agree"> согласны с <a href="" class="green">условиями</a><br>
        <input type="button" id="request_send" value="отправить запрос">
        <img id="send_load" style="display: none" src="<?=$this->path?>/images/loaders/loader19.gif">
    </p>

    <br><br>

    <!--<b class="blues">История заявок</b><br>

    <table class="price">
        <thead>
        <tr>
            <td>№ заявки<td>
            <td>Дата<td>
            <td>Тип</td>
            <td>Скачать</td>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>11<td>
            <td>12.01.2015<td>
            <td>Запрос акта сверки</td>
            <td><a href="">Cкачать</a></td>
        </tr>

        <tr>
            <td>12<td>
            <td>12.01.2015<td>
            <td>Запрос акта сверки</td>
            <td><a href="">Cкачать</a></td>
        </tr>
        </tbody>

    </table>-->
    <div id="info_request">
    </div>
</div>
<script>
    var request = 2;
</script>
<div class="remodal" data-remodal-id="modal_request">
    <h1>Ваш запрос отправлен успешно!</h1>
</div>
<script src="<?=$this->path?>/js/request.js"></script>