<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if($_SESSION['islogin']==1){
            $this->redirect("/manager/index.php/Home/Index/index");
        }
        $this->display('Index:login');
    }
    public function dologin(){
        $username=I('Post.name');
        $password=I('Post.passc');
        $data['username']=$username;
        $data['passw']=$password;
        $m=M('admin');
        $list=$m->where($data)->find();
        if($list){
            $_SESSION['islogin']=1;
            $_SESSION['username']=$username;
            $_SESSION['pow']=$list['status'];
            $this->success('登陆成功', '/manager/index.php/Home/Index/index',0);
        }else{
            $this->error('用户名或密码错误','/manager/index.php/Home/Login/index',3);
        }
    }
    public function exitlogin(){
        session(null);
        $this->redirect("/Home/Login/index");
    }
}