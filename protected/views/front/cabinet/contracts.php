<div class="content main" style="border-top: 2px solid #d6d6d6">

    <h3>������� ��������</h3><br>

    <?if($data = StandartAgreements::getData()){?>
        <table class="price">
            <thead>
            <tr>
                <td>���� ����������</td>
                <td>������������ ����������</td>
                <td>�������</td>

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
                            �������
                        </a>
                    <?endif;?>
                </td>
                </tr>
            <?endforeach;?>

            </tbody>

        </table>
    <?}else{?>
        <b>������ ��������� ����</b>
    <?}?>
</div>