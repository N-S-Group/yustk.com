<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 08.12.12
 * Time: 23:00
 * To change this template use File | Settings | File Templates.
 */
class FileSystem
{

    static	function img_resize  ($src, $dest, $width, $quality)
    {
        $foto=$src;
        $f=fopen($foto,"rb");

        $upload=fread($f,filesize($foto));
        fclose($f);
        $size = $width;
        $src = imagecreatefromstring ($upload);
        $width = imagesx($src);
        $height = imagesy($src);
        $aspect_ratioh = $height/$width;
        $aspect_ratiow = $width/$height;
        $new_w = $width;
        $new_h = $height;
        if ($width <= $size)
        {
            $new_w = $width;
            $new_h = $height;
            $img = imagecreatetruecolor ($new_w,$new_h);
        }
        else
        {
            $new_w = $size;
            $new_h = abs($new_w / $aspect_ratiow);
            $img = imagecreatetruecolor ($new_w,$new_h);
        }

        imagecopyresampled ($img,$src,0,0,0,0,$new_w,$new_h,$width,$height);
        $dirict= $dest;
        $addfoto=imagejpeg($img, $dirict, $quality);
        imagedestroy($img);
    }


    static function uploads($name, $dir, $max_image_width=2800, $max_image_height=2800, $max_image_size=1572864, $valid_types=array('jpg','gif','jpeg','JPG','GIF','JPEG','swf','SWF')){
        if (isset($_FILES[$name]))
        {
            if (is_uploaded_file($_FILES[$name]['tmp_name']))
            {
                $filename = $_FILES[$name]['tmp_name'];
                $ext = substr($_FILES[$name]['name'],  1 + strrpos($_FILES[$name]['name'], "."));
                if (filesize($filename) > $max_image_size)
                {
                    $err[0]='1';  $err[1]='Ошибка: превышен максимальный размер файла';
                    return $err;
                }
                elseif (!in_array($ext, $valid_types))
                {
                    $err[0]='1';   $err[1]='Ошибка: запрещенный формат файла .'.$ext;
                    return $err;
                }
                else
                {
                    $size = GetImageSize($filename);
                    if (!is_array($size)) {$size[0]=1; $size[1]=1;}
                    if (($size) && ($size[0] < $max_image_width)&& ($size[1] < $max_image_height)) {
                        if (move_uploaded_file($filename, $dir)) {
                            $err[0]='0';   $err[1]='Файл удачно загружен на сервер.';
                            return $err;
                        }
                        else        {
                            $err[0]='1';   $err[1]='Ошибка: произошла неизвестная ошибка при загрузке файла.';
                            return $err;
                        }
                    }
                    else
                    {
                        $err[0]='1';   $err[1]='Ошибка: разрешение графического изображения превышает заданные значения';
                        return $err;
                    }
                }
            }
            else
            {
                $err[0]='1';   $err[1]='Не выбран файл.';
                return $err;

            }
        }
        else
        {
            $err[0]='1';   $err[1]='Не выбран файл.';
            return $err;                  }
    }


    static function removeDir($dir) {
       if (!is_dir($dir)) return false;
        $d = dir($dir);
        while($entry = $d->read())
        {
            if ($entry != "." && $entry != "..")
            {
                if (Is_Dir($dir."/".$entry))
                {
                    FileSystem::removeDir($dir."/".$entry);
                }
                else
                {
                    UnLink($dir."/".$entry);
                }
            }
        }

        $d->close();
        if(file_exists($dir))
        {
            rmdir($dir);
        }
    }


