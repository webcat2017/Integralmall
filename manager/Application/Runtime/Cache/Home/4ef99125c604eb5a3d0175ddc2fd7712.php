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
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 修改分类</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" enctype="multipart/form-data" action="/manager/index.php/Home/Buy/do_edit">
            <input type="hidden" value="<?php echo ($classedit["id"]); ?>" name="classid"/>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">分类名称：</label>
                </div>
                <div class="field">
                    <input type="text" value="<?php echo ($classedit["classname"]); ?>" class="input w50"  name="classname" size="50" placeholder="请输入分类名"  data-validate="required:请输入分类名" />
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>缩略图：</label>
                </div>
                <div class="field">
                    <input type="file" name="imgurl" class="input tips" style="width:25%; float:left;"  data-toggle="hover" data-place="right"  data-image="/manager/<?php echo ($classedit["imgurl"]); ?>" />
                    *建议缩略图尺寸200*200
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">描述：</label>
                </div>
                <div class="field">
                    <input type="text" value="<?php echo ($classedit["discrption"]); ?>" class="input w50"  name="discrption" size="50" placeholder="请输入分类描述（可选填）"/>
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