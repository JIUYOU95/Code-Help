<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>登录后台</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
    <link rel="stylesheet" href="/Public/Common/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/Common/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/Common/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="/Public/Common/jquery/2.0.0/jquery.min.js"></script>
<vector/>
<style type="text/css">
*{margin:0;padding:0;}
body{background:url("../../Public/Admin/Images/bglogin.png");}
.panel{width:326px;margin:auto;margin-top:20%;padding:30px 0;}
.panel .center-block{width:100%;}
.panel .verify{overflow:hidden;}
.panel .verify input{float:left;width:140px;margin-right:10px;}
.panel .verify img{width:140px;float:left;}
.panel-body .error{text-align:center;margin-top:20px;}
</style>

</head>
<body>
<!--表单-->
<div class="panel panel-default">
    <div class="panel-body">
        <form action="<?php echo U('sign');?>" method="post">
            <div class="form-group">
                <label for="username" class="sr-only">User</label>
                <input type="text" name="username" class="form-control" id="username" autocomplete="off" placeholder="用户名">
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" id="password" autocomplete="off" placeholder="密码">
            </div>
            <?php if($verify == 'Y'): ?><div class="form-group verify">
                <input type="text" name="code" class="form-control" autocomplete="off" placeholder="请输入验证码！"  />
                <img src='<?php echo U('Login/verify');?>' onclick='this.src=this.src+"?"+Math.random()' title="点击刷新" />
            </div><?php endif; ?>
            <button type="submit" class="btn btn-primary center-block">登录</button>
        </form>
        <div class="error"><span>忘记密码？</span></div>
    </div>
</div>

</body>
</html>