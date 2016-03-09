<div class="bc" >
    <ul id="breadcrumbs" class="breadcrumbs">
        <li <? $className = sizeof($path)==0  ?  "class='current'" : "";  echo $className;?> >
            <a href="<?=$this->createUrl("/objects/index")?>" >Список объектов</a>
        </li>

    </ul>
    <div class="clear"></div>
</div>

<?=MYChtml::showMessage($message)?>



<? $this->renderPartial("_form",array("object"=>$objects,"formAction"=>"editsave",   "nameButton" => "Сохранить объект", "uploadDir"=>$uploadDir) );