<?php
namespace app\admin\validate;

use think\Validate;

class Member extends Validate{
    protected $rule = [
        ['name', 'require','用户名必须'],
        ['room', 'require', '地址必填'],
        ['relation', 'require', '关系必填'],
        ['tel', 'require', '电话必填'],
        ['id', 'require', '身份证必填'],
    ];
}