<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
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

        $size=GetImageSize ($dir);
        switch (substr($dir,strpos($dir,"."))) {
            case '.jpg': $src = @imagecreatefromjpeg($dir); break;
            case '.gif': $src = @imagecreatefromgif($dir); break;
            case '.png': $src = @imagecreatefrompng($dir); break;
        }
        $iw=$size[0];
        $ih=$size[1];

        $ratio = $iw/$width;
        $w_dest = round($iw/$ratio);
        $h_dest = round($ih/$ratio);
        $dst=ImageCreateTrueColor ($w_dest, $h_dest);
        ImageCopyResampled ($dst, $src, 0, 0, 0, 0, $w_dest, $h_dest, $iw, $ih);
        $url = "";

        switch (substr($dir,strpos($dir,"."))) {

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