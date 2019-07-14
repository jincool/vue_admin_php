<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/16
 * Time: 0:53
 */

class RoleController
{

    /**
     * 获取所有角色
     */
    public function getRoleAction(){
        $data = RoleModel::getRole();
        echo json_encode($data);
    }
    /**
     * 获取所有菜单
     */
    public function getMenuAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $data = RoleModel::getMenu($id);
            echo json_encode($data);
        }

    }

    /**
     * 添加角色
     * @param $name
     * @return array
     */
    public function addRoleAction(){
        if (!empty($_POST['name'])){
            $name = $_POST['name'];
            $data = RoleModel::addRole($name);
            echo json_encode($data);
        }
    }

    /**
     * 添加角色菜单
     * @param $data
     * @return array
     *created by Jincool
     */
    public function addRoleMenuAction(){
        if (!empty($_POST['data'])){
            $data = $_POST['data'];
            $res = RoleModel::addRoleMenu($data);
            echo json_encode($res);
        }
    }

    /**
     * 修改角色名字
     * @param $id
     * @param $name
     * @return array
     */
    public function editRoleAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $name = $_POST['name'];

            $data = RoleModel::editRole($id,$name);
            echo json_encode($data);
        }
    }

    /**
     * 删除角色
     * @param $type //1=>系统角色，2=>权限角色
     * @param $id
     * @return array
     */

    public function deleteRoleAction(){
        if (!empty($_POST['id'])){
            $id = $_POST['id'];
            $type = $_POST['type'];
            $data = RoleModel::deleteRole($type,$id);
            echo json_encode($data);
        }
    }

}