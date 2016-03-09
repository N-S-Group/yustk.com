<?php
/* @var $this CategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'adminGroup',
);


?>


<?=$message?>


<? $this->widget('application.widgets.GridAdmin',
                array(
                "columns" => array(
                                    Array("name"=>"Наименование", "width"=>"330px", "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"Описание", "width"=>false, "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"Действия", "width"=>"150px", "sorteble"=>false, "searcheble" => true),
                                   ),
                "routeDelOne" =>   "/admingroup/AjaxDelOne/",
                "routeDelAll" =>   "/admingroup/AjaxDelAll/",
                "routeSource" =>   "/admingroup/AjaxGetRoles/",
                "routeEditForm"=>  "/admingroup/edit/",
                "tableName" =>   "Все подкатегории выбранного раздела"
                )
                ); ?>




<?
$this->renderPartial('_form',array("menu"=>$menu,"role"=>Array(),"name"=>"Создание групповой политики пользователей","edit"=>true));
?>

