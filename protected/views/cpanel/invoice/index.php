<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"№ документа", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Назначение платежа", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Дата", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Счет", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Статус", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Организация", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/Invoice/AjaxDelOne/",
         "routeDelAll" =>   "/Invoice/AjaxDelAll/",
         "routeSource" =>   "/Invoice/AjaxGet/",
         "routeEditForm"=>  "/Invoice/edit/",
         "tableName" =>   "Cчета"
    )
);?>
<?=$this->renderPartial("_form");?>