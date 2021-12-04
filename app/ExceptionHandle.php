<?php
namespace app;

use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\HttpResponseException;
use think\exception\ValidateException;
use think\Response;
use Throwable;
use app\lib\exception\BaseException;
use think\facade\Env;

/**
 * 应用异常处理类
 */
class ExceptionHandle extends Handle
{
    /**
     * 不需要记录信息（日志）的异常类列表
     * @var array
     */
    protected $ignoreReport = [
        HttpException::class,
        HttpResponseException::class,
        ModelNotFoundException::class,
        DataNotFoundException::class,
        ValidateException::class,
    ];

    /**
     * 记录异常信息（包括日志或者其它方式记录）
     *
     * @access public
     * @param  Throwable $exception
     * @return void
     */
    public function report(Throwable $exception): void
    {
        // 使用内置的方式记录异常日志
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public $code;
    public $msg;
    public $errorCode;
    public function render($request, Throwable $e): Response
    {
       // return parent::render($request,$e);
        // 添加自定义异常处理机制
        if($e instanceof BaseException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorCode=$e->errorCode;
        }else{
            if(Env::get('APP_DEBUG', true))return parent::render($request,$e);
            $this->code=500;
            $this->msg="服务器异常";
            $this->errorCode="999";
        }
        $res=[
            "code"=>$this->code,
            "msg"=>$this->msg,
            "errorCode"=>$this->errorCode
        ];

        return json($res,$this->code);

    }
}
