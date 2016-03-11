<!DOCTYPE html>
<html>
<head>
    <title>Юстк </title>
    <meta charset="windows-1251" />
    <link href="<?=$this->path?>/css/response.css" rel="stylesheet">
    <link href="<?=$this->path?>/css/jquery.remodal.css" rel="stylesheet">

    <script src="<?=$this->path?>/js/jquery-1.12.0.min.js"></script>
    <script src="<?=$this->path?>/js/jquery.validate.js"></script>
    <script src="<?=$this->path?>/js/localization/messages_ru.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

<div class="wrapper">

    <div class="header main">
        <div class="logo"><img src="<?=$this->path?>/images/logo.png"></div>
        <?if ($this->isCabinet == false) $this->renderPartial("application.views.front.cabinet.login")?>
        <?if ($this->isCabinet) $this->renderPartial("application.views.front.cabinet.isenter")?>
    </div>
    <div class="top_menu main">
        <ul>
            <li <?if ($this->courSection=="index") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/index.php"?>"><img src="<?=$this->path?>/images/menu/main<?=$w?>.png"></a></li>
            <li <?if ($this->courSection=="about") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/about.php"?>"><img src="<?=$this->path?>/images/menu/about<?=$w?>.png"></a></li>
            <li <?if ($this->courSection=="tech") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/tech.php"?>"><img src="<?=$this->path?>/images/menu/tech<?=$w?>.png"></a></li>
            <li <?if ($this->courSection=="price") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/price.php"?>"><img src="<?=$this->path?>/images/menu/price<?=$w?>.png"></a></li>
            <li <?if ($this->courSection=="contacts") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/contacts.php"?>"><img src="<?=$this->path?>/images/menu/contacts<?=$w?>.png"></a></li>
            <li <?if ($this->courSection=="guest-book") {echo  'class="active"'; $w="-w";} else {$w="";}?>><a href="<?=$this->path."/guest-book.php"?>"><img src="<?=$this->path?>/images/menu/guest-book<?=$w?>.png"></a></li>
        </ul>
    </div>
    <div class="courusel main">
       <? if ($this->isCabinet == false) {?> <img src="<?=$this->path?>/images/courusel/1.jpg" border="0"> <?}?>
    </div>

<?=$content?>

    <div class="footer">
        <div class="main" style="position: relative">
        <div class="footer_cont"><span>Контакты:</span> <br><b>Тел./ факс: 8 (8617) 607-137<br></b>
            Электронный адрес: <a href="mailto:ystk-ekaterina@mail.ru">ystk-ekaterina@mail.ru</a><br><br>
        </div>
        <div class="footer_menu"><span>Разделы:</span><br>
            <a href="<?=$this->path."/about.php"?>">О компании</a>
            <a href="<?=$this->path."/tech.php"?>">Техника</a>
            <a href="<?=$this->path."/contacts.php"?>">Контакты</a>
            <a href="<?=$this->path."/price.php"?>">Цены</a><br>
        </div>

            <div class="footer_logo" style="color: #ffffff"><b>
                ООО "ЮСТК-ТБО", 2005 - <?=date("Y")?></b><br>
                Разработка сайта: <a href="http://openart.su/">web-студия OpenArt</a>

            </div>

        </div>
    </div>

</div><!-- .wrapper -->


<script src="<?=$this->path?>/js/jquery.remodal.js"></script>




</body>
</html>