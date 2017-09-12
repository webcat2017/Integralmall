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
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改用户信息</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="/manager/index.php/Home/User/do_edit">
            <input type="hidden" value="<?php echo ($userc["id"]); ?>" name="userid"/>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">昵称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($userc["username"]); ?>"  name="username" size="50" placeholder="请输入用户昵称"  data-validate="required:请输入用户昵称" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">密码：</label>
                </div>
                <div class="field">
                    <input type="password" class="input w50" value="<?php echo ($userc["passw"]); ?>"  name="passw" size="50" placeholder="请输入密码"  data-validate="required:请输入密码" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">手机号：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($userc["phone"]); ?>"  name="phone" size="50" placeholder="请输入手机号"  data-validate="required:请输入手机号" />
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label for="sitename">积分：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?php echo ($userc["integral"]); ?>"  name="integral" size="50" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">备注：</label>
                </div>
                <div class="field">
                    <input type="text"  value="<?php echo ($userc["remarks"]); ?>" class="input w50"  name="remarks" size="50" placeholder="备注（可选填）" />
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