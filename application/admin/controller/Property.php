<?php
namespace app\admin\controller;

class Property extends Admin{
    //物业管理
    public function index(){
        //保修管理

        /* 获取报修列表 */
        $pid = input('get.pid', 0);
        $map  = array('status' => array('gt', -1));
        $list = \think\Db::name('Property')->where($map)->select();
        $this->assign('pid', $pid);
        $this->assign('list', $list);
        $this->assign('meta_title' , '报修管理');
        return $this->fetch();
    }

    public function add(){
        //新增报修
        if(request()->isPost()){
            $Property = model('Property');
            $post_data=\think\Request::instance()->post();
            //print_r($post_data);die;
            //自动验证
            $validate = validate('Property');

            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $data = $Property->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
            } else {
                $this->error($Property->getError());
            }

                             }
        return $this->fetch('edit');
    }


    public function edit(){
        $id = array_unique((array)input('id/a',0));
        $info = \think\Db::name('Property')->find($id);
        //修改报修
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Property = \think\Db::name("property");
            $data = $Property->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        }
        //获取父导航
        if(!empty($pid)){
            $parent = \think\Db::name('property')->where(array('id'=>$pid))->field('title')->find();
            $this->assign('parent', $parent);
        }
        $this->assign('info', $info);
        return $this->fetch();
    }

    public function del(){
        //删除报修
        $id = array_unique((array)input('id/a',0));
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('property')->where($map)->delete()){
            //记录行为
            action_log('update_channel', 'channel', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}