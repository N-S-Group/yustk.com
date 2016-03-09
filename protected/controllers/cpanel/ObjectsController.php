<?php

class ObjectsController extends ControlerCPanel
{
    public $nameControlerForView = "Каталог объектов";

    public function filters()
    {
        return array(
            'checkAccess'
        );
    }


    public function actionIndex() {


       $this->render("index");

    }


    public function actionEdit($editid) {
        $baseDir =  Yii::getPathOfAlias("webroot");
        $uploadDir = $baseDir."/uploads/objects/".$editid."/";
        $objects = Objects::model()->findByPk($editid);
        $this->render("edit",array("objects"=>$objects, "uploadDir"=>$uploadDir));

    }

    public function actionEditSave($editid) {


        $objects = Objects::model()->findByPk($editid);
        if ($this->Save($objects)) {
            $message = $objects->getErrors();
        }
        else {
            $message = "Сохранено успешно";
        }

        $baseDir =  Yii::getPathOfAlias("webroot");
        $uploadDir = $baseDir."/uploads/objects/".$editid."/";

        $this->render("edit",array("objects"=>$objects, "message"=>$message, "uploadDir"=>$uploadDir));

    }


    public function Save($object) {
        $attr = Array();
        foreach ($_POST['form'] as $key=>$val) {
            if ($key!="description") $attr[$key] = str_replace('"',"'",$val); else $attr[$key] = $val;
        }
        $object->attributes=$attr;
        $object->date_create = new CDbExpression('NOW()');
        $object->save();
        $this->saveFiles($object->cid);
        return $object->getErrors();
    }


    private function saveFiles($id){

        if (is_nan($id)) return false;
        $baseDir =  Yii::getPathOfAlias("webroot");
         $uploadDir = $baseDir."/uploads/objects/".$id."/";
        if (!is_dir($uploadDir))  {
            mkdir($uploadDir,0777);
            mkdir($uploadDir."small",0777);
            mkdir($uploadDir."big",0777); }

        foreach ($_FILES as $key=>$vals)
        {


            $this->saveFile($_FILES[$key]["tmp_name"], $uploadDir, $key);
        }
    }

    private function moveUpload($val,$name, $uploadDir) {

        if (is_uploaded_file($val)) {

             if (move_uploaded_file($val, $uploadDir."/".$name.".jpg")) {

            $this->ResizeOrigin($uploadDir."/".$name.".jpg",$uploadDir."/small/".$name.".jpg" , 144);
            $this->ResizeOrigin($uploadDir."/".$name.".jpg",$uploadDir."/big/".$name.".jpg" , 800);
             }
        }

    }

    private function saveFile($val, $uploadDir, $key){

        if ($key == "title") {$this->moveUpload($val[0],"title",$uploadDir);}
        if ($key == "photos") {
            foreach ($val as $name => $file) {
                $this->moveUpload($file,"$name",$uploadDir);
            }
        }
    }



        public function actionSave() {

        $objects=new Objects;

        if ($this->Save($objects)) {
            $message = $objects->getErrors();
        }
        else {
            $message = "Добавлено успешно";
        }

        $this->render("index", array("message"=>$message));
    }


    public function actionAjaxDelAll() {

        if(Yii::app()->request->isAjaxRequest){
            if ($this->deleteAll($_GET['cid']))
                $this->renderPartial('/ajaxOK');
            else
                $this->renderPartial('/ajaxERROR');
        }
    }

    /*
     * Обработка запроса на удаление одной записи
     *
     */
    public function actionAjaxDelOne() {

        if(Yii::app()->request->isAjaxRequest){
            $id = (int)substr($_GET['cid'],6);
            if (!$this->delOne($id))
                $this->renderPartial('/ajaxOK');
            else
                $this->renderPartial('/ajaxERROR');
        }
    }


    /*
     * Обработка запроса на получение данных
     *
     */
    public function actionAjaxGet() {

        if(Yii::app()->request->isAjaxRequest){
            $objects = Objects::model()->findAll();
            $this->renderPartial('ajaxdata',array("objects"=>$objects));
        }
    }


    private function  deleteAll($arg) {
        $error = true;
        foreach ($arg as $val) {
          $error+= $this->delOne($val);
        }
        return $error;
    }


    private function delOne($val) {
        if (Objects::model()->deleteByPk($val)) {
            return false;
        } else {
            return true;
        }
    }


    public function actionDeleteTitle(){

        $uploaddir = Yii::getPathOfAlias("webroot");
        $uploaddir.="/uploads/objects/".(int)$_GET["cid"];

          if (isset($_GET['href'])) {
              @unlink ($uploaddir."/small/".(int)$_GET["href"].".jpg");
              @unlink ($uploaddir."/big/".(int)$_GET["href"].".jpg");
              echo "true";
          } else {
              @unlink ($uploaddir."/small/title.jpg");
              @unlink ($uploaddir."/big/title.jpg");
              echo "true";
          }

    }

    private function UnlinkImg($link,$end){
        $uploaddir = Yii::getPathOfAlias("webroot");
        if(unlink($uploaddir."/uploads/objects/".$link[3]."/".$link[4]."/".$link[5].$end)) { $this->checkPhotos($link[4]); return true;}
        else return false;
    }


}
