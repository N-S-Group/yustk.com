<div style="width: 100%; margin-top: 60px;">
    <?foreach(Comments::model()->findAll(array("order"=>'id desc','condition'=>'confirm=1')) as $item):?>
        <div class="comment">
            <?=$item->text?>
            <span><?=MYDate::showDate($item->date_create)?></span>
        </div>
    <?endforeach;?>
</div>
<div id="contact_form">
        <h2>Форма публикации отзывов</h2>
            <h3 style="text-align: center;" id="mess"></h3>
        <form action="" id="contactForm" method="post">
            <div class="contact_right">
                <div class="contact_textarea">
                    <textarea placeholder="Сообщение" name="contact_comments" id="commentsText" rows="12" cols="56" class="required requiredField"><?php if(isset($_POST['contact_comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['contact_comments']); } else { echo $_POST['contact_comments']; } } ?></textarea>

                </div>

                <button type="contsubmit" class="contact_submit">Оставить отзыв</button>
            </div>
        </form>

</div>
<script>
    $(document).ready(function(){
       $(".contact_submit").click(function(){
           if($("textarea").val().length==0){
                $("#mess").css("color","red").text('Введите сообщение');
               return false;
           }
           $.post("<?=$this->createUrl("addContactMess")?>",{m:$("textarea").val()},function(data){
                var text = data==1?'Спасибо за отзыв. Перед публикацией он пройдет модерацию администраторами сайта':'Ошибка сайта';
               $("#mess").css("color","green").text(text);
           });
           return false;
       });

    });
</script>
<style>
    .comment span{
        float: right;
        color: #FF7937;
        font-size: 12px;
        margin-top: 10px;
    }
    .comment{
        color: #121212;
        padding: 15px 15px 50px 15px;
        background-color: white;
        border-radius:2px;
        font-size: 14px;
        font-family: Tahoma;
        border: 1px solid #DBDBDB;
        width: 70%;
        margin: auto;
        margin-bottom: 30px;

    }
    #contact_form {
        position: relative;
        width: 50%;
        margin: auto;
        margin-top: 60px;
    }

 .contact_textarea { position: relative; }

    .contact_textarea textarea {
        position: relative;
       width: 100%;
        height: 116px;
        padding: 7px 10px;
        margin: 0 0 18px;
        background: #f7f7f7;
        border: none;
        border-radius: 4px;
        box-shadow: inset 0.5px 0.5px 3px #aaaaad;
        font: normal 13px Arial, sans-serif;
        color: #434343;
    }

    .contact_submit {
        float: right;
        width: 190px;
        padding-top: 7px;
        padding-bottom: 4px;
        margin: 0 0 15px;
        background: #6ea077;
        border: none;
        border-radius: 4px;
        text-transform: uppercase;
        text-align: center;
        font-size: 16px;
        color: #fff;
        transition: background-color ease-in-out .15s;
        cursor: pointer;
    }
    .contact_submit:hover { background: #7FAC87; }

    </style>