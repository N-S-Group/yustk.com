<?php

class GalleryController extends ControlerCPanel
{
    public $descriptionActionControlerForView = 'Галерея';

    public function actionIndex()
    {
        $this->name = '';

        $this->render('index',array('sections'=>GallerySections::getActive()));
    }


    public function actionajaxGetGallery(){
        $this->renderPartial("ajax_image",array('images'=>Gallery::getImages($_POST['id']),'id'=>$_POST['id']));
    }

    public function actionajaxSaveGallerySession(){
        Yii::app()->session['section'] = $_POST['id'];
    }

    public function actionAjaxGet(){
        if(Yii::app()->request->isAjaxRequest){
            $roles = Gallery::model()->findAll();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }

    public function actionAjaxDelOne(){
        if(Yii::app()->request->isAjaxRequest){
            if (!Gallery::model()->updateByPk(substr($_GET['cid'],9),array("delete"=>1))) $this->return = "/ajaxERROR";
            $this->renderPartial($this->return);
        }
    }

    public function actionAjaxDelAll() {
        if(Yii::app()->request->isAjaxRequest){
            $this->delAll($_GET['cid']);
            $this->renderPartial($this->return);
        }
    }

    private function delAll($array){
        foreach ($array as $item){
            if (!Gallery::model()->updateByPk($item,array("delete"=>1))) $this->return = "/ajaxERROR";
        }
    }

    public static function myscandir($id,$small = false)
    {
        $url = (!$small)?Yii::getPathOfAlias('webroot').'/uploads/gallery/'.$id:Yii::getPathOfAlias('webroot').'/uploads/gallery/'.$id."/small";
        $list = @scandir($url);
        if(is_array($list)){
            unset($list[0],$list[1]);
            return array_values($list);
        }else return array(0=>'');

    }

    public static function getFile($list,$num)
    {

        if(empty($list)) return false;
        foreach($list as $item){
            if(strpos($item,(string)$num)>0) return $item;
        }
        return false;
    }

    public function actionajaxDeletePhoto(){
        if(isset($_POST['id']) && strlen($_POST['id'])>0){
            $model = Gallery::model()->findByPk($_POST['id']);
            $model->delete = 1;
            if($model->save()){
                FileSystem::clear_dir(Yii::getPathOfAlias('webroot').'/uploads/gallery/'.$_POST['id']."/");
                @unlink(Yii::getPathOfAlias('webroot').'/uploads/gallery/'.$_POST['id']);
                echo 'true';
            }else echo 'false';
        }else echo 'false';
    }


    public function actionuploadFile(){
        if(isset($_FILES)){
          $model = new Gallery;
          $model->date_create = new CDbExpression("now()");
          $model->section = (isset(Yii::app()->session['section']))?Yii::app()->session['section']:1;
            /*
             *
             * Array ( [file] => Array ( [name] => New_Year_wallpapers_Green_stars_035291_.jpg [type] => image/jpeg [tmp_name] => C:\Windows\Temp\php2523.tmp [error] => 0 [size] => 294705 ) )
             * */
          if($model->save()){

              $info_dir = getcwd().'/uploads/gallery/'.$model->id;

              if(!is_dir($info_dir)) mkdir($info_dir,0770);
              if(!is_dir($info_dir.'/small')) mkdir($info_dir.'/small',0770);

              if(is_uploaded_file($_FILES['file']["tmp_name"]))
              {
                  if(move_uploaded_file($_FILES["file"]["tmp_name"], $info_dir."/".$_FILES["file"]["name"])){
                        $this->ImageResize(100,100,$info_dir."/small/".$_FILES["file"]["name"],$info_dir);
                  }
              }

          }
        }
    }

    public function ImageResize($width, $height, $img_name,$info_dir)
    {
        /* Get original file size */
        list($w, $h) = getimagesize($info_dir."/".$_FILES['file']['name']);

        /* Calculate new image size */
        $ratio = max($width/$w, $height/$h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* set new file name */
        $path = $img_name;


        /* Save image */
        if($_FILES['file']['type']=='image/jpeg')
        {
            /* Get binary data from image */
            $imgString = file_get_contents($info_dir."/".$_FILES['file']['name']);
            /* create image from string */
            $image = imagecreatefromstring($imgString);
            $tmp = imagecreatetruecolor($width, $height);
            imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
            imagejpeg($tmp, $path, 100);
        }
        else if($_FILES['file']['type']=='image/png')
        {
            $image = imagecreatefrompng($info_dir."/".$_FILES['file']['name']);
            $tmp = imagecreatetruecolor($width,$height);
            imagealphablending($tmp, false);
            imagesavealpha($tmp, true);
            imagecopyresampled($tmp, $image,0,0,$x,0,$width,$height,$w, $h);
            imagepng($tmp, $path, 0);
        }
        else if($_FILES['file']['type']=='image/gif')
        {
            $image = imagecreatefromgif($info_dir."/".$_FILES['file']['name']);

            $tmp = imagecreatetruecolor($width,$height);
            $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
            imagefill($tmp, 0, 0, $transparent);
            imagealphablending($tmp, true);

            imagecopyresampled($tmp, $image,0,0,0,0,$width,$height,$w, $h);
            imagegif($tmp, $path);
        }
        else
        {
            return false;
        }

        return true;
        imagedestroy($image);
        imagedestroy($tmp);
    }
}