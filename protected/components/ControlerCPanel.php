<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 1:30
 * To change this template use File | Settings | File Templates.
 */
class ControlerCPanel extends CController
{

    public $nameControlerForView = "Основные категории";
    public $descriptionActionControlerForView = "";

    public $layout='//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public function filters()
    {
        return array(
            'checkAccess'
        );
    }

    public  function  filterCheckAccess($filterChain) {

        if (Yii::app()->user->isGuest) {
            $this->redirect($this->createUrl("/login"));
        }

        $filterChain->run();
        return true;
    }


    //-----------Функция удаления директории----------//

    public function DeleteDir($dir,$exp=''){
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? $this->DeleteDir($obj,$exp) : unlink($obj);
            }
        }
        @rmdir($dir);
    }

    //-----------------------------------------------//


    public function ResizeOrigin($dir,$name,$width){
        //$dir = strtolower($dir);
        $size=GetImageSize ($dir);

        //echo substr($dir,strpos($dir,"."));
        //echo $dir;


        switch (strtolower(substr($dir,strpos($dir,".")))) {
            case '.jpg': $src = @imagecreatefromjpeg($dir); break;
            case '.gif': $src = @imagecreatefromgif($dir); break;
            case '.png': $src = @imagecreatefrompng($dir); break;
        }
        $iw=$size[0];
        $ih=$size[1];
       // echo "jhghjgj";

        $ratio = $iw/$width;
        $w_dest = round($iw/$ratio);
        $h_dest = round($ih/$ratio);
        $dst=ImageCreateTrueColor ($w_dest, $h_dest);
        ImageCopyResampled ($dst, $src, 0, 0, 0, 0, $w_dest, $h_dest, $iw, $ih);
        $url = "";

        switch (strtolower(substr($dir,strpos($dir,".")))) {

            case '.jpg': imagejpeg($dst, $name, 80);
                break;

            case '.gif': imagegif($dst, $name, 80);
                break;

            case '.png': imagepng($dst, $name, 0);
                break;

        }
        imagedestroy($src);
    }



}
