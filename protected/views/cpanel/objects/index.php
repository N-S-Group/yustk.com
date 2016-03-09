<div class="bc" >
    <ul id="breadcrumbs" class="breadcrumbs">
        <li <? $className = sizeof($path)==0  ?  "class='current'" : "";  echo $className;?> >
            <a href="<?=$this->createUrl("/objects/index")?>" >Список объектов</a>
        </li>

    </ul>
    <div class="clear"></div>
</div>

<?=MYChtml::showMessage($message)?>

<?



$this->widget('application.widgets.GridAdmin',
    array(
        "columns" => array(
            Array("name"=>"Дата создания", "width"=>"200px", "sorteble"=>true, "noCenterAlig" => false ,  "searcheble" => true, "onClick"=>false),
            Array("name"=>"Наименование", "width"=>false, "sorteble"=>true, "noCenterAlig" => true ,  "searcheble" => true, "onClick"=>false),
            Array("name"=>"Краткое описание", "width"=>false, "sorteble"=>true, "noCenterAlig" => true ,  "searcheble" => true, "onClick"=>false),
            Array("name"=>"Действие", "width"=>"200px", "sorteble"=>false , "noCenterAlig" => true ,  "searcheble" => true, "onClick"=>false),
        ),
        "routeSource" =>   "/objects/AjaxGet/",
        "routeEditForm"=>  "/objects/edit/",
        "routeDelOne" =>   "/objects/AjaxDelOne/",
        "routeDelAll" =>   "/objects/AjaxDelAll/",
    )
); ?>

<script>

    $("#tableMainCheck .clickabel").live("click",function() {
        tr = $(this).parent();
        id = tr.find("input").get(0).value;
        location.href="<?=$this->createUrl($views)?>?cid="+id;
    });

</script>

   <? $this->renderPartial("_form",array("formAction"=>"save", "nameButton" => "Добавить объект"));