<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"������������", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"������� ���������:", "width"=>"150px", "sorteble"=>false, "searcheble" => true),
             Array("name"=>"�����", "width"=>false, "sorteble"=>false, "searcheble" => false),
             Array("name"=>"��������", "width"=>'70px', "sorteble"=>false, "searcheble" => false),
         ),
         "routeDelOne" =>   "/service/AjaxDelOne/",
         "routeDelAll" =>   "/service/AjaxDelAll/",
         "routeSource" =>   "/service/AjaxGet/",
         "routeEditForm"=>  "/service/edit/",
          "routeRenewal"=>  "/item/",
         "tableName" =>   "����������� ��� � ������� �� ������"
    )
);?>
<?=$this->renderPartial("_form");?>