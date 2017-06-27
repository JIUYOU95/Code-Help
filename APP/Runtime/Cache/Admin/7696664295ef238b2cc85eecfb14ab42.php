<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>main</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

    <link rel="stylesheet" href="/Public/Common/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/Common/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/Common/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="/Public/Common/jquery/2.0.0/jquery.min.js"></script>
    <script src="/Public/Common/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Public/Admin/Css/main.css" />
    

</head>
<body>

<script type="text/javascript">
$(function(){
	$('.nopurview').click(function(){
		alert('不允许锁定id为1的管理员帐号！');
		return false;
	});
	$('.nodel').click(function(){
		alert('不允许删除id为1的管理员帐号！');
		return false;
	});
});
</script>
<!--面包屑导航-->
<ol class="breadcrumb">
    <li><a href="<?php echo U('Index/Welcome');?>">Home</a></li>
    <li class="active">管理员列表</li>
    <span class="btn btn-primary rightbut" data-toggle="modal" data-target="#myModal">新增管理员</span>
</ol>

<div class="alert alert-danger alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	用户名为admin的为超级管理员，不可锁定及删除，密码为空的用户名显示为红色。
</div>

<div class="tab-content">
	<table class="table table-striped table-bordered table-hover table-condensed" style="text-align:center;">
		<thead>
		<tr>
			<th>用户名</th>
			<th>昵称</th>
			<th>用户组</th>
			<th>邮箱</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>登录IP</th>
			<th>登录时间</th>
			<th>操作</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($access)): foreach($access as $key=>$v): ?><tr>
			<td>
				<span <?php if($v['password'] == md5('')): ?>class="text-danger"<?php endif; ?> ><?php echo ($v['username']); ?></span>
			</td>
			<td><?php echo ($v['nickname']); ?></td>
			<td>
				<?php if($v['id'] == 1): ?>超级管理员
				<?php else: ?>
					<?php echo ($v['title']); endif; ?>
			</td>
			<td><?php echo ($v['email']); ?></td>
			<td>
				<?php if($v['status'] == 1): ?><span class="text-success"><i class="fa fa-check-circle fa-px"></i></span>
				<?php elseif($v['status'] == 3): ?> <span class="text-danger"><i class="fa fa-unlock-alt fa-px"></i></span>
				<?php elseif($v['status'] == 2): ?> <span class="text-danger">未验证</span><?php endif; ?>
			</td>
			<td>
				<?php if($v['regtime'] == 0): else: echo (date('Y-m-d',$v['regtime'])); endif; ?>
			</td>
			<td><?php echo ($v['loginip']); ?></td>
			<td>
				<?php if($v['logintime'] == 0): else: echo (date('Y-m-d',$v['logintime'])); endif; ?>
			</td>
			<td>
				<?php if($v['status'] == 1): ?><a href="<?php echo U('Admin/Rule/lockHandle',array('id'=>$v['id'],'username'=>$v['username'],'lock'=>3));?>" class='<?php if($v['id'] == 1): ?>nopurview<?php endif; ?>'>锁定</a>
				<?php elseif($v['status'] == 3): ?>
					<a href="<?php echo U('Admin/Rule/lockHandle',array('id'=>$v['id'],'username'=>$v['username'],'lock'=>1));?>">解锁</a>
				<?php elseif($v['status'] == 2): ?>
					<a href="">验证</a><?php endif; ?>
				| <a href="<?php echo U('Admin/Rule/edit_admin',array('id'=>$v['id']));?>">修改</a>
				| <a href="<?php echo U('Admin/Rule/delete_admin',array('id'=>$v['id'],'username'=>$v['username']));?>" class='<?php if($v['id'] == 1): ?>nodel<?php endif; ?>'>删除</a>
				| <a href="<?php echo U('Admin/Rule/empty_password',array('id'=>$v['id'],'username'=>$v['username']));?>">清空密码</a>
			</td>
		</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>
<!--新增管理员-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">新增管理员</h4>
            </div>
            <form class="form-inline" action="<?php echo U('Admin/Rule/add_admin');?>" method="post">
            <div class="modal-body">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>管理组</th>
						<td>
						<?php if(is_array($group)): foreach($group as $key=>$v): ?><label for="<?php echo ($v['id']); ?>"><?php echo ($v['title']); ?></label>
							<input class="xb-icheck" type="checkbox" name="group_ids[]" value="<?php echo ($v['id']); ?>" id="<?php echo ($v['id']); ?>"> &emsp;<?php endforeach; endif; ?>
						</td>
					</tr>
					<tr>
						<th>用户名</th>
						<td> <input class="form-control" type="text" name="username"><span class="text-danger" autocomplete="off">&emsp;登录账号，填写后不可修改</span></td>
					</tr>
					<tr>
						<th>昵称</th>
						<td> <input class="form-control" type="text" name="nickname"><span class="text-danger" autocomplete="off">&emsp;显示的名称</span></td>
					</tr>
					<tr>
						<th>手机号</th>
						<td> <input class="form-control" type="text" name="phone" autocomplete="off"></td>
					</tr>
					<tr>
						<th>邮箱</th>
						<td> <input class="form-control" type="text" name="email" autocomplete="off"></td>
					</tr>
					<tr>
						<th>初始密码</th>
						<td> <input class="form-control" type="password" name="password" autocomplete="off"></td>
					</tr>
					<tr>
						<th>状态</th>
						<td>
							<div class="btn-group" data-toggle="buttons">
							    <label class="btn btn-primary active">
							        <input type="radio" name="status" value="1" checked> 允许登录
							    </label>
							    <label class="btn btn-primary">
							        <input type="radio" name="status" value="3"> 禁止登录
							    </label>
							</div>
						</td>
					</tr>
				</table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
            </form>
        </div>
    </div>
</div>



    <script src="/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Public/Admin/Js/main.js"></script>
</body>
</html>