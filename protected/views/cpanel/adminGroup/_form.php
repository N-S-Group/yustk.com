<?
$extendUrl = "";
if ($edit) $extendUrl = "/?editid=".$roleData->name;
?>

<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl(""); ?><?=$extendUrl?>" class="form" method='post' id='addForm'>
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$name?></h6></div>
            <div class="formRow">
                <label>Имя группы пользователей:</label>
                <div class="formRight">
                    <input type="text" value="<?=$roleData->name?>" name='name' id='addFormName'/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Описание группы пользователей:</label>
                <div class="formRight">
                    <input type="text" value="<?=$roleData->description?>" name='description' id='addFormDesc'/><span class="formNote"></span>

                </div>
                <div class="clear"></div>
            </div>

<?           foreach ($menu as $val) {
                ?>

            <div class="formRow">
                <label><?=$val[0]->name?>:</label>
                <div class="formRight">
               <? foreach ($val as $val2) { if ($val2->level!=1) {
                    if (in_array($val2->route,$role)) $chckd='checked="checked"'; else $chckd = "";
                    ?>

                    <input type="checkbox" <?=$chckd?> name="id[]" id="id<?=$val2->id?>" value='<?=$val2->id?>'/><label for="id<?=$val2->id?>"><?=$val2->name?></label>
                    <?}} ?>
                </div>
                <div class="clear"></div>
            </div>
            <?} ?>


            <div class="formRow">
                <label></label>
                <div class="formRight">
                    <a  onClick='$("#addForm").submit()' title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'><?=(!$edit?"Добавить подкатегорию":"Сохранить изменения")?></span></a>

                </div>
                <div class="clear"></div>
            </div>

        </fieldset>
      <input type='hidden' name='addevent' value="1">
    </form>
</div>

<script>
   $("#addForm").validate({
        rules: {

            name: "required",
            description: "required",
            'id[]': "required"

        }
    });

</script>