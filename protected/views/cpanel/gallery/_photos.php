<?if($this->edit){
    $listPhotos = ApartmentsController::myscandir($model->id);
    $file = ApartmentsController::getFile($listPhotos,'1');
}?>
<div class="formRight">
    <?php echo CHtml::activeFileField($model, 'photo1');?>
    <?if($this->edit && $file):?>
    <a rel="gal" href="<?=Yii::app()->request->baseUrl;?>/uploads/apartments/<?=$model->id;?>/<?=$file;?>" class="colorbox"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/control/16/zoom.png"></a>
    <a href="#" rel="1" class="delete"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/control/16/busy.png"></a>
    <?endif;?>
    <a href="#" title="Добавить поле загрузки фотографии" id="showPhoto"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/control/16/plus.png"></a>
</div>

<? for($i=2;$i<16;$i++){?>
<?
    $display = 'none';

    if($this->edit){
        $file = GalleryController::getFile($listPhotos,$i);
        if($file) $display = 'block';
    }
?>

<div class="formRight photo" style="display: <?=$display;?>;">
    <?php echo CHtml::activeFileField($model, 'photo'.$i);?>
    <?if($file):?>
        <a rel="gal" href="<?=Yii::app()->request->baseUrl;?>/uploads/apartments/<?=$model->id;?>/<?=$file;?>" class="colorbox"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/control/16/zoom.png"></a>
        <a href="#" rel="<?=$i;?>" class="delete"><img src="<?=Yii::app()->request->baseUrl;?>/images/icons/control/16/busy.png"></a>
    <?endif;?>
</div>
<?}?>

<script>
    $("#showPhoto").on('click',function(){
        $('.photo').each(function(){
            if($(this).css('display')=='none'){ $(this).css('display','block'); return false;}
        });
        return false;
    });
    </script>