
    <h3><b>����������� ��� � �������  �� ������ ��� "����-���"</b><br>
    <span style="font-size: smaller">
    ����������� ������������
    ������������ � ����������� �. ������������� � ��� ���������� �������
    � 1 �������  2016�

    </span>
    </h3>

    <br>
    <br>
    <?$data = Service::getData(); $i=1;?>
    <table class="price">
        <thead>
        <tr>
            <td>� �/�</td>
            <td>������������ ������</td>
            <td>������� �����</td>
            <td>����� ��� ���, ���.</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?foreach($data as $item):?>
            <tr>
                <td><?=$i?></td>
                <td><?=$item->title;?></td>
                <td><?=$item->unit;?></td>
                <td><?=($item->price>0)?$item->price:'';?></td>
                <?if(strlen($item->description)>68):?>
                <td><a href="#" class="show">��������&nbsp;������</a></td>
                <?endif;?>
            </tr>
            <?if(strlen($item->description)>68):?>
                    <tr class="description" style='border-bottom: 2px solid #000000 !important;  display: none'>
                    <td colspan='6'>
                    <?=$item->description;?>
                    <br><a href='#' class='close'>�������</a>
                    </td>
                    </tr>
            <?endif;?>
            <?foreach(Service::getRelationData($item->id) as $key ){?>
                <tr>
                    <td></td>
                    <td><?=$key->title;?></td>
                    <td><?=$key->unit;?></td>
                    <td><?=($key->price>0)?$key->price:'';?></td>
                    <td></td>
                </tr>
            <?}?>
            <?$i++;?>
        <?endforeach;?>

     <!--  <tr>
            <td>1</td>
            <td>������ ������� ����������� ���� ������� ����� (������� �������� 10 �.���.)</td>
            <td>1 ����</td>
            <td>1700,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder3">��������&nbsp;������</a></td>
        </tr>


        <tr>
            <td></td>
            <td>��� ��������� ����</td>
            <td>1 ����</td>
            <td>1598,30</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>�� ���������� ����</td>
            <td>1 ���</td>
            <td>1380,19</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>��� ��������� ����</td>
            <td>1 ���</td>
            <td>986,78</td>
            <td></td>
        </tr>


        <tr>
            <td>2</td>
            <td>������ ������� �������� ���� ������� ��� (������� �������� 9 �.���.)</td>
            <td>1 ����</td>
            <td>1250,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder3">��������&nbsp;������</a></td>
        </tr>


        <tr>
            <td>3</td>
            <td>������ ���������� ��������� �� ������ ���</td>
            <td>1 �.���.</td>
            <td>379,00</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder6">��������&nbsp;������</a></td>
        </tr>

        <tr>
            <td></td>
            <td>������ ���������� ��������� �� ������ ���(��� ����������)</td>
            <td>1 �.���.</td>
            <td>248,40</td>
            <td></td>
        </tr>



        <tr>
            <td>4</td>
            <td>������ ���������� ���������� �� ������ ������������� ������, ������������ ������� 8 ���.</td>
            <td>1 ����</td>
            <td>6988,47</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">��������&nbsp;������</a></td>
        </tr>


        <tr>
            <td>5</td>
            <td> ������ ���������� ���������� �� ������ ���, ������������ ������� 8 ���.</td>
            <td>1 ����</td>
            <td>3854,68</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">��������&nbsp;������</a></td>
        </tr>

        <tr>
            <td>6</td>
            <td>������ ���������� ����������, ������������ ������� 8 ���.(��� ����������).</td>
            <td>1 ����</td>
            <td>3006,47</td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder5">��������&nbsp;������</a></td>
        </tr>


        <tr>
            <td>7</td>
            <td>������ �������������� (������� 1100 ������)</td>
            <td>1 ��/���</td>
            <td>285,00</td>
            <td></td>
        </tr>


        <tr>
            <td>8</td>
            <td>������ �������</td>
            <td>1 �����</td>
            <td>347,06</td>
            <td></td>
        </tr>


        <tr>
            <td>9</td>
            <td>����� ������ ������� ������� ��������� ������� ��� ��-523 (������� �������� 8,7 ���.�)</td>
            <td></td>
            <td></td>
            <td><a href="<?=$this->createUrl("/createorder")?>" class="createOrder4">��������&nbsp;������</a></td>
        </tr>



        <tr>
            <td></td>
            <td>� ����� ������ �� 15 ��</td>
            <td>1 ����</td>
            <td>3012,35</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>�� ������� �� ���������� �� 15 �� 25 ��</td>
            <td>1 ����</td>
            <td>3987,29</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>�� ������� �� ���������� �� 26 �� 35 ��</td>
            <td>1 ����</td>
            <td>4143,94</td>
            <td></td>
        </tr>


        <tr>
            <td></td>
            <td>�� ������� �� ���������� �� 36 �� 45 ��</td>
            <td>1 ����</td>
            <td>6241,65</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>�� ������� �� ���������� �� 46 �� 55 ��</td>
            <td>1 ����</td>
            <td>6529,61</td>
            <td></td>
        </tr>

        <tr>
            <td></td>
            <td>�������������� ����� 40�.�.</td>
            <td></td>
            <td>250</td>
            <td></td>
        </tr>-->


        </tbody>

    </table>



