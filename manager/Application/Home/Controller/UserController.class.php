<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $user=M('user');
        //$userlist = $user->where('status=1')->order('id desc')->select();
        //$this->assign('userlist',$userlist);
        $count = $user->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $userlist = $user->where('status=1')->order('id desc')->limit($Page->firstRow, $Page->listRows)->select();
        $this->assign('userlist',$userlist);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display('Index:userlist');
    }

    public function delete(){
        $user=M('user');
        $id=I('Post.id');
        $data['status'] = '0';
        $user->where('id='.$id)->save($data);
        echo "用户删除成功！";
    }

    public function add(){
        $this->display('Index:useradd');
    }

    public function do_add(){
        $username=I('Post.username');
        $passw=I('Post.passw');
        $phone=I('Post.phone');
        $sex=I('Post.sex');
        $age=I('Post.age');
        $remarks=I('Post.remarks');
        $user=M('user');
        $data['username'] = $username;
        $data['passw'] = MD5($passw);
        $data['phone'] = $phone;
        $data['sex'] = $sex;
        $data['age'] = $age;
        $data['remarks'] = $remarks;
        $user->add($data);
        $this->success('用户添加成功！','/manager/index.php/Home/User/index',1);
    }

    public function edit(){
        $id=I('Get.id');
        $user=M('user');
        $userc=$user->where('id='.$id)->find();
        $this->assign('userc',$userc);
        $this->display('Index:useredit');
    }

    public function do_edit(){
        $id=I('Post.userid');
        $username=I('Post.username');
        $passw=I('Post.passw');
        $phone=I('Post.phone');
        $integral=I('Post.integral');
        $remarks=I('Post.remarks');
        $user=M('user');
        $data['username'] = $username;
        $data['passw'] = $passw;
        $data['phone'] = $phone;
        $data['integral'] = $integral;
        $data['remarks'] = $remarks;
        $user->where('id='.$id)->save($data);
        $this->success('用户信息修改成功！','/manager/index.php/Home/User/index',1);
    }

}