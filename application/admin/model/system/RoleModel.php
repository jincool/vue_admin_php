<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26
 * Time: 14:48
 */

class RoleModel extends BaseModel
{
    private static $roleMenuTable ='role_menu';
    private static $menuTable='menu';
    private static $roleTable='role';
    private static $menuSubTable='menu_sub';


    /**
     * 获取角色
     * @param $level //角色等级
     * @return arr
     *created by Jincool
     */
    public static function getRole($level){
        $roleTable = self::$roleTable;
        $sql = "SELECT * FROM $roleTable WHERE is_delete = 0 AND {$level} ORDER BY `role_level`";
        return self::getAll($sql);
    }
    /**
     * 根据角色id获取菜单
     * @param $id
     * @return arr
     */
    public static function getMenu($id){
        $roleMenuTable = self::$roleMenuTable;
        $menuTable = self::$menuTable;
        $menuSubTable = self::$menuSubTable;
        $sql = "SELECT rm.*,m.menu_name,ms.sub_name FROM $roleMenuTable rm LEFT JOIN $menuTable m ON m.id = rm.menu_id
                LEFT JOIN $menuSubTable ms ON ms.id = rm.sub_id  WHERE rm.is_delete = 0 and rm.role_id ='$id'";
        return self::getAll($sql);
    }

    /**
     * 添加角色
     * @param $name
     * @return array
     */
    public static function addRole($name){
        $roleTable=self::$roleTable;
        $res = self::exec($roleTable,['role_name'=>$name],'insert');
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     * 添加角色菜单
     * @param $data
     * @return array
     *created by Jincool
     */
    public static function addRoleMenu($data){
        $roleMenuTable=self::$roleMenuTable;
        $res = self::exec($roleMenuTable,$data,'insert');
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }

    }


    /**
     * 修改角色名字
     * @param $id
     * @param $name
     * @return array
     */
    public static function editRole($id,$name){
        $roleTable=self::$roleTable;
        $res = self::exec($roleTable,['role_name'=>$name],'update','id='.$id);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }
    /**
     * 删除角色
     * @param $type //1=>系统角色，2=>权限角色菜单
     * @param $id
     * @return array
     */
    public static function deleteRole($type,$id){
        $tableName = ['1'=>self::$roleTable,'2'=>self::$roleMenuTable][$type];
        $res = self::exec($tableName,['is_delete'=>1],'update','id='.$id);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     *权限角色等级排序
     * @param $dataRole //角色数组
     * @return array
     */
    public static function refreshSort($dataRole){
        $tableName = self::$roleTable;
        foreach ($dataRole as $k =>$v){
            $res = self::exec($tableName,['role_level'=>$k],'update','id='.$v['id']);
        }
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }

    }

}