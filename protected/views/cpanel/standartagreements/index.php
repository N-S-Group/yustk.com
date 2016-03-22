<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Наименование", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Дата добавления", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/standartagreements/AjaxDelOne/",
         "routeDelAll" =>   "/standartagreements/AjaxDelAll/",
         "routeSource" =>   "/standartagreements/AjaxGet/",
         "routeEditForm"=>  "/standartagreements/edit/",
         "tableName" =>   "Типовые договора"
    )
);?>
<?=$this->renderPartial("_form");?>