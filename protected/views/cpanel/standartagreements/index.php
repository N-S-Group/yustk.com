<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"������������", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"���� ����������", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"��������", "width"=>'50px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/standartagreements/AjaxDelOne/",
         "routeDelAll" =>   "/standartagreements/AjaxDelAll/",
         "routeSource" =>   "/standartagreements/AjaxGet/",
         "routeEditForm"=>  "/standartagreements/edit/",
         "tableName" =>   "������� ��������"
    )
);?>
<?=$this->renderPartial("_form");?>