<?php
namespace app\admin\validate;
use think\Validate;

class Property extends Validate{
    protected $rule = [
        ['name', 'require','用户名必须'],
        ['address', 'require', '地址必填'],
        ['problem', 'require', '问题必填'],
        ['detail', 'require', '详细描述必填'],
    ];
}