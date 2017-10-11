<?php
namespace app\admin\controller;

class Owner extends Admin{
    public function index(){

        //业主列表
        $list = \think\Db::name('owner')->select();
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function auth($uid){

        //认证功能
        \app\home\model\Owner::update(['status'=>'已审核'],['uid'=>$uid]);
        $this->redirect('admin/owner/index');
    }
}