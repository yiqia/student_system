<?php
// 应用公共文件


//获得后台面板系统设置的信息
function getSystemSetInfo($item)
{
    //if (!$system = cache('system')) {//如果没有缓冲
    $data = think\facade\Db::name('system')->where(['Id' => 1])->find();
    //$system = unserialize($data['content']);
    //cache('system', $system);
    //}
    return isset($data[$item]) ? $data[$item] : NULL;

}