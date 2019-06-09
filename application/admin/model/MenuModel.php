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
     * 获取用户权限菜单
     * @param $user
     * @return array
     */
    public static function getMenu($user)
    {
        $user=self::login($user);//登录用户信息
        if ($user['status']===0){
            $res= [
                "status" => 0//失败
            ];
        } else{
            //调用数据表
            $roleMenuTable=self::$roleMenuTable;
            $menuTable=self::$menuTable;
            $menuSubTable=self::$menuSubTable;
            $roleId=$user['rid'];//获取用户角色ID
            $sql="SELECT rm.menu_id,m.menu_name,ms.sub_name ,ms.component FROM $roleMenuTable rm
              JOIN $menuTable m ON rm.menu_id = m.id JOIN $menuSubTable ms ON ms.id = rm.sub_id WHERE role_id = '$roleId'";
            $navData=self::getAll($sql);//获取权限菜单
            $children =[];//嵌套路由数组
            foreach ($navData as $k=>$v){
                $children[]=['path'=>$v['component'],
                    'name'=>$v['component'], 'component'=>$v['component']];
            }
            $routerData = [[
                "path"=> "/",
                "name"=> "main",
                "component"=> "Index",
                "children"=>$children
            ]];//路由数据
            $res = ['routerData'=>$routerData,'navData'=>$navData,'user'=>$user,'status'=>1];
        }
        return $res;
    }


}