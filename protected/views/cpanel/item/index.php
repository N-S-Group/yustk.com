<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Наименование", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Единица измерения:", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Тариф", "width"=>false, "sorteble"=>false, "searcheble" => false),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/item/AjaxDelOne/",
         "routeDelAll" =>   "/item/AjaxDelAll/",
         "routeSource" =>   "/item/AjaxGet/?id=".$_GET['renid'],
         "routeEditForm"=>  "/item/edit/",
         "tableName" =>  $this->descriptionActionControlerForView
    )
);?>
<?=$this->renderPartial("_form");?>