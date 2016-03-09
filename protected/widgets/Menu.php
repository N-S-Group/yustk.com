<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Администратор
 * Date: 13.12.12
 * Time: 18:53
 * To change this template use File | Settings | File Templates.
 */
class Menu extends CWidget
{

    public function run() {

        $authExtend = new extendAythManager();
        $arrMenu = Array();
        $roleName = Yii::app()->authManager->getAuthAssignments(Yii::app()->user->id);
        foreach ($roleName as $role) {

            $operations = $authExtend->getArrayOperationForRole($role->getItemName());
            foreach ($operations as $val) {
                          array_push($arrMenu, $val);
                }
        }


        $modelMenu = new CPMenu();
        $result = $modelMenu->findAll( array('order'=>'level asc'));

        $menu = Array();

        $routeBase = Yii::app()->request->baseUrl."/cpanel/";

        $currentController = Yii::app()->controller->id;
        $activeMainMenu = "";
        $activeSubMenu = "";

        foreach ($result as $val) {

            if ($val->level == 1) $menu[$val->id] = array("name"=>$val->name, "className"=>$val->className, "id"=>"mainMenu".$val->id, "items"=>Array());

            if (in_array($val->route, $arrMenu)) {

                if ($currentController == $val->route)  $activeMainMenu ="mainMenu".$val->pid;
                if ($val->level == 2) array_push($menu[$val->pid]["items"], array("name"=>$val->name, "route"=>$routeBase.$val->route, "id"=>"mainMenu".$val->id));

            }

        }
       $this->render('menu', array("data"=>$menu,"activeMenu"=>$activeMainMenu));

    }

}
