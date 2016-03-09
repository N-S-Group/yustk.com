<p></p>
<?
if ($_GET["ourworks"] == 1) $this->section = "ourworks";
if ($_GET["ourworks"] != 1) echo $text?>
<br><br>

<?
if ($_GET["ourworks"] == 1 and $_GET["dis!=1"]) $this->renderPartial("/static/ourworks");
?>
<a name="content"></a><h2>мЮЬХ ПЮАНРШ</h2>


<ul class="our-work-nav">
    <li <? if ($type=="kuhni") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/kuhni",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">йсумх</a></li>
    <li <? if ($type=="shkafikupe") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/shkafikupe",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">ьйютш-йсое</a></li>
    <li <? if ($type=="gostinnie") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/gostinnie",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">цнярхмше</a></li>
    <li <? if ($type=="spalni") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/spalni",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">яоюкэмх</a></li>
    <li <? if ($type=="prihojie") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/prihojie",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">опхунфхе</a></li>
    <li <? if ($type=="garderobnie") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/garderobnie",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">цюпдепнамше</a></li>
    <li <? if ($type=="detskie") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/detskie",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">деряйхе</a></li>
    <li <? if ($type=="ofisnayamebel") echo "class='active'";?>><a href="<?=$this->createUrl("/catalog/ofisnayamebel",array("dis"=>(int)$_GET["dis"],"ourworks"=>(int)$_GET["ourworks"]))?>#content">нтхямюъ леаекэ</a></li>
</ul>


<br><br>
<div style="text-align: center">
<ul class="our-photo" style="width: 80%; margin: 0 auto">
    <? for ($i = 1; $i<=$this->ourWorkCount; $i++) {?>
    <li  style=" height: 133px; display: inline-block;   padding: 5px;  ">

        <a rel="gal" href="<?=Yii::app()->request->baseUrl;?>/uploads/<?=$this->courSection?>/big/<?=$i?>.jpg"><img src="<?=Yii::app()->request->baseUrl;?>/uploads/<?=$this->courSection?>/small/<?=$i?>.jpg" style="vertical-align: bottom; height: 100%"/></a>

    </li>
    <?}?>


</ul>

</div>

<script>
    $(document).ready(function(){
        $(".our-photo a").colorbox({

            scalePhotos: true,
            maxWidth: "80%",
            maxHeight: "80%",
            rel: "gal"

        });
    });
</script>