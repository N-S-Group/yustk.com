<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"������� �����", "width"=>false, "sorteble"=>true, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"����", "width"=>"200px", "sorteble"=>true, "searcheble" => true),
             Array("name"=>"������", "width"=>"100px", "sorteble"=>true, "searcheble" => true),
             Array("name"=>"��������", "width"=>'50px', "sorteble"=>true, "searcheble" => true),
         ),
         "routeDelOne" =>   "/comments/AjaxDelOne/",
         "routeDelAll" =>   "/comments/AjaxDelAll/",
         "routeSource" =>   "/comments/AjaxGet/",
         "routeEditForm"=>  "/comments/edit/",
         "tableName" =>   "������"
    )
); ?>
<div id="comment"></div>