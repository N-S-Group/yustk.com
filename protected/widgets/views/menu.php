
<ul id="menu" class="nav">
<? foreach ($data as $val) {
    ?>

    <?if (count($val["items"]) == 1) {?>
        <li class="<?=$val["className"]?>"><a href="<?=$val["items"][0]["route"]?>" title="" ><span><?=$val["items"][0]["name"]?></span></a></li>
        <?}?>

    <?if (count($val["items"]) > 1) {?>
        <li class="<?=$val["className"]?>"><a href="#"  title="" class='exp' id='<?=$val["id"]?>'><span><?=$val["name"]?></span><strong><?=count($val["items"])?></strong></a>
        <ul class="sub">

            <?$i=0;
            foreach($val["items"] as $item) {
                $i++;
                if (count($val["items"]) == $i) $last = 'class="last"'; else $last = "";
                ?>
                <li <?=$last?>><a href="<?=$item["route"]?>" title=""><?=$item["name"]?></a></li>
                <?
            }
            ?>

        </ul>
        </li>
        <?}?>

<?}?>


    </ul>

<? if (strlen($activeMenu)>0) {?>
<script>
    $(document).ready(function(){
    
        $("#<?=$activeMenu?>").removeClass("exp");
        $("#<?=$activeMenu?>").addClass("inactive");
        $("#<?=$activeMenu?>").addClass("active");
        $("#<?=$activeMenu?>").parent().find(".sub").show();

    });


</script>
<?}?>

