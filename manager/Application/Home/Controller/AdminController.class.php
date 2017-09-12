<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function index(){
        //$admin=M('admin');
        $admin=D("admin");
        $adminlist = $admin->where('status!=0')->relation(true)->select();
        $this->assign('adminlist',$adminlist);


        $this->display('Index:adminlist');
    }

    public function delete(){
        $admin=M('admin');
        $id=I('Post.id');
        $data['status'] = '0';
        $admin->where('id='.$id)->save($data);
        echo "管理员删除成功！";
    }

    public function add(){
        $pow=M('pow');
        $powlist=$pow->order('id desc')->select();
        $this->assign('powlist',$powlist);
        $this->display('Index:adminadd');
    }

    public function do_add(){
        $username=I('Post.username');
        $passw=I('Post.passw');
        $status=I('Post.status');
        $admin=M("admin");
        $data['username'] = $username;
        $data['passw'] = MD5($passw);
        $data['status'] = $status;
        $admin->add($data);
        $this->success('管理员添加成功！','/manager/index.php/Home/Admin/index',1);
    }

    public function edit(){
        $id=I('Get.id');
        $admin=M("admin");
        $adminc=$admin->where('id='.$id)->find();
        $this->assign('adminc',$adminc);
        $powc=M('pow');
        $powlist=$powc->order('id desc')->select();
        $this->assign('powlist',$powlist);
        $this->display('Index:adminedit');
    }

    public function do_edit(){
        $id=I('Post.userid');
        $username=I('Post.username');
        $passw=MD5(I('Post.passw'));
        $admin=M("admin");
        $data['username'] = $username;
        $data['passw'] = $passw;
        $admin->where('id='.$id)->save($data);
        $this->success('管理员信息修改成功！','/manager/index.php/Home/Admin/index',1);
    }

}