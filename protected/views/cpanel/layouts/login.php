<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <title>�������� �����</title>
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

</head>
<body class="nobg loginPage">

<!-- Top fixed navigation -->
<!--<div class="topNav">
    <div class="wrapper">
        <div class="userNav">
            <ul>
                <li></li>
                <li><a href="<?=$this->createUrl('../.');?>" title=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/topnav/mainWebsite.png" alt="" /><span>�� ����</span></a></li>
                <li></li>

            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>-->

<?php echo $content; ?>

<!-- Main content wrapper -->
<div class="loginWrapper">

    <div class="widget">
        <div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/dark/files.png" alt="" class="titleIcon" /><h6>�������� �����</h6></div>
        <form action="<?=$this->createUrl("index");?>" id="validate" class="form" method='post'>
            <fieldset>
                <div class="formRow">
                    <label for="login">�����:</label>
                    <div class="loginInput"><input type="text" name="loginForm[login]" class="validate[required]" id="login" /></div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label for="pass">������:</label>
                    <div class="loginInput"><input type="password" name="loginForm[password]" class="validate[required]" id="pass" /></div>
                    <div class="clear"></div>
                </div>

                <div class="loginControl">
                   <div class="rememberMe"></div>
                    <input type="submit" value="����" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<!-- Footer line -->
<div id="footer">
    <div class="wrapper"></div>
</div>

<?echo $msg?>
</body>
</html>