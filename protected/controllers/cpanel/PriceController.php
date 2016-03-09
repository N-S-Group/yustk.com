<?php

class PriceController extends ControlerCPanel
{
    public $nameControlerForView = "Прайс-лист";


    public function filters()
    {
        return array(
            'checkAccess'
        );
    }


    public function actionSave() {

        $baseDir =  Yii::getPathOfAlias("webroot");
        $uploadDir = $baseDir."/uploads/price/";
        FileSystem::clearDir($uploadDir);

        if (is_uploaded_file($_FILES["price"]["tmp_name"])) {

            if (move_uploaded_file($_FILES["price"]["tmp_name"], $uploadDir.$_FILES["price"]["name"])) {

            }
        }
          $this->actionIndex();

    }


    public function actionIndex() {
        $baseDir =  Yii::getPathOfAlias("webroot");
        $uploadDir = $baseDir."/uploads/price/";
        $price = scandir($uploadDir);
        if ($price <=2 ){ $price = false;}
        else
        {   $name = $price[2];
            $price = stat ($uploadDir.$price[2]);
        }
        $this->render("index", array("price"=>$price,"name"=>$name));

    }



}
