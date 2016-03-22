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

    <a href="docs/price-2016.pdf"><b>Скачать прайс на 2016 год.</b></a>
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
                "<b>Для получения услуги:</b><br>"+
                "<b>Физическим лицом:</b><br>"+
                "достаточно позвонить по тел 8-938-44-000-40, сообщить адрес,ФИО и планируемую дату и время вывоза.<br>"+
                "<b>Юридическим лицом:</b><br>"+
                "необходимо заключить договор, для этого нужно явиться в офис по адресу: город Новороссийск улица Мысхакское шоссе,59, каб. 205, 207  заполнить заявку на вывоз ЖБО и произвести предоплату одним из предложенных способов."+
                "<br><a href='index.php' class='close'>Закрыть</a> " +
                "</td></tr>");
        $("#createOrder4").fadeIn();
        return false;
    });


    $(".createOrder5").click(function(){
        var length = $("body").find("#createOrder5").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder5' style='border-bottom: 2px solid #000000 !important;  display: none'><td colspan='6'>" +
                "<b>Для физических и юридических лиц</b> у которых имеется потребность в транспортировке крупногабаритных отходов и строительного мусора для получения услуги необходимо:<br>"+
                "- Прибыть в офис нашей организации по адресу :город Новороссийск улицаМысхакское шоссе,59, каб. 205, 207 для заключения договора,<br>" +
                " заполнения заявки на вывоз Бункера, а также произвести предоплату одним из удобных для Вас способом."+
                "<br><a href='index.php' class='close'>Закрыть</a> " +
                "</td></tr>");
        $("#createOrder5").fadeIn();
        return false;
    });

    $(".createOrder6").click(function(){
        var length = $("body").find("#createOrder6").length;
        closeAll()
        var tr = $(this).parent().parent();
        tr.after("<tr id='createOrder6' style='border-bottom: 2px solid #000000 !important;  display: none'><td colspan='6'>" +
                "<b>Для физических и юридических лиц</b> у которых имеется потребность в вывозе твердых коммунальных отходов (обычный мусор) для получения услуги необходимо<br>"+
                "-  Прибыть в офис нашей организации по адресу: город Новороссийск улица Мысхакское шоссе,59, каб. 205, 207 для заключения договора.<br>"+
                "Перечень необходимых документов для заключения договора:<br>"+
                "<br><b>Для ИП и физ.лиц.</b><br>"+
                "<li>Копия паспорта</li>"+
                "<li>Копия ИНН;</li>"+
                "<li>Копия договора аренды (либо документа, подтверждающего площадь помещения).</li>"+
                "<br><b>Для юридических лиц.</b>"+
                "<li>Копия свидетельства Инн</li>"+
                "<li>Копия свидетельства ОГРН</li>"+
                "<li>Банковские реквизиты</li>"+
                "<li>Договор аренды (либо иной документ, подтверждающий площадь занимаемого помещения)</li>"+
                "<br><a href='index.php' class='close'>Закрыть</a> " +
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
                "<b>Для физических и юридических лиц</b> у которых имеется потребность в подвозе технической или питьевой воды для получения услуги необходимо:<br>"+
                "-  Прибыть в офис нашей организации по адресу: город Новороссийск улица Мысхакское шоссе,59, каб. 205, 207 для заключения договора,<br>"+
                "заполнения заявки, а также произвести предоплату одним из удобных для Вас способом:<br>"+
                "<br><a href='index.php' class='close'>Закрыть</a> " +
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


