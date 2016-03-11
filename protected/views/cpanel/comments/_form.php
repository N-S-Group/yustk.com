
<div class="widget">
    <a name='formadd'></a>
    <form action="?save=1&editid=<?=$_GET["editid"]?>" class="form" method='post' id='addForm'>
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$this->name;?></h6></div>


            <div class="formRow">
                <label>ФИО:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->fio;?>"  name='fio' style="width:100%; font-size: 14px"><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>E-mail:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->email;?>" readonly="readonly" name='tel' style="width:100%; font-size: 14px"><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Телефон:</label>
                <div class="formRight">
                    <input type="text" value="<?=$model->tel;?>" readonly="readonly" name='tel' style="width:100%; font-size: 14px"><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Текст отзыва:</label>
                <div class="formRight">
                    <textarea type="text" name='message' style="width:100%;height: 100px; font-size: 14px"><?=$model->message;?></textarea><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label>Ответ на отзыв:</label>
                <div class="formRight">
                    <textarea type="text" name='answer' style="width:100%;height: 100px; font-size: 14px"><?=$model->answer;?></textarea><span class="formNote"></span>
                </div>
                <div class="clear"></div>
            </div>




            <div class="formRow">
                <label></label>
                <div class="formRight">

                    <a  onclick="$('#addForm').submit()" title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'>Сохранить изменения</span></a>
                    <?if(!$model->confirm):?>
                    <a href="?confirm=1&editid=<?=$_GET["editid"]?>" title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'>Опубликовать</span></a>
                    <?endif;?>
                </div>

                <div class="clear"></div>
            </div>

        </fieldset>
    </form>
</div>

<script>

    function getObject(){
        return jQuery.trim($(".formRight textarea").val());
    }

    function checkText(obj){
        if(!obj.length ){
            if(!$(".error").length){ $(".formRight textarea").after('<label for="name" generated="true" class="error">Данное поле обязательное для заполнения.</label>');} return false;
        }
        $(".error").remove();
        return true;
    }

    function confirmComment(id){

        $.post("<?=$this->createUrl('confirmRecord')?>", {id:id,text:obj}, function(data){
            ajaxMessage(data);
            if(data == 'true') $("img#imgEdit"+id).parent().parent().parent().find("td:eq(3)").html("<span style='color:green;'>Подтвержден</span>");
        });
    }

    function saveComment(id){
        var obj = getObject();
        if(!checkText(obj)) return false;
        $.post("<?=$this->createUrl('EditRecord')?>", {id:id,text:obj}, function(data){
            ajaxMessage(data);
        });
    }

    $(document).ready(function(){

        tinymce.init({
            selector: 'textarea',
            height: 100,
            menubar: false,
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            statusbar: false,

        });
    });
</script>

