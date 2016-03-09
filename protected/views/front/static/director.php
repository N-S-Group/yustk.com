<div class="main content">
    <h3>Обращение к генеральному директору.</h3>

    Сообщение отправленное с данной формы попадет непосредственно к генеральному директору нашей компании. <br>Заполните подробно контактные данные, что бы с вами можно было связаться.
    <br><br>
    <div class="form">
    <a name="send"></a>
     <form id="form_send_to_director" method="POST" action="?#send">
        <p>Представьтесь, фамилия и имя*:<br>
            <input type="text" value="" name="mail[fio]" id="fio" class="required"><br>
            <label class="error" style="color: red" for="fio"></label>
        </p>

        <p>E-mail:<br>
            <input type="text" value=""  name="mail[email]" id="email"  class="email"><br>
            <label class="error" style="color: red" for="email"></label>
        </p>

        <p>Телефон*:<br>
            <input type="text" value=""  name="mail[tel]" id="tel" class="required"><br>
            <label class="error" style="color: red" for="tel"></label>
        </p>

        <p>Сообщение*:<br>
            <textarea type="text" value=""  name="mail[message]" id="message" class="required"></textarea><br>
            <label class="error" style="color: red" for="message"></label>
        </p>



         <p>Введите что изображено на картинке:<br>
             <?php $this->widget('CCaptcha',array("buttonLabel"=>"<br>Обновить картинку")); /*выводим саму каптчу*/?>

         </p>

        <p>
            <input type="submit" value="Отправить сообщение">
        </p>

        </form>

    </div>
</div>

<script>
    $(document).ready(function(){
    $("#form_send_to_director").validate({

    });

    });
</script>