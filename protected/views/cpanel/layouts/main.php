<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>Администраторская панель</title>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/cpanel/main.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/cpanel/colorbox.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>


    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/spinner/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/uniform.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/jquery.validationEngine.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/autogrowtextarea.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/jquery.inputlimiter.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/forms/chosen.jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/wizard/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/wizard/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/wizard/jquery.form.wizard.js"></script>


    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/tables/datatable.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/tables/tablesort.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/tables/resizable.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.tipsy.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.collapsible.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.timeentry.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.jgrowl.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.breadcrumbs.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/ui/jquery.sourcerer.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/calendar.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/elfinder.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jquery.colorbox.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/options.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/swfobject.js"></script>
<script>
 $(document).ready(function() {
  $("a.groups_photo").colorbox({rel:'groups_photo',transition:"elastic",speed:550,width:"800px"});
  $("a.title_photo").colorbox({transition:"elastic",speed:550,width:"800px"});
  $("#photos_count").click(function(){
  	if($("#radio3").is(":checked")){
		$("#photos_int").removeAttr("readonly");
	}else{
		$("#photos_int").attr("readonly","readonly");
	}
  });
  
  $("#select_type").click(function(){
  	if($("#radio4, #radio5, #radio6").is(":checked")){
		$("#element_int").removeAttr("readonly");
	}else{
		$("#element_int").attr("readonly","readonly");
	}
  });
  

    });
</script>
</head>

<body>
<!-- Left side content -->
<div id="leftSide">
    <div class="logo"><a href="http://openart.su" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="" /></a></div>

    <div class="sidebarSep mt0"></div>
<!-- Left side content -->

<? $this->widget('application.widgets.Menu',
    array(   )
); ?>

</div>


<!-- Right side -->
<div id="rightSide">

    <!-- Top fixed navigation -->
    <div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/userPic.png" alt="" /></a><span></span></div>
            <div class="userNav">
                <ul>
                    <li><a href="<?=$this->createUrl("settings/",array());?>" title="" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/topnav/profile.png" alt="" /><span>Профиль</span></a></li>

                    <li ><a href="javascript:$.jGrowl('Функция не доступна');" ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/topnav/settings.png" alt="" /><span>Настройки</span></a></li>

                    <li><a href="<?=$this->createUrl("login/exit",array());?>" title=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/topnav/logout.png" alt="" /><span>Выход</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="titleArea">
        <div class="wrapper">
            <div class="pageTitle">
                <h5><?=$this->nameControlerForView?></h5>
                <span><?=$this->descriptionActionControlerForView?></span>

            </div>
        </div>   <br><br><br> <br> <br>

    </div>
    <!-- Breadcrumbs -->

    <div class="wrapper">
    <?php echo $content; ?>

        </div>
    <!-- Footer line -->
    <div id="footer">
        <div class="wrapper">Все права защищены. Обращатесь на сайт разработчика <a href="http://openart.su" title="">OpenArtStudio</a></div>
    </div>

</div>

<div class="clear"></div>

</body>
</html>
