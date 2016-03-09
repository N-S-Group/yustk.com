<?
$imgSrc = Yii::app()->request->baseUrl."/uploads/objects/".$object->cid."/";
?>

<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl($formAction, array("editid" => $_GET["editid"]));?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$name?></h6></div>
            <div class="formRow">
                <label>Имя объекта:</label>
                <div class="formRight">
                    <input type="text" value="<?=$object->title;?>" name='form[title]' id='title' maxlength="120"/><span class="formNote">Максимальное количество символов 120</span>

                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label>Краткое описание:</label>
                <div class="formRight">
                    <input type="text" value="<?=$object->shot_description;?>" name='form[shot_description]' id='shot_description' maxlength="190"/><span class="formNote">Максимальное количество символов 190</span>

                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label>Описание:</label>
                <div class="formRight">
                    <textarea type="text" name='form[description]' rows="40" id='addFormName'><?=$object->description;?></textarea>
                </div>
                <div class="clear"></div>
            </div>




            <div class='formRow'>
                <label>Заглавная фотография: </label><div class='formRight'>
                <input type='file' class='required' name='title[]'>
                <? if ($formAction == "editsave") { if (is_file($uploadDir."small/title.jpg")) {


                ?>
                <a href='<?=$imgSrc."big/title.jpg"?>' class='object_photo groups_photo titledel'><img src='<?=$imgSrc."small/title.jpg"?>' style='margin-left:10px; height: 25px;'/></a>
                <a href='#' class='delete_title_object titledel'><img src='<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png' style='margin-left:15px; width:16px;'/> </a>

                <?}}?>
            </div>
                <div class='clear'></div></div>

            <? if ($formAction != "editsave") {?>

            <div class='formRow' id='photo_imput'>
                <label>Дополнительные фотографии:</label><div class='formRight lasts' >
                <input type='file' name='photos[]' class="required">
            </div><br><br><br>
                <div class='formRight'>
                    <div class='formSubmit' style='float:none; margin:9px 0 -5px 5px;'>
                        <input type='button' class='redB' value='Ещё фото'>
                    </div></div>
                <div class='clear'></div></div>
<?} else {

            $files = scandir($uploadDir."small/");$i = 0;
   ?>
      <div class='formRow' id='photo_imput'>
                        <label>Добавить фото</label>
    <?
            if (is_array($files))
            foreach ($files as $val) {
                if ($val != "." and $val != ".." and  $val != "title.jpg") {
                    $id = substr($val, 0, strrpos($val, '.'));
                    $i++;

                ?>
<div class='formRight lasts'>

                        <input type='file' name='photos[<?=$id?>]' id="file<?=$id?>" class="req images">

                    <a href='<?=$imgSrc."big/".$id.".jpg"?>' class='object_photo groups_photo '><img src='<?=$imgSrc."small/".$id.".jpg"?>'  class='photo' id='del<?=$id?>' style='margin-left:10px; margin-bottom:-9px; width:40px;' /></a>
                    <a href='#' class='delete_photo_object'  id='<?=$id?>'><img src='<?=Yii::app()->request->baseUrl;?>/images/icons/remove.png' style='margin-left:15px; width:16px;'/> </a>
                    <br>


</div>
                <?

        }} if (count ($files) == 2) {?>

          <div class='formRight lasts'>
              <input type='file' name='photos[]' id="file0" class="req images">
              <br>
          </div>

          <?}?>  <br><br><br>
            <div class='formRight'>
                <div class='formSubmit' style='float:none; margin:9px 0 -5px 5px;'>
                    <input type='button' class='redB' value='Ещё фото'>
                </div></div>
            <div class='clear'></div></div><?}?>



            <div class="formRow">
                <label></label>
                <div class="formRight">
                    <a  onClick='$("#addForm").submit()' title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'><?=$nameButton?></span></a>

                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>




<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
            tinymce.init({
                selector: "textarea",

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
    </script>

<script>

    $(document).ready( function() {
        $("a.delete_title_object").live('click',function(){
            var href = $("a.object_photo").attr("href");
             $.get("<?=$this->createUrl('/objects/deleteTitle')?>", { 'cid':<?=(int)$object->cid?> } , function(data) {
                if(data=='true'){
                    $(".titledel").remove();
                }
                ajaxMessage(data);
            });
            return false;
        });

        $("a.delete_photo_object").live('click',function(){
            var id=$(this).attr("id");

            var href = $("#del"+id).attr("href");
           $.get("<?=$this->createUrl('/objects/deleteTitle')?>", { 'href': id, 'cid':<?=(int)$object->cid?> } , function(data) {
                if(data=='true'){
                    if($("#photo_imput .required, #photo_imput .req").length==1){
                        $("#del"+id).parent().remove();
                        $("#"+id).remove();
                    }else{

                        $("#del"+id).parent().parent().remove();
                    }
                }
                ajaxMessage(data);
            });
            return false;
        });

        $(".redB, .redBB").live('click',function(){
var length = $("#photo_imput .req").length;
if(length!== 10){
if (length == 0) length=1;
$(".lasts:last").after("<div class='formRight lasts' style='margin-top:5px;'><input type='file' class='required'  name='photos[]'></div>");
$(".lasts:last input").uniform();
}else{
alert("Не больше "+length+" фото");
}
});

    });

</script>