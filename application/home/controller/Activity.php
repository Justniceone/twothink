<?php
namespace app\home\controller;

use app\admin\model\Url;
use app\common\controller\UcApi;
use app\home\model\Relation;

class Activity extends Home {
    public function index($offset=0,$length=3){
        //活动列表(博客小区活动分类)
        $deadline=time();
        $map = array('category_id' => array('in', 43) ,'deadline'=>array('>',$deadline));
        $list = \think\Db::name('document')->where($map)->limit(3)->select();
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

    public function more($offset,$length){
        //获取更多数据
        $map = array('category_id' => array('in', 43) ,'deadline'=>array('>',time()));
        $list = \think\Db::name('document')->where($map)->limit($offset,$length)->select();
        return  json_encode($list);
        //print_r($list);
    }

    public function join($id){
        //获取申请参加活动的id
        //判断是否登录
        if(is_login()){
            //已登录,获取用户信息
            $relation=new Relation();
            //根据id查询是否已经报名过了
            $result=Relation::get(['uid'=>is_login(),'aid'=>$id]);

            if($result){
                //该活动已经报过名
                echo json_encode(['msg'=>'已报名']);die;
            }else{
                $relation->save(['uid'=>is_login(),'aid'=>$id]);
                echo json_encode(['msg'=>'报名成功']);
            }

        }else{
            //没有登录返回请登录
            echo  json_encode(['msg'=>'请登录']);
        }

    }

    public function test(){
        $m=4;$n=3;
        if($m=12||$n=9){
            $m++;$n++;
        }
        echo $m;
        var_dump( $n);
    }
}