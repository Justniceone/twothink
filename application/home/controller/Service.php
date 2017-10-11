<?php
namespace app\home\controller;
use app\home\model\Property;
use app\user\model\Member;

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
        if(!is_login()){
            $this->redirect('user/login/index');
        }
        //根据id查询出nickname
        $member=Member::get(['uid'=>is_login()]);
        $this->assign('username',$member->nickname);
        return $this->fetch();
    }

    public function about(){

        //关于我们
        return $this->fetch();
    }

    public function repair(){

        //我的报修
        $map=['uid'=>is_login()];
        $list=\think\Db::name('property')->where($map)->select();
        $this->assign('list',$list);
        return $this->fetch();
    }
    public function auth()
    {

        //业主认证
        if(!is_login()){
            $this->redirect('user/login/index');
        }
        //将信息保存到owner表中
        if (request()->isPost()) {
            //判断是否有相同名字已经认证过

            $member = model('owner');
            $post_data = \think\Request::instance()->post();
            //获取用户UID

            $post_data['uid']=is_login();
            //状态为未审核
            $post_data['status']='未审核';
            //自动验证
            $validate = validate('owner');

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

    public function activity(){
        //我报名的活动
        $list=\think\Db::name('relation')->where(['uid'=>is_login()])->select();
        /*$uids=[];
        foreach ($list as $k=>$value){
            $uids[$k]=$value['aid'];
        }
        //根据uids查询出所有活动
        //$map = array('id' => array('in', $id) );//['id'=>['in',$id]]
        $activities= \think\Db::name('document')->where(['id'=>['in',$uids]])->select();*/
        $this->assign('list',$list);
        //$this->assign('activities',$activities);
        return $this->fetch();
    }

    public function test(){

        $list=\think\Db::name('document')->where(['category_id'=>48])->select();
        $this->assign('list',$list);
        return $this->fetch("view");
    }
}
