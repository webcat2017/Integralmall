<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="/Public/manager/css/pintuer.css">
    <link rel="stylesheet" href="/Public/manager/css/admin.css">
    <script src="/Public/manager/js/jquery.js"></script>
    <script src="/Public/manager/js/pintuer.js"></script>
    <script src="/Public/manager/js/adminpow.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户管理</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='/manager/index.php/Home/User/add'"><span class="icon-plus-square-o"></span> 添加用户</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">昵称</th>
            <th width="10%">手机号</th>
            <th width="10%">年龄</th>
            <th width="10%">性别</th>
            <th width="10%">积分</th>
            <th width="10%">签到次数</th>
            <th width="10%">备注</th>
            <th width="10%">操作</th>
        </tr>
        <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo["username"]); ?></td>
                <td><?php echo ($vo["phone"]); ?></td>
                <td><?php echo ($vo["age"]); ?></td>
                <td><?php echo ($vo["sex"]); ?></td>
                <td><?php echo ($vo["integral"]); ?></td>
                <td><?php echo ($vo["sign"]); ?></td>
                <td><?php echo ($vo["remarks"]); ?></td>
                <td>
                    <div class="button-group">
                        <a class="button border-main" href="/manager/index.php/Home/User/edit?id=<?php echo ($vo["id"]); ?>">
                            <span class="icon-edit"></span> 修改</a>
                        <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo ($vo["id"]); ?>)"><span class="icon-trash-o"></span> 删除</a>
                    </div>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td colspan="8">
                <div class="pagelist">
                    <?php echo ($page); ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    function del(id){
        if(confirm("您确定要删除吗?")){
            $.post("/manager/index.php/Home/User/delete",{id:id},function(data){
                alert(data);
                location.reload();
            });
        }
    }
</script>

</body>
</html>