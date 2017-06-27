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
    <li class="active">系统设置</li>
    <span class="btn btn-primary rightbut" data-toggle="modal" data-target="#myModal">新增系统设置</span>
</ol>

<div class="tab-content">
	<table class="table table-bordered table-striped table-hover table-condensed" border="1">
		<thead>
		<tr>
			<th>参数说明</th>
			<th>参数值</th>
			<th>变量名</th>
			<!--<th>操作</th>-->
		</tr>
		</thead>
		<form action="<?php echo U('edit');?>" method="post">
		<tbody>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
			<td><?php echo ($v['info']); ?></td>
			<td>
				<?php if($v['type'] == 'string'): ?><input name="<?php echo ($v['configname']); ?>" type="text" id="<<?php echo ($v['configname']); ?>>"  value="<?php echo ($v['content']); ?>" class="form-control" autocomplete="off" />
	             <?php elseif($v['type'] == 'number'): ?>
	                <input name="<?php echo ($v['configname']); ?>" type="text" id="<<?php echo ($v['configname']); ?>>"  value="<?php echo ($v['content']); ?>" class="form-control" autocomplete="off" />
	            <?php elseif($v['type'] == 'bstring'): ?>
	            	<textarea name="<<?php echo ($v['configname']); ?>>" id="<<?php echo ($v['configname']); ?>>" class="form-control" autocomplete="off" ><?php echo ($v['content']); ?></textarea>
	            <?php elseif($v['type'] == bool): ?>
	            	<div class="btn-group" data-toggle="buttons">
					    <label class="btn btn-primary <?php if($v['content'] == 'Y'): ?>active<?php endif; ?>">
					        <input type="radio" name="<?php echo ($v['configname']); ?>" value="Y"> 开启
					    </label>
					    <label class="btn btn-primary <?php if($v['content'] == 'N'): ?>active<?php endif; ?>">
					        <input type="radio" name="<?php echo ($v['configname']); ?>" value="N"> 关闭
					    </label>
					</div><?php endif; ?>
			</td>
			<td style="text-align:center;"><?php echo ($v['configname']); ?></td>
			<!--<td style="text-align:center;"><a href="">删除</a></td>-->
		</tr><?php endforeach; endif; ?>
		</tbody>
		<tfoot>
		<tr>
			<td colspan="3"><input class="btn btn-success" type="submit" value="更改信息"></td>
		</tr>
		</tfoot>
		</form>
	</table>
</div>
<!--新增配置-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">添加系统设置</h4>
            </div>
            <form class="form-inline" action="<?php echo U('add');?>" method="post">
            <div class="modal-body">
				<table class="table table-striped table-bordered table-hover table-condensed">
					<tr>
						<th>变量名</th>
						<td> <input class="form-control" type="text" name="configname" autocomplete="off"></td>
					</tr>
					<tr>
						<th>参数值</th>
						<td> <input class="form-control" type="text" name="content" autocomplete="off"></td>
					</tr>
					<tr>
						<th>参数说明</th>
						<td> <input class="form-control" type="text" name="info" autocomplete="off"></td>
					</tr>
					<tr>
						<th>参数类型</th>
						<td>
							<div class="btn-group" data-toggle="buttons">
							    <label class="btn btn-primary active">
							        <input type="radio" name="type" value="string" checked> 文本
							    </label>
							    <label class="btn btn-primary">
							        <input type="radio" name="type" value="bstring"> 多行文本
							    </label>
							    <label class="btn btn-primary">
							        <input type="radio" name="type" value="bool"> 布尔(Y/N)
							    </label>
							    <label class="btn btn-primary">
							        <input type="radio" name="type" value="number"> 数字
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