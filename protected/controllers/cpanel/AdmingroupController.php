<?php

class AdminGroupController extends ControlerCPanel
{

    public $cid=0;

    public $nameControlerForView = "Управление группами доступа пользователей админ панели";
    public $descriptionActionControlerForView = "";

    /*
     * класс Работы с AuthManager
     */

    private $checkAuthItem;


    public function filters()
    {
        return array(
            'checkAccess', 'preLoadRoles'
                    );
    }


    public function filterPreLoadRoles($filterChain)
    {

        $this->checkAuthItem = new extendAythManager();
        $this->checkAuthItem->checkAllOperationAsMenu();  // Заполняем таблицы возможными  CAuthItem createOperation в зависимости от того что есть в таблице меню
        $filterChain->run();
        return true;
    }


    /*
     * Метод обновления группы пользователей на основе полученных от пользователя данных
     */

    private function updateGroup() {


        if (!FilterMy::string($_POST['name'])) return false;  // Проверяем имя допустимого формата? только английские буквы
        if ($this->checkAuthItem->checkRolesName($_POST['name'])) $newName=null; else $newName = $_POST['name'];  // Проверяем есть ли роль с таким же именем, есди то передаем null , имя у роли значит не меняется
        $role = $this->checkAuthItem->getRoleDataByName($_GET['editid']);  /// берем объекто CAuthItem (роль) по имени
        $role->name = $_POST['name']; // заполняем новыми данными
        $role->description = $_POST['description']; // заполняем новыми данными
        Yii::app()->authManager->saveAuthItem($role, $newName); // сохраняем
        $this->checkAuthItem->delAllChild($role); // Удаляем все привязанные операции
        if (is_array($_POST['id'])) // проверка что должно прийти хоть  одноа операция
        foreach ($_POST['id'] as $val) {
            $obj = CPMenu::model()->findAllByPk($val); // ищем что есть в таблице меню, что бы взять route к функционалу данного меню
            $route = $obj[0]->route; // берем route менЮ
            if ($this->checkAuthItem->checkOperationName($route)) { // проверяем есть ли в RBAC такая операция если да то вперед
                $role->addChild($route); // Добавляем операцию к роли
            }
        }
        return true;
    }

/*
 * Метод добавление новой группы пользователей на основе полученных от пользователя данных
 *
 */
    private function addNewGroup() {

        if (!FilterMy::string($_POST['name'])) return false; // Проверяем имя допустимого формата? только английские буквы
        if ($this->checkAuthItem->checkRolesName($_POST['name'])) return false; // Проверяем есть ли роль с таким же именем,
        $role = Yii::app()->authManager->createRole($_POST['name'], $_POST['description']); // создаем роль
        if (is_array($_POST['id']))  // проверка что должно прийти хоть  одноа операция
            foreach ($_POST['id'] as $val) {
                $obj = CPMenu::model()->findAllByPk($val); // ищем что есть в таблице меню, что бы взять route к функционалу данного меню
                $route = $obj[0]->route; // берем route менЮ
                if ($this->checkAuthItem->checkOperationName($route)) { // проверяем есть ли в RBAC такая операция если да то вперед
                    $role->addChild($route);
                }
            }
        return true;
    }


    /*
    * Создаем двумерный массивы который будет передан в форму для отображения чекбоксов с соответствующими операциями
    *
    */
    private function createArrayRoleForForm() {

        $menu = Array();
        $model=CPMenu::model()->findAll();
        foreach ($model as $val) {
            if ($val->level == 2) {
                $menu[$val->pid][$val->id] = $val;
            }
            else {

                $menu[$val->id][0] = $val;
            }
        }
        return $menu;
    }





    public function actionIndex()
    {
        $message = "";
        if ($_POST['addevent'] == 1) {
            if (!$this->addNewGroup()) {
                $message = MYChtml::showError("Не удалость добавить роль с такими данными, возможно роль с таким именем уже существует");
            } else {
                $message = MYChtml::showMessage("Добавлено успешно.");
            }
        }
        $menu = $this->createArrayRoleForForm();
        $this->render('index',array("menu"=>$menu, "message"=>$message));
    }


    public function actionEdit()
	{
        $message = "";
        if ($_POST['addevent'] == 1) {
            if (!$this->updateGroup()) {
                $message = MYChtml::showError("Не удалось сохранить данные, возможно роль с таким именем уже существует");
                $editid = $_GET['editid'];
            } else {
                $message = MYChtml::showMessage("Изменено успешно.");
                $editid = $_POST['name'];
            }
        } else {
            $editid = $_GET['editid'];
        }
        $menu = $this->createArrayRoleForForm();
        $role = $this->checkAuthItem->getArrayOperationForRole($editid);
        $roleData = $this->checkAuthItem->getRoleDataByName($editid);
        $this->render('edit', array("menu"=>$menu, "role"=>$role, "roleData"=>$roleData, "message"=>$message));
	}



    public  function actionError() {

        if($error=Yii::app()->errorHandler->error)
            $this->render('index', Array("message"=>MYChtml::showError("Ошибка при работе с АдминПанелью")));
    }

    /*
     *
     * Обработка запроса на удаление множественных записей
     */

    public function actionAjaxDelAll() {

        if(Yii::app()->request->isAjaxRequest){
            if ($this->checkAuthItem->delAllRole($_GET['cid']))
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
        if ($this->checkAuthItem->delOneRole(substr($_GET['cid'],9)))
        $this->renderPartial('/ajaxOK');
        else
        $this->renderPartial('/ajaxERROR');
        }
    }


    /*
     * Обработка запроса на получение данных
     *
     */
    public function actionAjaxGetRoles() {

        if(Yii::app()->request->isAjaxRequest){
            $roles = $this->checkAuthItem->getArrayRoles();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }






}