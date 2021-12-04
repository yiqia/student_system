<?php
declare (strict_types = 1);

namespace app\middleware;
use think\facade\Db;
use app\lib\exception\BaseException;
use think\facade\Cache;
class Student
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        //
        //
        if(!(array_key_exists('session_token',$_COOKIE))){
            setcookie("session_token", "", time() - 7800);
            Header("Location:/user/login");
            exit();
        }
        $session=$_COOKIE['session_token'];
        $user=Cache::get(strval($session));
        if(empty($user)){
            setcookie("session_token", "", time() - 7800);
            Header("Location:/user/login");
            exit();
           throw new BaseException(['code'=>400,'msg'=>'登录失效','errorCode'=>400]);
        }


        $request->session_token=$session;
        return $next($request);
    }
}
