<?if(Yii::app()->user->hasFlash('success') && Yii::app()->user->getFlash('success') == 'ok'){?>
<div class="remodal" data-remodal-id="modal_success">
    <h1>�� ������� ������������ ������</h1>
</div>
    <script>
        $(document).ready(function(){
            var inst = $.remodal.lookup[$('[data-remodal-id=modal_success]').data('remodal')];
            inst.open();
        });
    </script>
<?}?>


<div class="content main" style="border-top: 2px solid #d6d6d6">

    <h3>���������</h3><br>
    <b class="blues">��������� ���������</b>

    <table class="price">
        <thead>
        <tr>
            <td>� ���������<td>
            <td>����<td>
            <td>������������</td>
            <td>�������</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>��� �17-55<td>
            <td>12.01.2015<td>
            <td>��� ������ �� 12.01.2015</td>
            <td><a href="">C������</a></td>

        </tr>

        <tr>
            <td>��� �19/55<td>
            <td>12.01.2015<td>
            <td>��� ������ �� 12.01.2015</td>
            <td><a href="">C������</a></td>

        </tr>




        </tbody>

    </table>

<br><br>
    <b class="blues">�� ��������������� ���������</b><br>
    ���� ����������� ������ ����������, ��������� ������� �� �� ������������ � ���� ��������:
    <table class="price">
        <thead>
        <tr>
            <td>� ���������<td>
            <td>����<td>
            <td>������������</td>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>��� �17-55<td>
            <td>12.01.2015<td>
            <td>��� ������ �� 12.01.2015</td>


        </tr>

        <tr>
            <td>��� �19/55<td>
            <td>12.01.2015<td>
            <td>��� ������ �� 12.01.2015</td>


        </tr>
        </tbody>

    </table>

</div>