<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2019/10/13
 * Time: 16:22
 */

class DeptUserController extends BaseController
{

    /**
     *获取用户列表
     *created by Jincool
     */
    public function UserAction(){
        if (isset($_POST['deptId'])){
            $deptId = $_POST['deptId'];
            $data = DeptUserModel::User($deptId);
            echo json_encode($data);
        }

    }
    /**
     * 新增用户信息
     * @param $userInfo
     * @param $roleId
     * @return array
     *created by Jincool
     */
    public static function addUserAction(){
        if (!empty($_POST['userInfo'])){
            $userInfo = $_POST['userInfo'];
            $roleId = $_POST['roleId'];
            $data = DeptUserModel::addUser($userInfo,$roleId);
            echo json_encode($data);
        }
    }
    /**
     * 修改用户权限
     * @param $userInfo
     * @param $roleId
     * @param $userId
     * @return array
     *created by Jincool
     */
    public static function editUserAction(){
        if (!empty($_POST['userInfo'])){
            $userInfo = $_POST['userInfo'];
            $roleId = $_POST['roleId'];
            $userId = $_POST['userId'];
            $data = DeptUserModel::editUser($userInfo,$roleId,$userId);
            echo json_encode($data);
        }
    }
    /**
     * 删除用户
     *created by Jincool
     */
    public static function deleteUserAction(){
        if (!empty($_POST['userId'])){
            $userId = $_POST['userId'];
            $data = DeptUserModel::deleteUser($userId);
            echo json_encode($data);
        }
    }


    /**
     * 检查是已存在账号
     *created by Jincool
     */
    public static function hasUsernameAction()
    {
       if (!empty($_POST['username'])){
           $username = $_POST['username'];
           $data = DeptUserModel::hasUsername($username);
           echo json_encode($data);
       }
    }

    public function testAction(){
        $data = DeptUserModel::test();

        echo json_encode($data);
    }
}