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
                                    Array("name"=>"������������", "width"=>"330px", "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"��������", "width"=>false, "sorteble"=>true, "searcheble" => true),
                                    Array("name"=>"��������", "width"=>"150px", "sorteble"=>false, "searcheble" => true),
                                   ),
                "routeDelOne" =>   "/admingroup/AjaxDelOne/",
                "routeDelAll" =>   "/admingroup/AjaxDelAll/",
                "routeSource" =>   "/admingroup/AjaxGetRoles/",
                "routeEditForm"=>  "/admingroup/edit/",
                "tableName" =>   "��� ������������ ���������� �������"
                )
                ); ?>




<?
$this->renderPartial('_form',array("menu"=>$menu,"role"=>Array(),"name"=>"�������� ��������� �������� �������������","edit"=>true));
?>

