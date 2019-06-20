<?php
/**
 * Created by PhpStorm.
 * User: Jincool
 * Date: 2018/10/8
 * Time: 14:43
 */
return [
    //应用的整体配置
    'app' => [
        'default_platform' => 'admin',//默认模块
    ],
    //后台配置
    'admin' => [
        'default_file' => 'index',//默认文件夹
        'default_controller' => 'Index',//默认控制器
        'default_action' => 'index',//默认方法
    ],
    //前台配置
    'home' => [
        'default_controller' => '',//默认控制器
        'default_action' => '',//默认方法
    ]


];