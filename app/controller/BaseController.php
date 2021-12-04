<?php

namespace app\controller;

use think\Controller;
class BaseController extends Controller
{
      static function showData($code=200,$msg="无",$data=[],$errorCode=null){
          $res=[
              "code"=>$code,
              "msg"=>$msg,
              "data"=>$data,
              "errorCode"=>$errorCode
          ];
          return json($res);
      }
      static function showEmpty($code,$msg){
          return self::showData($code,$msg);
      }
}
