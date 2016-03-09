<?php
/**
 * Created by JetBrains PhpStorm.
 * User: PC
 * Date: 27.11.12
 * Time: 3:57
 * To change this template use File | Settings | File Templates.
 */
class MYChtml extends  CHtml
{

    public static  function errorSummary($model) {

        $content='';
        if(!is_array($model))
            $model=array($model);

            $firstError=true;
        foreach($model as $m)
        {
            foreach($m->getErrors() as $errors)
            {
                foreach($errors as $error)
                {
                    if($error!='')
                        $content.="$error";
                    if($firstError)
                        break;
                }
            }
        }
        if($content!=='')
        {

            if(!isset($htmlOptions['class']))

            return   '<script type="text/javascript">$.jGrowl("'.$content.'");</script>';

        }
        else
            return '';

    }

    public static  function showNotice($content) {

        return   '<script type="text/javascript">$.jGrowl("'.$content.'");</script>';

    }

    public static  function showMessage($content) {

        if (strlen($content)>0) return '<div class="nNote nInformation hideit">
            <p><strong>ИНФОРМАЦИЯ: </strong>'.$content.'</p>
        </div>';

    }


    public static  function showError($content) {

        if (strlen($content)>0) return '<div class="nNote nFailure hideit">
            <p><strong>ИНФОРМАЦИЯ: </strong>'.$content.'</p>
        </div>';

    }

	public static function showDescription($val){
		
		$numOfWords = 4;
	
        $value = CHtml::encode($val);  
  
        $lenBefore = strlen($val);  
  
        if($numOfWords){  
            if(preg_match("/\s*(\S+\s*){0,$numOfWords}/", $val, $match)){  
                $val = trim($match[0]);  
            }  
            if(strlen($val) != $lenBefore){  
                $val .= ' ...';
            }
		}
		return $val;
	}
	
	public static function showHot($val){
		switch ($val){
			case 0: return "Не важно";
			break;
			case 1: return "Важно";
			break;
			case 2: return "Очень важно";
			break;
		}
	}
	
	public static function showValue($val){
		$value = Fields::model()->findByPk($val);
		return $value->value;
	}
	
	public static function getPhotos($id,$pid,$type,$small=false){ //Функция выбора файлов, заглавной и других фотографий
		$uploaddir = Yii::getPathOfAlias("webroot");
		$dir="/uploads/objects/".$pid."/".$id."/".$type;
		if(is_dir($uploaddir.$dir)){
			@$title = scandir($uploaddir.$dir);
		$return=($type=='title')?$title[2]:$title;
		if($type=='title' && strlen($return)==0) {
			return Yii::app()->request->baseUrl."/images/noimage.jpg"; break;
		}

            if($type=='title' && strlen($return)>0 && $small) {
             return  Yii::app()->request->baseUrl.$dir."/".str_replace("title","small",$return);
            }

		$result=array();
			if(is_array($return)){
				foreach ($return as $file){
					$result[]=Yii::app()->request->baseUrl.$dir."/".$file;
				}
				unset($result[0],$result[1]);
				if($type=='photos')unset($result[count($result)+1]);
				return $result;
			}else{
				return Yii::app()->request->baseUrl.$dir."/".$return;
			}
		}elseif($type=='title' && !is_dir($uploaddir.$dir) ){
			return Yii::app()->request->baseUrl."/images/noimage.jpg"; break;
		}
	}
	
	public static function getNameFile($name){
		$name_array=explode("/",$name);
		return $name_array[count($name_array)-1];
	}

    public  static  function  numbeFormat($obj) {

        return number_format($obj, 0, ',', ' ');
    }

}
