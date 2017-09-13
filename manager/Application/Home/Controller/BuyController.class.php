<?php
namespace Home\Controller;
use Think\Controller;
class BuyController extends Controller {
    public function index(){
        $calssc=M('class');

        $classlist = $calssc->where('status!=0')->select();
        $this->assign('classlist',$classlist);


        $this->display('Index:buyclass');
    }

    public function delete(){
        $calssc=M('class');
        $id=I('Post.id');
        $data['status'] = '0';
        $calssc->where('id='.$id)->save($data);
        echo "分类删除成功！";
    }

    public function add(){
        $this->display('Index:buyclassadd');
    }

    public function do_add(){
        $classname=I('Post.classname');
        $discrption=I('Post.discrption');
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     113145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     'Public/Uploads/'; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            $classc=M('class');
            $data['classname'] = $classname;
            $data['discrption'] = $discrption;
            foreach($info as $file){
                $data['imgurl'] = $file['savepath'].$file['savename'];
            }
            $classc->add($data);
            $this->success('分类添加成功！','/manager/index.php/Home/Buy/index',1);
        }


    }

    public function edit(){
        $id=I('Get.id');
        $calssc=M('class');
        $classedit=$calssc->where('id='.$id)->find();
        $this->assign('classedit',$classedit);
        $this->display('Index:buyclassedit');
    }

    public function do_edit(){
        $id=I('Post.classid');
        $classname=I('Post.classname');
        $discrption=I('Post.discrption');
        $classc=M('class');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     113145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     'Public/Uploads/'; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            //$this->error($upload->getError());
            $data['classname'] = $classname;
            $data['discrption'] = $discrption;
        }else{// 上传成功
            //$this->success('上传成功！');
            $calssc=M('class');
            $data['classname'] = $classname;
            $data['discrption'] = $discrption;
            foreach($info as $file){
                $data['imgurl'] = $file['savepath'].$file['savename'];
            }
        }
        $classc->where('id='.$id)->save($data);
        $this->success('分类修改成功！','/manager/index.php/Home/Buy/index',1);

    }

    public function cont(){
        $commc=D('commodity');
        $count = $commc->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数
        $Page->setConfig('prev','上一页');
        $Page->setConfig('next','下一页');
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $commclist = $commc->where('status=1')->order('id desc')->limit($Page->firstRow, $Page->listRows)->relation(true)->select();
        $this->assign('commclist',$commclist);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出

        $this->display('Index:buycont');
    }

    public function contdelete(){
        $commc=M('commodity');
        $id=I('Post.id');
        $data['status'] = '0';
        $commc->where('id='.$id)->save($data);
        echo "商品删除成功！";
    }

    public function contadd(){
        $classname=M('class');
        $classlist = $classname->where('status!=0')->select();
        $this->assign('classlist',$classlist);
        $this->display('Index:buycontadd');
    }
    public function do_contadd(){
        $name=I('Post.name');
        $classid=I('Post.classid');
        $integral=I('Post.integral');
        $number=I('Post.number');
        $spec=I('Post.spec');
        $contc=I('Post.contc');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     113145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     'Public/Uploads/'; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            //$this->success('上传成功！');
            $commodity=M('commodity');
            $data['name'] = $name;
            $data['classid'] = $classid;
            $data['integral'] = $integral;
            $data['number'] = $number;
            $data['spec'] = $spec;
            $data['contc'] = $contc;
            foreach($info as $file){
                $data['imgurl'] = $file['savepath'].$file['savename'];
            }
            $commodity->add($data);
            $this->success('商品添加成功！','/manager/index.php/Home/Buy/contadd',1);
        }
    }

}