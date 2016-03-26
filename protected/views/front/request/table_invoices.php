<?=header('Content-Type: text/html; charset=windows-1251')?>

<?if($r = Invoices::model()->findAll(array("condition"=>"`agreement_id`=:agreement_id","params"=>array(":agreement_id"=>$d),"order"=>"`date` desc"))):?>

<table class="price">
    <thead>
    <tr>
        <td>№ документа</td>
        <td>Дата</td>
        <td>Назначение платежа</td>
        <td>Статус</td>
        <td>Скачать</td>
    </tr>
    </thead>
    <tbody>

    <?=$this->renderPartial('item_inv',array("r"=>$r[0],'two'=>false));?>

    </tbody>

</table>
<br><br>
<b class="blues">За предыдущие отчетные периоды</b><br>

<table class="price">
    <thead>
    <tr>
        <td>№ документа</td>
        <td>Месяц</td>
        <td>Дата</td>
        <td>Назначение платежа</td>
        <td>Статус</td>
        <td>Скачать</td>

    </tr>
    </thead>
    <tbody>


        <?
        $i =0;
        foreach($r as $item):?>
            <?if($i>0):?>
                <?=$this->renderPartial('item_inv',array("r"=>$item,'two'=>true));?>
            <?endif;?>
            <?$i++;?>
        <?endforeach?>

   <!-- <tr>
        <td>№17-55<td>
        <td>Декабрь<td>
        <td>11.12.2015<td>
        <td>Оплата за вывоз мусора декабрь</td>
        <td><span class='reds'>не оплачено</span></td>
        <td><a href="">Cкачать</a></td>
    </tr>
    <tr>
        <td>№17-55<td>
        <td>Декабрь<td>
        <td>11.12.2015<td>
        <td>Оплата за вывоз мусора декабрь</td>
        <td><span class='reds'>не оплачено</span></td>
        <td><a href="">Cкачать</a></td>
    </tr>
    <tr>
        <td>№17-55<td>
        <td>Декабрь<td>
        <td>11.12.2015<td>
        <td>Оплата за вывоз мусора декабрь</td>
        <td><span class='reds'>не оплачено</span></td>
        <td><a href="">Cкачать</a></td>
    </tr>-->
    </tbody>
</table>
<?endif;?>