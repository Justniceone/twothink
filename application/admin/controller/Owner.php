<?php
namespace app\admin\controller;

class Owner extends Admin{
    public function index(){

        //业主认证
        //$map = array('category_id' => array('in', 45) );
        $list = \think\Db::name('member')->select();
        $this->assign('list', $list);
        return $this->fetch();
    }
}