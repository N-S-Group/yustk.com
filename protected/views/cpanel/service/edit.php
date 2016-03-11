<div class="bc">
    <ul id="breadcrumbs" class="breadcrumbs">
        <li class="current">
            <a href="<?=$this->createUrl(".")?>"  >Назад к списку</a>

        </li>

    </ul>
    <div class="clear"></div>
</div>

<style>
    <?if($_GET['cl'] == 1){?>
    .admin{
        display: none;
    }
    <?}else{?>
    .user{
        display: none;
    }
    <?}?>
</style>

<?=$this->renderPartial("_form");?>