<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if($_SESSION['islogin']!=1){
            $this->redirect("/Home/Login/index");
        }
        else{
            $state=$_SESSION['state'];
            $this->assign('state', $state);
            $this->display();
        }
    }
}