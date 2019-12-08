<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/3/11
 * Time: 16:01
 */

class BaseModel extends Model
{
    private static $userTable = "user";
    private static $userRoleTable = "user_role";
    private static $roleTable = "role";
    private static $departmentTable = "department";

    /**
     * @param $user
     * @return array
     */
    protected static function login($user)
    {
            $userTable = self::$userTable;//用户表
            $userRoleTable = self::$userRoleTable;//用户角色表
            $roleTable = self::$roleTable;//角色表
            $departmentTable = self::$departmentTable;//部门表
            $username = $user['username'];//用户名
            $password = $user['password'];//用户密码
            $sql = "SELECT u.*, ur.role_id,r.role_level FROM $userTable u JOIN $userRoleTable ur ON ur.user_id = u.id
                    JOIN $roleTable r ON r.id = ur.role_id WHERE `username` = '$username' AND `password` = '$password'
                    AND u.is_delete = 0";
            $res = self::getRow($sql);
        if (!empty($res)) {
            $did = $res['department_id'];//所属部门id
            $department = self::department($did);
            return [
                "name" => $res['name'],//用户姓名
                "id" => $res['id'],//用户id
                "rid"=>$res['role_id'],//角色ID
                "level"=>$res['role_level'],//角色等级
                "did"=>$did,//所属部门id
                'department'=>$department,
                "status" => 1//成功
            ];
        } else {
            return [
                "status" => 0//失败
            ];
        }
    }

    /**
     * 获取分页信息
     * @return array
     *created by Jincool
     */
    protected static function listQuery(){
        if (!empty($_POST['listQuery'])){
            $listQuery= $_POST['listQuery'];
            $page = (int)$listQuery['page'];//获取选择页
            $pageSize = (int)$listQuery['limit'];//获取默认分页条数
            $pageStart = ($page - 1) * $pageSize;//开始页
            return ['pageSize'=>$pageSize,'pageStart'=>$pageStart];
        }
    }

    /**
     * 获取所属部门
     * @param $deptId
     * @return array
     *created by Jincool
     */
    protected static function department($deptId){
        $departmentTable = self::$departmentTable;//部门表
        $sqlDepartment = "SELECT T2.id, T2.name FROM ( SELECT @r AS _id, (SELECT @r := pid FROM $departmentTable 
                    WHERE id = _id) AS pid,  @l := @l + 1 AS lvl FROM (SELECT @r := $deptId, @l := 0) vars,
                     $departmentTable h WHERE @r <> 0) T1 JOIN $departmentTable T2 ON T1._id = T2.id ORDER BY T1.lvl DESC";
        $department = self::getAll($sqlDepartment);
        return $department;
    }




}