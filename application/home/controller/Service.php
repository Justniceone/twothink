<?php
namespace app\home\controller;
class Service extends Home {
    public function index(){

        //活动列表(博客科技分类)
        $map = array('category_id' => array('in', 45) );
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

    public function lists(){

        //服务列表
        return $this->fetch();
    }

    public function discovery(){

        //发现
        return $this->fetch();
    }

    public function my(){

        //我的
/*        if(!is_login()){
             $this->redirect('/user/login/index.html');
        }*/
        return $this->fetch();
    }

    public function center(){

        //我的资料
        return $this->fetch();
    }

    public function about(){

        //关于我们
        return $this->fetch();
    }

    public function auth()
    {

        //业主认证
        //将信息保存到member表中
        if (request()->isPost()) {
            $member = model('member');
            $post_data = \think\Request::instance()->post();

            //自动验证
            $validate = validate('member');

            if (!$validate->check($post_data)) {
                return $this->error($validate->getError());
            }

            $data = $member->create($post_data);
            if ($data) {
                $this->success('新增成功', url('index'));
            } else {
                $this->error($member->getError());
            }

        }
        return $this->fetch();
    }
}