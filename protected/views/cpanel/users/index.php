<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"���", "width"=>false, "sorteble"=>true, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"�����", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"�������", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"���", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"��������", "width"=>'50px', "sorteble"=>true, "searcheble" => true),
         ),
         "routeDelOne" =>   "/users/AjaxDelOne/",
         "routeDelAll" =>   "/users/AjaxDelAll/",
         "routeSource" =>   "/users/AjaxGet/",
         "routeEditForm"=>  "/users/edit/",
         "tableName" =>   "������������"
    )
); ?>
    <style>
        .admin{
            display: none;
        }
    </style>
<?=$this->renderPartial("_form");?>