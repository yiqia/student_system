<?php
declare (strict_types = 1);

namespace app\validate;

use think\Validate;

class StudentValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名' =>  ['规则1','规则2'...]
     *
     * @var array
     */
    protected $rule = [
        "Id"=>"require|number",
       "name"=>"require|max:10",
        "header"=>"max:255",
        "number"=>"require|max:20",
        "id_card"=>"require|max:20",
        "sex"=>"require|max:10",
        "teacher"=>"require|max:10",
        "class"=>"require|max:10",
        "dormitory"=>"require|max:10",
        "major"=>"require|max:15",
        "college"=>"require|max:20",
        "start_time"=>"require|max:30",
        "student_id"=>"require|max:30",
        "end_time"=>"require|max:30",
        "start_address"=>"require|max:30",
        "end_address"=>"require|max:30",
        "traffic_number"=>"max:30",
        "traffic"=>"require|max:30",
        "temperature"=>"require|max:30"
    ];

    /**
     * 定义错误信息
     * 格式：'字段名.规则名' =>  '错误信息'
     *
     * @var array
     */
    protected $message = [
        "name.require"=>"名字必须填写",
        "number.require"=>"学号必须填写",
        "id_card.require"=>"身份证必须填写",
        "sex.require"=>"性别必须填写",
        "teacher.require"=>"辅导员必须填写",
        "class.require"=>"班级必须填写",
        "dormitory.require"=>"寝室号必须填写",
        "major.require"=>"专业必须填写",
        "college.require"=>"学院必须填写",
        "Id.require"=>"Id都没有怎么处理",
        "Id.number"=>"Id格式不正确",
        "start_time.require"=>"出发时间必须填写",
        "student_id.require"=>"参数错误",
        "end_time.require"=>"离开时间必须填写",
        "start_address.require"=>"出发地点必须填写",
        "end_address.require"=>"到达地点必须填写",
        "traffic.require"=>"交通方式必须填写",
        "temperature.require"=>"温度必须填写",
    ];

    protected $scene=[
        "add"=>['name','number','id_card','sex','teacher','class','dormitory','major','college'],
        "delete"=>['Id'],
        "update"=>['name','number','id_card','sex','teacher','class','dormitory','major','college','Id'],
        "addStroke"=>['start_time','student_id','end_time','start_address','end_address','traffic']
    ];
}
