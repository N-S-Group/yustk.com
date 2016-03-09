<?header('Content-Type: text/html; charset=windows-1251');?>
    <?if($images){?>
    <ul class="UlGallery" data-rel="<?=$id;?>">
        <?foreach($images as $item):
            $imege = GalleryController::myscandir($item->id);
            if(strlen($imege[0])>1):
                $i = ($imege[0]=='small')?$imege[1]:$imege[0];
            ?>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gallery/<?=$item->id?>/<?=$i?>" title="" rel="lightbox" class="lightbox"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gallery/<?=$item->id?>/small/<?=$i?>" alt="" /></a>
                <div class="actions" id="<?=$item->id;?>">
                    <a href="#" title=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" alt="" /></a>
                </div>
            </li>
                <?endif;?>
        <?endforeach;?>

    </ul>
    <?}else{?>
        <br>
        <h3 style="text-align: center">В данном разделе нет изображений</h3>
        <br>
    <?}?>
<script>

    $(".gallery ul li").hover(
        function() { $(this).children(".actions").show("fade", 200); },
        function() { $(this).children(".actions").hide("fade", 200); }
    );

    function checkLi(){
        if(!$(".UlGallery li:visible").length){
            $(".UlGallery").after('<br><h3 style="text-align: center">В данном разделе нет изображений</h3><br>');
        }
    }
    $(document).ready(function(){
        $(".lightbox").colorbox({rel:'lightbox',width:'50%'});
        $(".actions").click(function(){
            var obj = $(this);
            $.post("<?=$this->createUrl('ajaxDeletePhoto')?>",{id:$(this).attr("id")},function(data){
                obj.parent().remove();
                checkLi();
                ajaxMessage(data);
            });
        });
    });
</script>