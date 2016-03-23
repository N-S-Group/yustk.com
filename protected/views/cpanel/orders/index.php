<style>
    #delAllList{
        display: none;
    }
    </style>
<? $this->widget('application.widgets.GridAdmin',
    array(
         "columns" => array(
             Array("name"=>"Тип", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Договор", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Клиент", "width"=>false, "sorteble"=>false, "searcheble" => true, "noCenterAlig"=>true),
             Array("name"=>"Дата", "width"=>false, "sorteble"=>false, "searcheble" => true),
             Array("name"=>"", "width"=>'50px', "sorteble"=>false, "searcheble" => false)
         ),
         "routeSource" =>   "/orders/AjaxGet/",
         "tableName" =>   "Список заявок"
    )
);?>