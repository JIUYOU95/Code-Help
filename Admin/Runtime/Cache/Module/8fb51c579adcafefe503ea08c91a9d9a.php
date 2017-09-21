<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        //配置后台地址
        var app = {
            'base': '/Public/vendor',
        };
    </script>
    <script src="/Public/vendor/require.js"></script>
    <script src="/Public/vendor/config.js"></script>
<style>
    .ng-cloak {
        display: none;
    }
</style>
</head>
<body ng-cloak class="ng-cloak" ng-controller="ctrl" style="
        padding:0 15px;">


<ul class="breadcrumb row navigation">
    <li><a href="<?php echo U('./Theme/welcome');?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">权限控制</a></li>
    <li class="active">权限列表</li>
    <span class="btn btn-primary rightbut" onclick="add()">新增权限</span>
</ul>
<!--权限列表-->
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th>权限名</th>
                <th>权限</th>
                <th>操作</th>
            </tr>
            </thead>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                    <td><?php echo ($v['_name']); ?></td>
                    <td><?php echo ($v['name']); ?></td>
                    <td> <a href="javascript:;" ruleId="<?php echo ($v['id']); ?>" onclick="add_child(this)">添加子权限</a> | <a href="javascript:;" ruleId="<?php echo ($v['id']); ?>" ruleName="<?php echo ($v['name']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="edit(this)">修改</a> | <a href="javascript:if(confirm('确定删除？'))location='<?php echo U('delete_rule',array('id'=>$v['id'],'title'=>$v['title']));?>'">删除</a></td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
</div>

<!--新增权限-->
<div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel"> 添加权限</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('add_rule');?>" method="post">
                <input type="hidden" name="pid" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">权限名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="title" name="title" placeholder="请输入权限名" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">权限</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="name" name="name" placeholder="模块/控制器/方法 例如 Admin/Rule/index" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交更改</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--修改权限列表-->
<div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel"> 修改权限</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('edit_rule');?>" method="post">
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">权限名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="title" name="title" placeholder="请输入权限名" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">权限</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="name" name="name" placeholder="模块/控制器/方法 例如 Admin/Rule/index" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交更改</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function controller($scope, $, _) {
    }
    // 添加菜单
    function add(){
        $("input[name='title'],input[name='name']").val('');
        $("input[name='pid']").val(0);
        $('#myModal-add').modal('show');
    }

    // 添加子菜单
    function add_child(obj){
        var ruleId=$(obj).attr('ruleId');
        $("input[name='pid']").val(ruleId);
        $("input[name='title']").val('');
        $("input[name='name']").val('');
        $('#myModal-add').modal('show');
    }

    // 修改菜单
    function edit(obj){
        var ruleId=$(obj).attr('ruleId');
        var ruletitle=$(obj).attr('ruletitle');
        var ruleName=$(obj).attr('ruleName');
        $("input[name='id']").val(ruleId);
        $("input[name='title']").val(ruletitle);
        $("input[name='name']").val(ruleName);
        $('#myModal-edit').modal('show');
    }
</script>

<script>
    require(['util','select2'],function () {
        require(['/Public/js/app.js', 'css!/Public/css/app.css']);
        require(['angular','jquery'],function (angualr,$) {
            angular.module('app', []).controller('ctrl', ['$scope','$http','$filter', function ($scope,$http, $filter) {
                if (angular.isFunction(controller)) {
                    controller($scope,$http,$filter);
                }
            }]);
            angular.bootstrap(document.getElementsByTagName('body'), ['app']);
        });
    })
</script>
</body>
</html>