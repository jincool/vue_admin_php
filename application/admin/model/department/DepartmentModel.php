<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2019/8/8
 * Time: 9:50
 */

class DepartmentModel extends BaseModel
{

    private static $departmentTable = 'department';

    /**
     * 递归树形图
     * @param $data
     * @param $pId
     * @return array|string
     *created by Jincool
     */
    private static function getTree($data,$pId){
        $tree = '';
        foreach($data as $k => $v)
        {
            if($v['pid'] == $pId)
            {
                $v['pid'] = self::getTree($data,$v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }

    /**
     * 获取递归出的所以部门
     * @return array|string
     *created by Jincool
     */
    public static function getAllDepartment(){
        $departmentTable = self::$departmentTable;
        $sql = "select id,pid , name from  $departmentTable where is_delete = 0";
        $data =  self::getAll($sql);
        return self::getTree($data,0);
    }

    /**
     * 懒加载出部门
     * @param $pid
     * @return arr
     *created by Jincool
     */
    public static function getDepartment($pid){
        $departmentTable = self::$departmentTable;
        $sql = "select id,pid , name from  $departmentTable where is_delete = 0 and pid='$pid'";
        return self::getAll($sql);
    }

    /**
     * 新增部门
     * @param $pid
     * @param $name
     * @return array
     *created by Jincool
     */
    public static function addDepartment($pid,$name){
        $departmentTable = self::$departmentTable;
        $res = self::exec($departmentTable,['pid'=>$pid,'name'=>$name],'insert');
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     * 修改部门名称
     * @param $pid
     * @param $name
     * @return array
     *created by Jincool
     */
    public static function editDepartment($pid,$name){
        $departmentTable = self::$departmentTable;
        $res = self::exec($departmentTable,['name'=>$name],'update',"id=".$pid);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     * 删除部门
     * @param $pid
     * @return array
     *created by Jincool
     */
    public static function deleteDepartment($pid){
        $departmentTable = self::$departmentTable;
        $res = self::exec($departmentTable,['is_delete'=>1],'update',"id=".$pid);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

}