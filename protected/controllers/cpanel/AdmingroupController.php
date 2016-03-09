<?php

class AdminGroupController extends ControlerCPanel
{

    public $cid=0;

    public $nameControlerForView = "���������� �������� ������� ������������� ����� ������";
    public $descriptionActionControlerForView = "";

    /*
     * ����� ������ � AuthManager
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
        $this->checkAuthItem->checkAllOperationAsMenu();  // ��������� ������� ����������  CAuthItem createOperation � ����������� �� ���� ��� ���� � ������� ����
        $filterChain->run();
        return true;
    }


    /*
     * ����� ���������� ������ ������������� �� ������ ���������� �� ������������ ������
     */

    private function updateGroup() {


        if (!FilterMy::string($_POST['name'])) return false;  // ��������� ��� ����������� �������? ������ ���������� �����
        if ($this->checkAuthItem->checkRolesName($_POST['name'])) $newName=null; else $newName = $_POST['name'];  // ��������� ���� �� ���� � ����� �� ������, ���� �� �������� null , ��� � ���� ������ �� ��������
        $role = $this->checkAuthItem->getRoleDataByName($_GET['editid']);  /// ����� ������� CAuthItem (����) �� �����
        $role->name = $_POST['name']; // ��������� ������ �������
        $role->description = $_POST['description']; // ��������� ������ �������
        Yii::app()->authManager->saveAuthItem($role, $newName); // ���������
        $this->checkAuthItem->delAllChild($role); // ������� ��� ����������� ��������
        if (is_array($_POST['id'])) // �������� ��� ������ ������ ����  ����� ��������
        foreach ($_POST['id'] as $val) {
            $obj = CPMenu::model()->findAllByPk($val); // ���� ��� ���� � ������� ����, ��� �� ����� route � ����������� ������� ����
            $route = $obj[0]->route; // ����� route ����
            if ($this->checkAuthItem->checkOperationName($route)) { // ��������� ���� �� � RBAC ����� �������� ���� �� �� ������
                $role->addChild($route); // ��������� �������� � ����
            }
        }
        return true;
    }

/*
 * ����� ���������� ����� ������ ������������� �� ������ ���������� �� ������������ ������
 *
 */
    private function addNewGroup() {

        if (!FilterMy::string($_POST['name'])) return false; // ��������� ��� ����������� �������? ������ ���������� �����
        if ($this->checkAuthItem->checkRolesName($_POST['name'])) return false; // ��������� ���� �� ���� � ����� �� ������,
        $role = Yii::app()->authManager->createRole($_POST['name'], $_POST['description']); // ������� ����
        if (is_array($_POST['id']))  // �������� ��� ������ ������ ����  ����� ��������
            foreach ($_POST['id'] as $val) {
                $obj = CPMenu::model()->findAllByPk($val); // ���� ��� ���� � ������� ����, ��� �� ����� route � ����������� ������� ����
                $route = $obj[0]->route; // ����� route ����
                if ($this->checkAuthItem->checkOperationName($route)) { // ��������� ���� �� � RBAC ����� �������� ���� �� �� ������
                    $role->addChild($route);
                }
            }
        return true;
    }


    /*
    * ������� ��������� ������� ������� ����� ������� � ����� ��� ����������� ��������� � ���������������� ����������
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
                $message = MYChtml::showError("�� �������� �������� ���� � ������ �������, �������� ���� � ����� ������ ��� ����������");
            } else {
                $message = MYChtml::showMessage("��������� �������.");
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
                $message = MYChtml::showError("�� ������� ��������� ������, �������� ���� � ����� ������ ��� ����������");
                $editid = $_GET['editid'];
            } else {
                $message = MYChtml::showMessage("�������� �������.");
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
            $this->render('index', Array("message"=>MYChtml::showError("������ ��� ������ � ������������")));
    }

    /*
     *
     * ��������� ������� �� �������� ������������� �������
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
    * ��������� ������� �� �������� ����� ������
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
     * ��������� ������� �� ��������� ������
     *
     */
    public function actionAjaxGetRoles() {

        if(Yii::app()->request->isAjaxRequest){
            $roles = $this->checkAuthItem->getArrayRoles();
            $this->renderPartial('ajaxdata',array("roles"=>$roles));
        }
    }






}