<div class="main content">
    <h3>��������� � ������������ ���������.</h3>

    ��������� ������������ � ������ ����� ������� ��������������� � ������������ ��������� ����� ��������. <br>��������� �������� ���������� ������, ��� �� � ���� ����� ���� ���������.
    <br><br>
    <div class="form">
    <a name="send"></a>
     <form id="form_send_to_director" method="POST" action="?#send">
        <p>�������������, ������� � ���*:<br>
            <input type="text" value="" name="mail[fio]" id="fio" class="required"><br>
            <label class="error" style="color: red" for="fio"></label>
        </p>

        <p>E-mail:<br>
            <input type="text" value=""  name="mail[email]" id="email"  class="email"><br>
            <label class="error" style="color: red" for="email"></label>
        </p>

        <p>�������*:<br>
            <input type="text" value=""  name="mail[tel]" id="tel" class="required"><br>
            <label class="error" style="color: red" for="tel"></label>
        </p>

        <p>���������*:<br>
            <textarea type="text" value=""  name="mail[message]" id="message" class="required"></textarea><br>
            <label class="error" style="color: red" for="message"></label>
        </p>



         <p>������� ��� ���������� �� ��������:<br>
             <?php $this->widget('CCaptcha',array("buttonLabel"=>"<br>�������� ��������")); /*������� ���� ������*/?>

         </p>

        <p>
            <input type="submit" value="��������� ���������">
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