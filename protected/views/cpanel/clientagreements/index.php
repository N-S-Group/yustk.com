<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Наименование", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Номер", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Клиент", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Дата добавления", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/ClientAgreements/AjaxDelOne/",
         "routeDelAll" =>   "/ClientAgreements/AjaxDelAll/",
         "routeSource" =>   "/ClientAgreements/AjaxGet/",
         "routeEditForm"=>  "/ClientAgreements/edit/",
         "tableName" =>   "Договора"
    )
);?>
<?=$this->renderPartial("_form");?>