
<div class="widget">
    <a name='formadd'></a>
    <form action="<?=$this->createUrl("price/save");?>" class="form" method='post' id='addForm' enctype="multipart/form-data">
        <fieldset>
            <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/record.png" alt="" class="titleIcon" /><h6><?=$name?></h6></div>
            <div class="formRow">
                <label>Загрузка прайс-листа:</label>
                <div class="formRight">
                    <input type="file" value="" name='price' id='title'/><span class="formNote">
                    <?
                    if ($price == false ){
                    ?>
                    Вы можете добавить любой файл

                    <?}
                    else {

                    ?>
Вы загрузили файл с именем <?=$name?>. Размер <?=MYChtml::numbeFormat($price["size"])?> Байт
                        <?}?>
                    </span>

                </div>
                <div class="clear"></div>
            </div>



            <div class="formRow">
                <label></label>
                <div class="formRight">
                    <a  onClick='$("#addForm").submit()' title="" class="button greyishB"  style="margin: 5px;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/light/create.png" alt="" class="icon" /><span id='buttonName'>Сохранить</span></a>

                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>

