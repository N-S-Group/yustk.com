

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/uploader/jquery.plupload.queue.js"></script>

<div class="widget ">
    <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/images2.png" alt="" class="titleIcon" /><h6>Галерея</h6></div>
        <div class="gallery galleryWidget">

        <div class="fix"></div>
    </div>
</div>


<br><br>

    <h3 style="text-align: center">Выберите раздел для добавления</h3>
<br>
<div class="center">
    <?$j=0;?>
    <?foreach($sections as $item):?>
        <a href="#" title="" class="button <?=!$j?'brownB':'greyishB';?> sectionButtons" style="margin: 5px;" data-rel="<?=$item->id;?>"><span><?=$item->title?></span></a>
        <?$j++;?>
    <?endforeach;?>
    </div>
    <div class="widget">
        <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/upload.png" alt="" class="titleIcon" /><h6>Загрузка файлов</h6></div>
        <div id="uploader"></div>
    </div>

<script>



    $(document).ready(function(){

        $(".sections").click(function(){
            var idSection = $(".UlGallery").attr('data-rel');
            if(idSection!=$(this).attr('data-rel')){
                $(".sections").each(function(){
                   if($(this).hasClass('brownB')) $(this).removeClass('brownB').addClass('blueB');
                });
                $(this).addClass('brownB');
                showGallery($(this).attr('data-rel'));
            }
        });

        function uploadFiles(){
            $.post("<?=$this->createUrl('ajaxSaveGallerySession')?>",{id:idSectionInBase},function(){});
        }

        function showGallery(id){

            $(".galleryWidget").html('<br><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loaders/loader12.gif" alt="" /><br>');
            $.post("<?=$this->createUrl('ajaxGetGallery')?>",{id:id},function(data){
                $(".galleryWidget").html(data);
            });
        }


        var idSectionInBase = $(".sectionButtons:eq(0)").attr('data-rel');

        showGallery(idSectionInBase);
        uploadFiles();

        $(".sectionButtons").click(function(){
            $(".sectionButtons").each(function(){
                if($(this).hasClass('brownB')) $(this).removeClass('brownB').addClass('greyishB');
            });
            idSectionInBase = $(this).attr('data-rel');
            $(this).addClass('brownB');
            uploadFiles();
        });

        $("#uploader").pluploadQueue({
            runtimes : 'html5,html4',
            url : '<?=$this->createUrl('uploadFile');?>',
            max_file_size : '6mb',
            unique_names : true,
            multiple_queues : true,
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ],
            rename: true,
            sortable: true,
            init:{
              /*  FileUploaded: function(){
                    $(".sections").each(function(){
                        if($(this).hasClass('brownB') && (idSectionInBase == $(this).attr('data-rel') || $(this).attr('data-rel') == 0)) showGallery($(this).attr('data-rel'));
                    });
                }*/
            }
        });

    });
</script>