<?php
declare (strict_types = 1);

namespace app\middleware;
use think\facade\Db;
use app\lib\exception\BaseException;
use think\facade\Cache;
class User
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
        if((array_key_exists('session_token',$_COOKIE))){
            $session=$_COOKIE['session_token'];
            $user=Cache::get(strval($session));

//            if(!empty($user)){
//                Header("Location:/student/index");
//                exit();
//            }
        }

        return $next($request);
    }
}
