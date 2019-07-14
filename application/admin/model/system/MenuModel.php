<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26
 * Time: 14:48
 */

class MenuModel extends BaseModel
{
    private static $roleMenuTable ='role_menu';
    private static $menuTable='menu';
    private static $menuSubTable='menu_sub';


    /**
     * 获取所有主菜单
     * @return arr
     */
    public static function getMenu(){
        $sql = "SELECT * FROM menu WHERE is_delete = 0 ORDER BY `index`";
        return self::getAll($sql);
    }
    /**
     * 根据主菜单id获取子菜单
     * @param $id
     * @return arr
     */
    public static function getSubMenu($id){
        $sql = "SELECT * FROM menu_sub WHERE is_delete = 0 and menu_id ='$id' ORDER BY `index`";
        return self::getAll($sql);
    }

    /**
     * 添加主菜单
     * @param $name
     * @return array
     */
    public static function addMenu($name){
        $menuTable=self::$menuTable;
        $res = self::exec($menuTable,['menu_name'=>$name],'insert');
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     * 添加子菜单
     * @param $menuId // 主菜单id
     * @param $subName //子菜单名字
     * @param $component //子菜单组件地址
     * @return array
     */
    public static function addSubMenu($menuId,$subName,$component){
        $menuSubTable=self::$menuSubTable;
        $data =['menu_id'=>$menuId,'sub_name'=>$subName,'component'=>$component];
        $res = self::exec($menuSubTable,$data,'insert');
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }

    /**
     * 修改菜单名字
     * @param $type //1=>一级菜单，2=>二级菜单
     * @param $id
     * @param $name
     * @return array
     */
    public static function editMenu($type,$id,$name){
        $tableName = ['1'=>self::$menuTable,'2'=>self::$menuSubTable][$type];
        $menuName = ['1'=>'menu_name','2'=>'sub_name'][$type];
        $res = self::exec($tableName,[$menuName=>$name],'update','id='.$id);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }
    /**
     * 删除菜单
     * @param $type //1=>一级菜单，2=>二级菜单
     * @param $id
     * @return array
     */
    public static function deleteMenu($type,$id){
        $tableName = ['1'=>self::$menuTable,'2'=>self::$menuSubTable][$type];
        $res = self::exec($tableName,['is_delete'=>1],'update','id='.$id);
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }
    }


    /**
     *菜单排序
     * @param $type//1=>一级菜单，2=>二级菜单
     * @param $dataMenu //菜单数组
     * @return array
     */
    public static function refreshSort($type,$dataMenu){
        $tableName = ['1'=>self::$menuTable,'2'=>self::$menuSubTable][$type];
        foreach ($dataMenu as $k =>$v){
            $res = self::exec($tableName,['index'=>$k],'update','id='.$v['id']);
        }
        if ($res){
            return ['status'=>1];//成功
        }else{
            return ['status'=>0];//失败
        }

    }


}