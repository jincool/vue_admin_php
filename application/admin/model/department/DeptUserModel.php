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
    private static $userTable = 'user';
    private static $userDept = 'user_dept';
    private static $userRole = 'user_role';

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
             $pageSize = $listQuery['pageSize'];//获取每页显示的条数
             $pageStart = $listQuery['pageStart'];//获取起始页
            $sql = "SELECT
	        `user`.id AS uid,username,password,`user` . name,ud.department_id,dept.`name` AS dept_name,role.role_level as level,
	        role.id AS rid,role.role_name FROM `user` JOIN user_dept ud ON USER .id = ud.uid LEFT JOIN department dept
	         ON `user`.department_id = dept.id JOIN user_role ur ON `ur`.user_id = `user`.id JOIN role role 
	         ON role.id = ur.role_id WHERE ud.department_id = '$deptId' AND ud.is_delete =0 ORDER BY user.id DESC LIMIT $pageStart,$pageSize";
            $sqlCount = " select count(id) from user_dept where department_id = '$deptId' AND `is_delete`=0";
            $dataList = self::getAll($sql);//数据列表
            $total = self::getOne($sqlCount);//数据总数
            return ['total'=>(int)$total,'dataList'=>$dataList];
        }

    }

    /**
     * 新增用户信息
     * @param $userInfo
     * @param $roleId
     * @return array
     *created by Jincool
     */
    public static function addUser($userInfo,$roleId){
        $userTable = self::$userTable;
        $userDept = self::$userDept;
        $userRole = self::$userRole;
        self::autocommit();//开启mysql事物
        $addUser=self::exec($userTable,$userInfo,'insert');//插入用户信息
        $newUserId = self::getLastId();//获取新用户id
        $addUserRole=self::exec($userRole,['user_id'=>$newUserId,'role_id'=>$roleId],'insert');//插入用户角色
        $deptId =$userInfo['department_id'];//获取用户部门
        $deptArr = [];//部门id 信息
//        判断是否添加顶级部门0
        if ($deptId==='0'){
            $deptArr[] =  ['uid'=>$newUserId,'dept_level'=>0,'department_id'=>0];
        }else{
            $dept = self::department($deptId);//获取上级部门信息
            foreach ($dept as $k =>$v){
                $deptArr[] =  ['uid'=>$newUserId,'dept_level'=>$k+1,'department_id'=>$v['id']];
            }
        }
        $addUserDept = self::insert($deptArr,$userDept);//插入用户所属部门
        if ($addUserDept&&$addUserRole&&$addUser){
            self::commit();//提交事物处理
            self::close();
            return ['status'=>1];//成功

        }
        else{
            self::rollback();//事物回滚
            self::close();
            return ['status'=>0];//失败
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
    public static function editUser($userInfo,$roleId,$userId){
        $userTable = self::$userTable;
        $userRole = self::$userRole;
        self::autocommit();//开启mysql事物
        $editUser=self::exec($userTable,$userInfo,'update','id='.$userId);//修改用户信息
        $editUserRole=self::exec($userRole,['role_id'=>$roleId],'update','user_id='.$userId);//修改用户权限信息
        if ($editUser&&$editUserRole){
            self::commit();//提交事物处理
            self::close();
            return ['status'=>1];//成功

        }
        else{
            self::rollback();//事物回滚
            self::close();
            return ['status'=>0];//失败
        }
    }

    /**
     * 删除用户
     * @param $userId
     * @return array
     *created by Jincool
     */
    public static function deleteUser($userId){
        $userTable = self::$userTable;
        $userDept = self::$userDept;
        $userRole = self::$userRole;
        $delete = ['is_delete'=>1];
        self::autocommit();//开启mysql事物
        $editUser=self::exec($userTable,$delete,'update','id='.$userId);//修改用户信息
        $editUserRole=self::exec($userRole,$delete,'update','user_id='.$userId);//修改用户权限信息
        $editUserDept=self::exec($userDept,$delete,'update','uid='.$userId);//修改用户权限信息
        if ($editUser&&$editUserRole&&$editUserDept){
            self::commit();//提交事物处理
            self::close();
            return ['status'=>1];//成功

        }
        else{
            self::rollback();//事物回滚
            self::close();
            return ['status'=>0];//失败
        }
    }


    /**
     * 检查是否已存在账号
     * @param $username
     * @return array
     *created by Jincool
     */
    public static function hasUsername($username){
        $userTable = self::$userTable;
        $sql = "select username from $userTable where `username`= '$username' and `is_delete` = 0 ";
        $name = self::getOne($sql);
        if (empty($name)){
            $status = 1;//不存在，可以注册
        }else{
            $status = 0;//账号已存在！
        }
        return ['status'=>$status];
    }


}