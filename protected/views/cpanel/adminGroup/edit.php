
<div class="bc">
    <ul id="breadcrumbs" class="breadcrumbs">
        <li class="current">
            <a href="<?=$this->createUrl(".")?>"  >����� � ������</a>

        </li>

    </ul>
    <div class="clear"></div>
</div>
<?=$message?>
<?
$this->renderPartial('_form',array("menu"=>$menu,"role"=>$role,"roleData"=>$roleData,"name"=>"�������������� ��������� �������� �������������","edit"=>true));
?>
