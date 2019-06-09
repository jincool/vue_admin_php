<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/3/12
 * Time: 9:37
 */

class IndexController extends BaseController
{

    /**
     * 用户登录获取菜单
     */
   public function menuAction(){
       if (!empty($_POST['username'])){
           $user=['username'=>$_POST['username'],
                  'password'=>$_POST['password']
           ];
           $data= MenuModel::getMenu($user);
           echo json_encode($data);
       }

   }


}