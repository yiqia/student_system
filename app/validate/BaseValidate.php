<?php
/**
 * Created by PhpStorm.
 * User: 33072
 * Date: 2020/7/21
 * Time: 22:59
 */

namespace app\validate;
use app\lib\exception\BaseException;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck($scene=false){
        $data=request()->param();
        $validate=$scene?$this->scene($scene)->check($data):$this->check($data);
        if (!$validate) {

            throw new BaseException(['msg'=>$this->getError()]);
        }
        return true;
    }
}