<div class="bc">
    <ul id="breadcrumbs" class="breadcrumbs">
        <li class="current">
            <a href="<?=$this->createUrl(".")?>"  >����� � ������</a>

        </li>

    </ul>
    <div class="clear"></div>
</div>

<?=$this->renderPartial("_form",array('model'=>$model));?>