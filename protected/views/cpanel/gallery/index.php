<style>
    .center {
        width: 50%;
        padding: 10px;
        margin: auto;
        text-align: center;
    }
</style>
<div class="center">
    <?$j=0;?>
<?foreach($sections as $item):?>
    <a title="" class="button <?=!$j?'brownB':'blueB';?> sections" data-rel="<?=$item->id;?>" style="margin: 5px;"><span><?=$item->title;?></span></a>
    <?$j++?>
<?endforeach;?>
    <a title="" class="button blueB sections" data-rel="0"  style="margin: 5px;"><span>Все</span></a>
</div>
<?=$this->renderPartial("_form",array("sections"=>$sections));?>