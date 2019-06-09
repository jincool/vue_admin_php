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

    /**
     * @param $user
     * @return array
     */
    protected static function login($user)
    {
            $userTable = self::$userTable;//用户表
            $userRoleTable = self::$userRoleTable;//用户角色表
            $roleTable = self::$roleTable;//角色表
            $username = $user['username'];//用户名
            $password = $user['password'];//用户密码
            $sql = "SELECT u.*, ur.role_id,r.role_name FROM $userTable u JOIN $userRoleTable ur ON ur.user_id = u.id JOIN $roleTable r ON r.id = ur.role_id
                    WHERE `username` = '$username' AND `password` = '$password' AND is_deleted = 0";
            $res = self::getRow($sql);
        if (!empty($res)) {
            return [
                "name" => $res['name'],//用户姓名
                "id" => $res['id'],//用户id
                "rid"=>$res['role_id'],//角色ID
                "power"=>$res['role_name'],//角色名
                "status" => 1//成功
            ];
        } else {
            return [
                "status" => 0//失败
            ];
        }
    }

}