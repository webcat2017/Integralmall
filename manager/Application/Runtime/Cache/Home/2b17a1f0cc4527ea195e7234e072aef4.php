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
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改管理员</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="/manager/index.php/Home/Admin/do_edit">
            <input type="hidden" value="<?php echo ($adminc["id"]); ?>" name="userid"/>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">用户名：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50"  value="<?php echo ($adminc["username"]); ?>" name="username" size="50" placeholder="请输入用户名"  data-validate="required:请输入用户名" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">新密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50"  name="passw" size="50" placeholder="请输入新密码"  data-validate="required:请输入新密码" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">选择权限：</label>
                </div>
                <div class="field">
                    <select name="status" class="input w50">
                        <?php if(is_array($powlist)): $i = 0; $__LIST__ = $powlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["powname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 修改</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body></html>