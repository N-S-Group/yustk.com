<div class="main content">
<h3>Книга отзывов.</h3>

    <?if (count($comments)):?>
    <b>На данный момент отзывов в книге нет</b>
    <br><br>
    <?endif;?>

    <div class="cooments">

        <? foreach($comments as $comment):?>
        <div class="comment">
        <div class="time_comment"><?=$this->createData($comment->date_create)?></div>
        <div class="who_comment"><div class="fio">Сообщение оставил: <?=$comment->fio?></div></div>
        <div class="text_comment"><?=$comment->message?></div>


        <? if (strlen($comment->answer) > 5):?>
        <div class="answer_comment">
            <div  class="answer_comment_text"><i><?=$comment->answer?></i></div>
            <div  class="answer_comment_who"><i><b>Администрация</b></i></div>
        </div>
        <?endif;?>
    </div>
        <?endforeach;?>





    </div>
<br><br>
<h3>Форма отправки отзывов.</h3>
    <div class="form">

        <form id="form_send_to_director" method="POST" action="?#send">
            <p>Представьтесь, фамилия и имя*:<br>
                <input type="text" value="" name="comment[fio]" id="fio" class="required"><br>
                <label class="error" style="color: red" for="fio"></label>
            </p>

            <p>E-mail:<br>
                <input type="text" value=""  name="comment[email]" id="email"  class="email"><br>
                <label class="error" style="color: red" for="email"></label>
            </p>

            <p>Телефон*:<br>
                <input type="text" value=""  name="comment[tel]" id="tel" class="required"><br>
                <label class="error" style="color: red" for="tel"></label>
            </p>

            <p>Сообщение*:<br>
                <textarea type="text" value=""  name="comment[message]" id="message" class="required"></textarea><br>
                <label class="error" style="color: red" for="message"></label>
            </p>



            <p>Проверка на спам:<br>

            <div class="g-recaptcha" data-sitekey="6LdCWRoTAAAAAJEJ-nyk8VdRa6GQbQHQN-6Jyosb"></div>

            <br><label class="error" style="color: red" for="message"></label>
            </p>

            <p>
                <input type="submit" value="Отправить сообщение">
            </p>

        </form>

    </div>
</div>