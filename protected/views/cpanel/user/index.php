<?php
/* @var $this CategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'user',
);


?>


<?=$message?>


<? $this->widget('application.widgets.GridAdmin',
                array(
                "columns" => array(
                                    Array("name"=>"�����", "width"=>"200px", "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"���", "width"=>"200px", "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"email", "width"=>"250px", "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"�������", "width"=>"170px", "sorteble"=>false, "searcheble" => true),
                                    Array("name"=>"������", "width"=>"150px", "sorteble"=>false, "searcheble" => true),
                                    Array("name"=>"��������", "width"=>"20px", "sorteble"=>false, "searcheble" => true),
                                   ),
                "routeDelOne" =>   "/user/AjaxDelOne/",
                "routeDelAll" =>   "/user/AjaxDelAll/",
                "routeSource" =>   "/user/AjaxGet/",
                "routeEditForm"=>  "/user/edit/",
                "tableName" =>   "��� ������������ ���������� �������"
                )
                ); ?>

<?
$this->renderPartial('_form',array("roles"=>$roles,"name"=>"���������� ������������","edit"=>false));
?>

