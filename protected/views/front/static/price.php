<br>




<div class="content main">

<? /* Yii::app()->controller->renderPartial('application.views.front.static.prices.yustk777'); ?><br><br>
<? Yii::app()->controller->renderPartial('application.views.front.static.prices.vostok-trans'); ?><br><br>
<? Yii::app()->controller->renderPartial('application.views.front.static.prices.yustk-tbo'); ?><br><br>
<? Yii::app()->controller->renderPartial('application.views.front.static.prices.clear-city'); ?><br><br>
<? Yii::app()->controller->renderPartial('application.views.front.static.prices.yujtranskom'); */

 Yii::app()->controller->renderPartial('application.views.front.static.prices.yustk-tbo'); ?>

<br><br>

<br>
<br>

    <a href="docs/price-2016.pdf"><b>������� ����� �� 2016 ���.</b></a>
</div>






<script>

    $(".show").click(function(){
        closeAll();
        var tr = $(this).parent().parent();
        tr.next(".description").fadeIn();
        return false;
    });

  $(".createOrder4").click(function(){
        var length = $("body").find("#createOrder4").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder4' style='border-bottom: 2px solid #000000 !important;  display: none'><td colspan='6'>" +
                "<b>��� ��������� ������:</b><br>"+
                "<b>���������� �����:</b><br>"+
                "���������� ��������� �� ��� 8-938-44-000-40, �������� �����,��� � ����������� ���� � ����� ������.<br>"+
                "<b>����������� �����:</b><br>"+
                "���������� ��������� �������, ��� ����� ����� ������� � ���� �� ������: ����� ������������ ����� ���������� �����,59, ���. 205, 207  ��������� ������ �� ����� ��� � ���������� ���������� ����� �� ������������ ��������."+
                "<br><a href='index.php' class='close'>�������</a> " +
                "</td></tr>");
        $("#createOrder4").fadeIn();
        return false;
    });


    $(".createOrder5").click(function(){
        var length = $("body").find("#createOrder5").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder5' style='border-bottom: 2px solid #000000 !important;  display: none'><td colspan='6'>" +
                "<b>��� ���������� � ����������� ���</b> � ������� ������� ����������� � ��������������� ���������������� ������� � ������������� ������ ��� ��������� ������ ����������:<br>"+
                "- ������� � ���� ����� ����������� �� ������ :����� ������������ ��������������� �����,59, ���. 205, 207 ��� ���������� ��������,<br>" +
                " ���������� ������ �� ����� �������, � ����� ���������� ���������� ����� �� ������� ��� ��� ��������."+
                "<br><a href='index.php' class='close'>�������</a> " +
                "</td></tr>");
        $("#createOrder5").fadeIn();
        return false;
    });

    $(".createOrder6").click(function(){
        var length = $("body").find("#createOrder6").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder6' style='border-bottom: 2px solid #000000 !important;  display: none'><td colspan='6'>" +
                "<b>��� ���������� � ����������� ���</b> � ������� ������� ����������� � ������ ������� ������������ ������� (������� �����) ��� ��������� ������ ����������<br>"+
                "-  ������� � ���� ����� ����������� �� ������: ����� ������������ ����� ���������� �����,59, ���. 205, 207 ��� ���������� ��������.<br>"+
                "�������� ����������� ���������� ��� ���������� ��������:<br>"+
                "<br><b>��� �� � ���.���.</b><br>"+
                "<li>����� ��������</li>"+
                "<li>����� ���;</li>"+
                "<li>����� �������� ������ (���� ���������, ��������������� ������� ���������).</li>"+
                "<br><b>��� ����������� ���.</b>"+
                "<li>����� ������������� ���</li>"+
                "<li>����� ������������� ����</li>"+
                "<li>���������� ���������</li>"+
                "<li>������� ������ (���� ���� ��������, �������������� ������� ����������� ���������)</li>"+
                "<br><a href='index.php' class='close'>�������</a> " +
                "" +
                "</td></tr>");
        $("#createOrder6").fadeIn();
        return false;
    });


    $(".createOrder3").click(function(){
        var length = $("body").find("#createOrder3").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder3' style='border-bottom: 2px solid #000000 !important; display: none'><td colspan='6'>" +
                "<b>��� ���������� � ����������� ���</b> � ������� ������� ����������� � ������� ����������� ��� �������� ���� ��� ��������� ������ ����������:<br>"+
                "-  ������� � ���� ����� ����������� �� ������: ����� ������������ ����� ���������� �����,59, ���. 205, 207 ��� ���������� ��������,<br>"+
                "���������� ������, � ����� ���������� ���������� ����� �� ������� ��� ��� ��������:<br>"+
                "<br><a href='index.php' class='close'>�������</a> " +
                "</td></tr>");

        $("#createOrder3").fadeIn();
        return false;
    });



   /* $( "body").delegate(".close","click",function(){

        closeAll()

        return false;
    });*/

    $(".close").click(function(){
       $(this).parent().parent().fadeOut(); return false;
    });

    function closeAll(){
          $(".description").fadeOut();
        //$("#createOrder3, #createOrder6, #createOrder5, #createOrder4").fadeOut();
    }

</script>


