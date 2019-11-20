<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2019/10/13
 * Time: 16:22
 */

class DeptUserController extends BaseController
{

    public function UserAction(){
        if (isset($_POST['deptId'])){
            $deptId = $_POST['deptId'];
            $data = DeptUserModel::User($deptId);
            echo json_encode($data);
        }

    }
    public function testAction(){
        $data = DeptUserModel::test();

        echo json_encode($data);
    }
}