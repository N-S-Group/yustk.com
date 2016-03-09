<?php

class UserController extends ControlerCPanel
{
    public $nameControlerForView = "Управление пользователями администраторской панели";
    public $descriptionActionControlerForView = "";
    private $roles;

    /*
     * класс Работы с AuthManager
     */

    private $checkAuthItem;
	//public $layout='//layouts/users';


    public function filters()
    {
        return array(
             'checkAccess',  'preLoadRoles'
        );
    }




    public function filterPreLoadRoles($filterChain)
    {

        $this->checkAuthItem = new extendAythManager();
        $this->roles = $this->checkAuthItem->getArrayRoles(); // Заполняем таблицы возможными  CAuthItem createOperation в зависимости от того что есть в таблице меню
        $filterChain->run();
        return true;
    }



    private function addNewUser()
    {

        if (!$this->checkDouble($_POST['contacts']["login"])) return false;
			$contacts = new User;
			$salt=$contacts->generateSalt(6);
			$contacts->attributes=$_POST['contacts'];
			$contacts->date_create = new CDbExpression('NOW()');
			$contacts->salt=$salt;
			$contacts->password=$contacts->createPassword($_POST['contacts']['password'],$salt);
           if ($contacts->save()) {
               if ($this->checkAuthItem->checkRolesName($_POST["group"])) {
                    Yii::app()->authManager->assign($_POST["group"], $contacts->primaryKey, NULL, $contacts->login);
               } else {
                   return false;
               }
               return true;
           }
            else {
                return false;
            }


    }

    public function actionIndex()
    {

        $message = "";
        if ($_POST['addevent'] == 1) {
            if (!$this->addNewUser()) {
                $message = MYChtml::showError("Не удалость добавить пользователя");
            } else {
                $message = MYChtml::showMessage("Добавлено успешно.");
            }
        }

        $this->render('index',array("roles"=>$this->roles,"message"=>$message));
    }


    public function actionEdit()
    {
		$model = User::model()->findByPk($_GET['editid']);
		
		$authItem = $this->checkAuthItem->getRoleName($_GET['editid']);
		
		if(Yii::app()->request->isPostRequest){
	
			if(User::model()->find("name=:name AND id!=:id",array(":name"=>$_POST['contacts']['name'],":id"=>$_POST['userid'])))
					{$this->redirect($this->createUrl("edit",array("save"=>"err-name",'editid'=>$_POST['userid'])));}
		 	else{
				$model = User::model()->findByPk($_POST['userid']);
                 $pass=$model->password;
                 $model->attributes = $_POST['contacts'];

				//$model->name = $_POST['name'];
                if (strlen($_POST['contacts']['password']) > 0)
				$model->password=$model->createPassword($_POST['contacts']['password'],$model->salt); else
                {


                $model->password = $pass;
                $model->salt=$model->salt;

                }
				if($model->save()){
					
					$this->checkAuthItem->delOneItem($_POST['userid']);
					Yii::app()->authManager->assign($_POST["group"], $model->primaryKey, NULL, $model->login);
					$this->redirect($this->createUrl("edit",array("save"=>"ok",'editid'=>$_POST['userid'])));
					
				}else{
                    print_r($model->getErrors());
				//	$this->redirect($this->createUrl("edit",array("save"=>"error",'editid'=>$_POST['userid'])));
				}
			}
			
		}
		
		
		if ($_GET["save"] == "ok") {
        	$message = MYChtml::showMessage("Редактирование прошло успешно");
       	}
		if ($_GET["save"] == "error") {
       	 	$message = MYChtml::showError("Ошибка редактирования пользователя");
       	}
		if ($_GET["save"] == "err-name") {
       	 	$message = MYChtml::showError("Ошибка: данное имя существует");
       	}
		
        $this->render('edit',array("roles"=>$this->roles,"model"=>$model, "message"=>$message, 'authItem'=>$authItem));
    }


/*
 *метод проверки пользователя на дубляж
 *
 */

    private function checkDouble($arg) {

    $count = User::model()->count("login=:login",array(":login"=>$arg));
    if ($count > 0) return false; else return true;
    }
    /*
     * Проверка на дубляж имени пользователя
     * AJAX
     */
    /*public function actionCheckDoubleUser() {

        if(Yii::app()->request->isAjaxRequest){
            if ($this->checkDouble($_POST['name']))
                $this->renderPartial('/ajaxOK');
            else
                $this->renderPartial('/ajaxERROR');
       }
    }*/

    /*
     *
     * Обработка запроса на удаление множественных записей
     */

    public function actionAjaxDelAll() {

        if(Yii::app()->request->isAjaxRequest){
            if ($this->delAllLocalUsers($_GET['cid']))
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
            if (User::model()->deleteByPk(substr($_GET['cid'],9))){ //Если мы не удаляем организацию, зачем удалять сотрудников??
				$this->checkAuthItem->delOneItem(substr($_GET['cid'],9));
                $this->renderPartial('/ajaxOK');
			}
            else{
				 $this->renderPartial('/ajaxERROR');
			}
               
        }
    }


    /*
     * Обработка запроса на получение данных
     *
     */
	 
	
  	public function actionAjaxGet() {
        if(Yii::app()->request->isAjaxRequest){
			$roles = $this->createArray();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }
	
	private function createArray (){
		$criteria = new CDbCriteria;
		$model=User::model()->findAll($criteria);
		return $model;
	}

	private function delAllLocalUsers ($arr_id){
		$return=true;
		foreach ($arr_id as $id){
				if (User::model()->deleteByPk($id)){
						$this->checkAuthItem->delOneItem($id);
					    $return=true;
					}else {
						$return=false;
					}
		}
		return $return;
	}
	
	private function DoubleName($login,$ed=''){
		$edit = (strlen($ed)>0)?" AND id!=".$ed.'':'';
		if(!User::model()->find("login=:login".$edit,array(":login"=>iconv("UTF-8","CP1251",$login)))){
			return true;
		}	else{
			return false;
		}
	}
	
	public function actionCheckName(){
		 if(Yii::app()->request->isAjaxRequest){
		 	if($this->DoubleName($_POST['contacts']['login'],$_GET['ed'])){
				$this->renderPartial('/ajaxOK');
			}else{
				 $this->renderPartial('/ajaxERROR');
			}
		 }
	}

}
