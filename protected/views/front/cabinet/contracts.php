<div class="content main" style="border-top: 2px solid #d6d6d6">

    <h3>Типовые договора</h3><br>

    <?if($data = StandartAgreements::getData()){?>
        <table class="price">
            <thead>
            <tr>
                <td>Дата размещения</td>
                <td>Наименование документов</td>
                <td>Скачать</td>

            </tr>
            </thead>
            <tbody>

            <?foreach($data as $item):?>
                <tr>
                <td><?=MYDate::contactsDate($item->date);?></td>
                <td><?=$item->name;?></td>
                <td>
                   <?if($img = MYChtml::getImage('agreements/'.$item->id,'agreements')):?>
                        <a href="<?php echo Yii::app()->request->baseUrl;?>/uploads/<?=$img;?>" download>
                            Скачать
                        </a>
                    <?endif;?>
                </td>
                </tr>
            <?endforeach;?>

            </tbody>

        </table>
    <?}else{?>
        <b>список договоров пуст</b>
    <?}?>
</div>