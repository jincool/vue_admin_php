<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/3/12
 * Time: 9:37
 */

class IndexController extends BaseController
{


    public function indexAction(){

        echo '感谢使用酷框架！';
    }

    /**
     * 用户登录获取菜单
     */
   public function loginAction(){
       if (!empty($_POST['username'])){
           $user=['username'=>$_POST['username'],
                  'password'=>$_POST['password']
           ];
           $data= IndexModel::getUserMenu($user);
           echo json_encode($data);
       }

   }


    /**
     * 根据角色获取菜单
     *created by Jincool
     */
   public function menuAction(){
       if (!empty($_POST['rid'])){
           $rid = $_POST['rid'];
           $data = IndexModel::getMenu($rid);
       }
       echo json_encode($data);
   }


}