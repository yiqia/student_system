<?php
/**
 * Created by PhpStorm.
 * User: 33072
 * Date: 2020/7/21
 * Time: 14:49
 */

namespace app\lib\exception;


use think\Exception;

class BaseException extends Exception
{
    public $code=400;
    public $msg="系统错误";
    public $errorCode=999;
    public function __construct($params=[])
    {
        if(!is_array($params))return;
        if(array_key_exists('code',$params)) $this->code=$params['code'];
        if(array_key_exists('msg',$params)) $this->msg=$params['msg'];
        if(array_key_exists('errorCode',$params)) $this->errorCode=$params['errorCode'];
    }
}