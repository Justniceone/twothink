<?php
namespace app\home\model;

use think\Model;

class Relation extends Model{
    public function getdoc(){
        //获取文章详情
        return $this->hasOne('Document');
    }
}