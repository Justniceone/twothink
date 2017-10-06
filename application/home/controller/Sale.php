<?php
namespace app\home\controller;
class Sale extends Home{
    public function index(){
        //活动列表(博客租售分类)
        $map = array('category_id' => array('in', 47) );
        $list = \think\Db::name('document')->where($map)->select();
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function detail(){

        //详细内容
        $id = array_unique((array)input('id/a',0));
        $map = array('id' => array('in', $id) );
        $list=\think\Db::name('document')->where($map)->select();
        $content=\think\Db::name('document_article')->where($map)->select();
        $this->assign('list',$list);
        $this->assign('content',$content);
        return $this->fetch();
    }
}