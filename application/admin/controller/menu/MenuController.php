<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/16
 * Time: 0:53
 */

class MenuController
{

    /**
     * 获取所有菜单
     */
    public function getMenuAction(){
        $data = MenuModel::getMenu();
        echo json_encode($data);
    }
    /**
     * 获取所有菜单
     */
    public function getSubMenuAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $data = MenuModel::getSubMenu($id);
            echo json_encode($data);
        }

    }

    /**
     * 添加主菜单
     * @param $name
     * @return array
     */
    public function addMenuAction(){
        if (!empty($_POST['name'])){
            $name = $_POST['name'];
            $data = MenuModel::addMenu($name);
            echo json_encode($data);
        }
    }

    /**
     * 添加子菜单
     * @param $menuId // 主菜单id
     * @param $subName //子菜单名字
     * @param $component //子菜单组件地址
     * @return array
     */
    public function addSubMenuAction(){
        if (!empty($_POST['menuId'])){
            $menuId = $_POST['menuId'];
            $subName = $_POST['subName'];
            $component = $_POST['component'];
            $data = MenuModel::addSubMenu($menuId,$subName,$component);
            echo json_encode($data);
        }
    }

    /**
     * 修改菜单名字
     * @param $type //1=>一级菜单，2=>二级菜单
     * @param $id
     * @param $name
     * @return array
     */
    public function editMenuAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $type = $_POST['type'];
            $name = $_POST['name'];

            $data = MenuModel::editMenu($type,$id,$name);
            echo json_encode($data);
        }
    }

    /**
     * 删除菜单名字
     * @param $type //1=>一级菜单，2=>二级菜单
     * @param $id
     * @return array
     */

    public function deleteMenuAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $type = $_POST['type'];
            $data = MenuModel::deleteMenu($type,$id);
            echo json_encode($data);
        }
    }

    /**
     *菜单排序
     * @param $type//1=>一级菜单，2=>二级菜单
     * @param $dataMenu //菜单数组
     * @return array
     */

    public function refreshSortAction(){
        if (!empty($_POST['dataMenu'])){
            $dataMenu = $_POST['dataMenu'];
            $type = $_POST['type'];
            $data = MenuModel::refreshSort($type,$dataMenu);
            echo json_encode($data);
        }
    }
}