    public static function clearDir( $dir ) {
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? FileSystem::clearDir($obj) : unlink($obj);
            }
        }
    }


    static function crop($file_input, $file_output, $crop = 'square',$percent = false) {
        list($w_i, $h_i, $type) = getimagesize($file_input);
        if (!$w_i || !$h_i) {
            echo 'Невозможно получить длину и ширину изображения';
            return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom'.$ext;
            $img = $func($file_input);
        } else {
            echo 'Некорректный формат файла';
            return;
        }
        if ($crop == 'square') {
            $min = $w_i;
            if ($w_i > $h_i) $min = $h_i;
            $w_o = $h_o = $min;
        } else {
            list($x_o, $y_o, $w_o, $h_o) = $crop;
            if ($percent) {
                $w_o *= $w_i / 100;
                $h_o *= $h_i / 100;
                $x_o *= $w_i / 100;
                $y_o *= $h_i / 100;
            }
            if ($w_o < 0) $w_o += $w_i;
            $w_o -= $x_o;
            if ($h_o < 0) $h_o += $h_i;
            $h_o -= $y_o;
        }
        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
        if ($type == 2) {
            return imagejpeg($img_o,$file_output,100);
        } else {
            $func = 'image'.$ext;
            return $func($img_o,$file_output);
        }
    }


    static function crop_resize ($res, $dist, $x, $y)
    {

        $f=fopen($res,"rb");

        $upload=fread($f,filesize($res));
        fclose($f);
        $image = imagecreatefromstring ($upload);


        $thumb_width = $x;
        $thumb_height = $y;

        $width = imagesx($image);
        $height = imagesy($image);

        $original_aspect = $width / $height;
        $thumb_aspect = $thumb_width / $thumb_height;

        if ( $original_aspect >= $thumb_aspect )
        {
            // If image is wider than thumbnail (in aspect ratio sense)
            $new_height = $thumb_height;
            $new_width = $width / ($height / $thumb_height);
        }
        else
        {
            // If the thumbnail is wider than the image
            $new_width = $thumb_width;
            $new_height = $height / ($width / $thumb_width);
        }

        $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
        imagecopyresampled($thumb,
            $image,
            0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
            0 - ($new_height - $thumb_height) / 2, // Center the image vertically
            0, 0,
            $new_width, $new_height,
            $width, $height);
        imagejpeg($thumb, $dist, 80);

    }

    /*
     * $fileElementName = имя HTMLInput:name
     *  $this->path_site."/temp/".FilterMy::text($session)."/" == $basePath
     */
    static  function  ajaxUpload($fileElementName, $basePath, $smallSizeX = 140, $smallSizeY = 100, $bigSize = 800) {

        if(!empty($_FILES[$fileElementName]['error']))
        {
            switch($_FILES[$fileElementName]['error'])
            {
                case '1':
                    $error = 'Ошибка. Превышен максимально допустимый размер файла';
                    break;
                case '2':
                    $error = 'Ошибка. Превышен максимально допустимый размер файла';
                    break;
                case '3':
                    $error = 'Ошибка. Файл был только частично загружен на сервер';
                    break;
                case '4':
                    $error = 'Ошибка. Не выбран файл для загрузки';
                    break;
                case '6':
                    $error = 'Ошибка. Временная папка не доступна';
                    break;
                case '7':
                    $error = 'Ошибка. Ошибка записи файла на диск';
                    break;
                case '8':
                    $error = 'Ошибка. Не известная ошибка';
                    break;
                case '999':
                default:
                    $error = 'Ошибка. Не известная ошибка';
            }
        }elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
        {
            $error = 'Ошибка. Не выбран файл для загрузки';
        } else
        {

            $rand = time().rand(0,1000000);
            $filename_temp=$basePath.$rand.".jpg";
            $filename_temp_small=$basePath."small/".$rand.".jpg";
            $filename_temp_big=$basePath."big/".$rand.".jpg";
            move_uploaded_file($_FILES[$fileElementName]['tmp_name'],$filename_temp);
            @unlink($_FILES[$fileElementName]);
            FileSystem::crop_resize($filename_temp, $filename_temp_small, $smallSizeX, $smallSizeY);
            FileSystem::img_resize($filename_temp, $filename_temp_big, $bigSize, 90);
            @unlink($filename_temp);
        }

        $msg =  "{";
        $msg.=				"error: '" . $error . "',\n";
        $msg.=   			"msg: '". str_replace($basePath,"",$filename_temp_small) . "'\n";
        $msg.= "}";
        return $msg;
    }


    static  function full_copy($source, $target) {
        if (is_dir($source))  {
            @mkdir($target);
            $d = dir($source);
            while (FALSE !== ($entry = $d->read())) {
                if ($entry == '.' || $entry == '..') continue;
                self::full_copy("$source/$entry", "$target/$entry");
            }
            $d->close();
        }
        else copy($source, $target);
    }



    static  function get_img_name ($dir,$valid_types=array('jpg','gif','jpeg','swf','JPG','GIF','JPEG','SWF')){

        $name=0;
        $ext = substr($_FILES[$name]['name'], 1 + strrpos($_FILES[$name]['name'], "."));



        $array_name=array();

        if (is_dir($dir)){

            $d = dir($dir);
            while($entry=$d->read()) { // Последовательно выводить
                if ($entry!=".." and $entry!=".") {
                    $filename=$entry;

                    if (in_array(substr($filename,strrpos($filename,".")+1), $valid_types))
                    {
                        $name=substr($filename,0,strrpos($filename,"."));
                        $array_name[$name]=$filename;}}
            }                          // имеющегося в каталоге
            $d->close();
        }
        return  $array_name;
    }



}
