<?php
/**
 * Created by PhpStorm.
 * 自定义框架基础类
 * 1 读取配置
 * 2 自动加载
 * 3 请求分发
 * User: Jincool
 * Date: 2018/10/8
 * Time: 14:47
 */
class Base{
//创建方法，完成cool框架所有功能
    public function run(){
        //加载配置
        $this-> loadConfig();
        //获取请求参数
        $this->getRequestParams();
        //注销自动加载
        $this-> registerAutoLoad();
        //请求分发
        $this->dispatch();
    }
//加载配置方法
private  function  loadConfig(){
        //使用全局变量保存用户配置
$GLOBALS['config']=require './config/config.php';

}
//创建用户自定义类
public function userAutoLoad($className){

        //定义自定义列表
    $baseClass=[
        'Model'=>'./cool/Model.php',
        'BaseController' =>'./application/common/controller/BaseController.php',
        'BaseModel'=>'./application/common/model/BaseModel.php',
//        'Model'=>'./cool/Model.php',
    ];


    //判断类
    if(isset($baseClass[$className])){
        require $baseClass[$className];//加载模型类
    }elseif (substr($className,-5)=='Model'){
        require './application/admin/model/'.FILE.'/'.$className.'.php';
    }elseif (substr($className,-10)=='Controller'){
        require './application/admin/controller/'.FILE.'/'.$className.'.php';
    }
}
//注册自动加载方法
private function registerAutoLoad(){
        spl_autoload_register([$this,'userAutoLoad']);
}
//获取请求参数
private function getRequestParams(){
  //当前模块
    $defPlate=$GLOBALS['config']['app']['default_platform'];
    $p=isset($_GET['p']) ? $_GET['p'] : $defPlate;
    define('PLATFORM',$p);
    //当前文件夹
    $defFile=$GLOBALS['config'][PLATFORM]['default_file'];
    $f=isset($_GET['f']) ? $_GET['f'] : $defFile;
    define('FILE',$f);
    //当前控制器
    $defController=$GLOBALS['config'][PLATFORM]['default_controller'];
    $c=isset($_GET['c']) ? $_GET['c'] : $defController;
    define('CONTROLLER',$c);
    //当前方法
    $defaction=$GLOBALS['config'][PLATFORM]['default_action'];
    $a=isset($_GET['a']) ? $_GET['a'] : $defaction;
    define('ACTION',$a);
}
private function dispatch(){
   $controllerName=CONTROLLER.'Controller';
   $controller=new $controllerName;
   //调用方法
    $actionName=ACTION.'Action';
    $controller->$actionName();
}







}