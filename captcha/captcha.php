<?php
	session_start();
	$a="abcdefghijklmnopqrstuvwxyz1234567890";
$b = ""; 
  // формируем строку из 6 символов, которая будет отображаться на картинке 
  for($i=0;$i<6;$i++) 
    $b.= $a[rand(0,strlen($a)-1)]; 
 
$arr = str_split($b);
$_SESSION['rand_code']=$b;
$im=imagecreate(175,50);//создаем картинку
imagecolorallocate($im,255,255,255);
$c=0;
for($i=0;$i < 7;$i++)//наносим код на картинку
{
  $color=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
  imagestring($im,rand(4,10),$a+=20,rand(0,20),$arr[$i],$color);
}

header("Content-type: image/jpeg");
imagejpeg($im,'',100);//выводим капчу
?>