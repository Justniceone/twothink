<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;
use app\home\model\Document;
use OT\DataDictionary;
use think\Config;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Index extends Home{

	//系统首页
    public function index(){
        $category = model('Category')->getTree();
        $document = new Document();
        $lists    = $document->lists(null);
        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',model('Document')->page);//分页

        return $this->fetch();
    }

    public function online(){
        //判断是否登录
        if(!is_login()){
            //跳转到登录页面
             $this->redirect('/user/login/index.html');
             die;
        }
        //接收表单数据
        if(request()->isPost()) {
            $Property = model('Property');
            $post_data = \think\Request::instance()->post();

            //自动验证
            $validate = validate('Property');

          if (!$validate->check($post_data)) {
                return $this->error($validate->getError());
            }

            $data = $Property->create($post_data);
            if ($data) {
                $this->success('新增成功', url('index'));
            } else {
                $this->error($Property->getError());
            }

        }
            return $this->fetch();

    }

    public function notice(){

        //获取所有小区通知(默认博客分类)
        $map = array('category_id' => array('in', 2) );
        $list = \think\Db::name('document')->where($map)->select();
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function noticedetail(){

        //通知详情
        $id = array_unique((array)input('id/a',0));
        $map = array('id' => array('in', $id) );
        $list=\think\Db::name('document')->where($map)->select();
        $content=\think\Db::name('document_article')->where($map)->select();
        $this->assign('list',$list);
        $this->assign('content',$content);
        return $this->fetch();
    }
}
