<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Имя", "width"=>false, "sorteble"=>true, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Логин", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Телефон", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Тип", "width"=>false, "sorteble"=>true, "searcheble" => true),
             Array("name"=>"Действия", "width"=>'50px', "sorteble"=>true, "searcheble" => true),
         ),
         "routeDelOne" =>   "/users/AjaxDelOne/",
         "routeDelAll" =>   "/users/AjaxDelAll/",
         "routeSource" =>   "/users/AjaxGet/",
         "routeEditForm"=>  "/users/edit/",
         "tableName" =>   "Пользователи"
    )
); ?>
    <style>
        .admin{
            display: none;
        }
    </style>
<?=$this->renderPartial("_form");?>