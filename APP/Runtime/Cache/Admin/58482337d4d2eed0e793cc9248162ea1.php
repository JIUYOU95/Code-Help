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

<!--面包屑导航-->
<ol class="breadcrumb">
    <li><a href="<?php echo U('Index/Welcome');?>">Home</a></li>
    <li><a href="<?php echo U('Rule/group');?>">用户组管理</a></li>
    <li class="active">新增成员</li>
</ol>

<table class="table table-striped table-bordered table-hover table-condensed">
	<tr>
		<th width="10%"> 搜索用户名：</th>
		<td>
			<form class="form-inline" action="">
				<input class="form-control" type="text" name="username" value="<?php echo ($_GET['username']); ?>">
				<input class="btn btn-success" type="submit" value="搜索">
			</form>
		</td>
	</tr>
</table>
<table class="table table-striped table-bordered table-hover table-condensed">
	<tr>
		<th width="10%">用户名</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($user_data)): foreach($user_data as $key=>$v): ?><tr>
		<th><?php echo ($v['username']); ?></th>
		<td>
			<?php if(in_array($v['id'],$uids)): ?>已经是<?php echo ($group_name); ?>
			<?php else: ?> <a href="<?php echo U('Admin/Rule/add_user_to_group',array('uid'=>$v['id'],'group_id'=>$_GET['group_id'],'username'=>$_GET['username']));?>">设为<?php echo ($group_name); ?></a><?php endif; ?>
		</td>
	</tr><?php endforeach; endif; ?>
</table>



    <script src="/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Public/Admin/Js/main.js"></script>
</body>
</html>