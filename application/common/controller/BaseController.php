<?php
/**
 * Created by PhpStorm.
 * User: jincool
 * Date: 2019/3/12
 * Time: 9:46
 */

class BaseController
{

    function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept,Authorization");
        header('Access-Control-Allow-Methods: POST,GET');
    }

    public static function condition()
    {

    }



}