<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Наименование", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Единица измерения:", "width"=>"150px", "sorteble"=>false, "searcheble" => true),
             Array("name"=>"Тариф", "width"=>false, "sorteble"=>false, "searcheble" => false),
             Array("name"=>"Действия", "width"=>'70px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/service/AjaxDelOne/",
         "routeDelAll" =>   "/service/AjaxDelAll/",
         "routeSource" =>   "/service/AjaxGet/",
         "routeEditForm"=>  "/service/edit/",
          "routeRenewal"=>  "/item/",
         "tableName" =>   "Прейскурант цен и тарифов на услуги"
    )
);?>
<?=$this->renderPartial("_form");?>