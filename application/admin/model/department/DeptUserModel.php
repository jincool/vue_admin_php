<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2019/10/13
 * Time: 15:53
 */

/**
 * 用户管理
 * Class DeptUserModel
 */
class DeptUserModel extends BaseModel
{

    /**
     * 获取用户信息
     * @param $deptId
     * @return arr
     *created by Jincool
     */
    public static function User($deptId)
    {
        $listQuery = self::listQuery();//获取分页信息
        if (!empty($listQuery)){
             $pageSize = $listQuery['pageSize'];
             $pageStart = $listQuery['pageStart'];
            $sql = "SELECT
	        `user`.id AS uid,username,`user` . name,ud.department_id,dept.`name` AS dept_name,role.id AS rid,role.role_name
             FROM `user` JOIN user_dept ud ON USER .id = ud.uid LEFT JOIN department dept ON `user`.department_id = dept.id
            JOIN user_role ur ON `ur`.user_id = `user`.id JOIN role role ON role.id = ur.role_id 
            WHERE ud.department_id = '$deptId' ORDER BY user.id DESC LIMIT $pageStart,$pageSize";
            $sqlCount = " select count(id) from user_dept where department_id = '$deptId' ";
            $dataList = self::getAll($sql);
            $total = self::getOne($sqlCount);
            return ['total'=>(int)$total,'dataList'=>$dataList];
        }

    }


}