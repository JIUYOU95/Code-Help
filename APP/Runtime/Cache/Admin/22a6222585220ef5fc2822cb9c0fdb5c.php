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

<style type="text/css">
.table{margin:10px 0;}
</style>
<!--面包屑导航-->
<ol class="breadcrumb">
    <li><a href="<?php echo U('Index/Welcome');?>">Home</a></li>
    <li><a href="<?php echo U('Rule/group');?>">用户组管理</a></li>
    <li class="active">分配权限</li>
</ol>

<h3 class="text-center">为<span class="text-danger"><?php echo ($group_data['title']); ?></span>分配权限</h3>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo ($group_data['id']); ?>">
<table class="table table-striped table-bordered table-hover table-condensed">
	<?php if(is_array($rule_data)): foreach($rule_data as $key=>$v): if(empty($v['_data'])): ?><tr class="b-group">
			<th width="10%"> <label><?php echo ($v['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)" ></label></th>
			<td></td>
		</tr>
		<?php else: ?>
		<tr class="b-group">
			<th width="10%"> <label><?php echo ($v['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)"></label></th>
			<td class="b-child">
				<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><table class="table table-striped table-bordered table-hover table-condensed">
				<tr class="b-group">
					<th width="15%"> <label><?php echo ($n['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($n['id']); ?>" <?php if(in_array($n['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> onclick="checkAll(this)"></label></th>
					<td>
					<?php if(!empty($n['_data'])): if(is_array($n['_data'])): $i = 0; $__LIST__ = $n['_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?><label>&emsp;<?php echo ($c['title']); ?> <input type="checkbox" name="rule_ids[]" value="<?php echo ($c['id']); ?>" <?php if(in_array($c['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?> ></label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</td>
				</tr>
				</table><?php endforeach; endif; ?>
			</td>
		</tr><?php endif; endforeach; endif; ?>
	<tfoot>
	<tr>
		<td colspan="2"><input class="btn btn-success" type="submit" value="提交"></td>
	</tr>
	</tfoot>
</table>
</form>
<script>
function checkAll(obj){
    $(obj).parents('.b-group').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
}
</script>


    <script src="/Public/Common/Js/jquery.nicescroll.js"></script>
    <script src="/Public/Admin/Js/main.js"></script>
</body>
</html>