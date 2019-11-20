<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2019/8/8
 * Time: 9:49
 */

class DepartmentController
{

    /**
     * 懒加载获取部门信息
     *created by Jincool
     */
    public function getDepartmentAction(){
        $pid = $_POST['pid'];
        $data =  DepartmentModel::getDepartment($pid);
        echo json_encode($data);
    }

    /**
     * 新增部门
     *created by Jincool
     */
    public function addDepartmentAction(){
        if (!empty($_POST['name'])){
            $pid = $_POST['pid'];
            $name = $_POST['name'];
            $data =  DepartmentModel::addDepartment($pid,$name);
            echo json_encode($data);
        }
    }
    /**
     * 修改部门名称
     *created by Jincool
     */
    public function editDepartmentAction(){
        if (!empty($_POST['pid'])){
            $pid = $_POST['pid'];
            $name = $_POST['name'];
            $data =  DepartmentModel::editDepartment($pid,$name);
            echo json_encode($data);
        }
    }
    /**
     * 删除
     *created by Jincool
     */
    public function deleteDepartmentAction(){
        if (!empty($_POST['pid'])){
            $pid = $_POST['pid'];
            $data =  DepartmentModel::deleteDepartment($pid);
            echo json_encode($data);
        }
    }
}