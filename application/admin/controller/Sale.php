<?php
namespace app\admin\controller;

class Sale extends Admin {
    public function index(){
        //保修管理

        /* 获取报修列表 */
        $pid = input('get.pid', 0);
        $map  = array('category_id' => array('in', 47));
        $list = \think\Db::name('document')->where($map)->paginate(5);
        // 获取分页显示
        $page = $list->render();
        $this->assign('pid', $pid);
        $this->assign('list', $list);
        $this->assign('page' , $page);
        return $this->fetch();
    }
    public function del(){
        //删除
        $id = array_unique((array)input('id/a',0));
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('document')->where($map)->delete()){
            //记录行为
            action_log('update_channel', 'channel', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}