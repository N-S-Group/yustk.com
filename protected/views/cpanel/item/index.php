<div class="bc">
    <ul id="breadcrumbs" class="breadcrumbs">
        <li class="current">
            <a href="<?=$this->createUrl("/service")?>"  >����� � ������ �����</a>

        </li>

    </ul>
    <div class="clear"></div>
</div>
<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"������������", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"������� ���������:", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"�����", "width"=>false, "sorteble"=>false, "searcheble" => false),
             Array("name"=>"��������", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/item/AjaxDelOne/",
         "routeDelAll" =>   "/item/AjaxDelAll/",
         "routeSource" =>   "/item/AjaxGet/?id=".$_GET['renid'],
         "routeEditForm"=>  "/item/edit/",
         "tableName" =>  $this->descriptionActionControlerForView
    )
);?>
<?=$this->renderPartial("_form");?>