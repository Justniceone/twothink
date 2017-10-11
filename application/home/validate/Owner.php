<?php
namespace app\home\validate;

use think\Validate;

class  Owner extends Validate{
    protected $rule = [
        ['name', 'require','用户名必须'],
        ['room', 'require', '地址必填'],
        ['relation', 'require', '关系必填'],
        ['tel', 'require', '电话必填'],
        ['id_nu', 'require', '身份证必填'],
    ];
}