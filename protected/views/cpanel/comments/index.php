<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Краткий текст", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Дата", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Статус", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>true, "searcheble" => true),
         ),
         "routeDelOne" =>   "/comments/AjaxDelOne/",
         "routeDelAll" =>   "/comments/AjaxDelAll/",
         "routeSource" =>   "/comments/AjaxGet/",
         "routeEditForm"=>  "/comments/edit/",
         "tableName" =>   "Отзывы"
    )
); ?>
<div id="comment"></div>