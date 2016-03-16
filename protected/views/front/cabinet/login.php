<div class="login">
    <span><b>ЛИЧНЫЙ КАБИНЕТ:</b></span><br>
    ИМЯ ПОЛЬЗОВАТЕЛЯ: <input type="text" value="" id="login"> ПАРОЛЬ: <input type="password" value="" id="password"><br>

    <a href="">РЕГИСТРАЦИЯ</a>&nbsp;&nbsp;&nbsp;
    <a href="#modal">ЗАБЫЛИ ПАРОЛЬ</a>&nbsp;&nbsp;&nbsp;
    <a href="#" id="submit"><b>ВХОД</b></a>
    <script>
        var url = "<?=$this->path?>";
    </script>
    <script src="<?=$this->path?>/js/login.js"></script>
</div>

<div class="remodal" data-remodal-id="modal">
    <h1>Восстановления пароля</h1>
    <p>
        Введите ваш e-mail
    </p>
    <p>
        <input type="text" id="email"><span id="validEmail"></span>

        <br><span id="showerrorsEmail" style="color: red;"></span>
    </p>

    <button type="button"  class="confirm" value="Восстановить">Восстановить
        <br>
        <!--<a class="remodal-cancel" href="#">Отмена</a>-->
        <!--<a class="remodal-confirm" href="#">Восстановить</a>-->
</div>