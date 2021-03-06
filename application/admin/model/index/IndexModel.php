<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/26
 * Time: 14:48
 */

class IndexModel extends BaseModel
{
    private static $roleMenuTable ='role_menu';
    private static $menuTable='menu';
    private static $menuSubTable='menu_sub';

    /**
     * 登录获取用户权限菜单
     * @param $user
     * @return array
     */
    public static function getUserMenu($user)
    {
        $user=self::login($user);//登录用户信息
        if ($user['status']===0){
            $res= [
                "status" => 0//失败
            ];
        } else{
            $roleId=$user['rid'];//获取用户角色ID
            $routerData = self::getMenu($roleId);
            $router = $routerData['routerData'];
            $navData = $routerData['navData'];
            $res = ['routerData'=>$router,'navData'=>$navData,'user'=>$user,'status'=>1];
        }
        return $res;
    }

    /**
     * 获取用户权限菜单
     * @param $rid
     * @return array
     *created by Jincool
     */
    public static function getMenu($rid){
        $roleMenuTable=self::$roleMenuTable;
        $menuTable=self::$menuTable;
        $menuSubTable=self::$menuSubTable;
        $sql="SELECT rm.menu_id,m.menu_name,ms.sub_name ,ms.component FROM $roleMenuTable rm
              JOIN $menuTable m ON rm.menu_id = m.id AND m.is_delete = 0 
              JOIN $menuSubTable ms ON ms.id = rm.sub_id AND ms.is_delete = 0
              WHERE rm.is_delete = 0 AND role_id = '$rid' ORDER BY m.`index` ,ms.`index`";
        $navData=self::getAll($sql);//获取权限菜单
        $children =[];//嵌套路由数组
        foreach ($navData as $k=>$v){
            $component = substr($v['component'],stripos($v['component'],"/")+1);
            $children[]=['path'=>$component,'url'=>$v['component'],
                'name'=>$component, 'component'=>$component];
        }
        $children[]=['path'=>'External','url'=>'External',
            'name'=>'External', 'component'=>'External'];//添加外部链接组件
        $routerData = [[
            "path"=> "/",
            "name"=> "Index",
            'url'=>'Index',
            "component"=> "Index",
            "children"=>$children
        ]];//路由数据
        return ['routerData'=>$routerData,'navData'=>$navData];
    }

}