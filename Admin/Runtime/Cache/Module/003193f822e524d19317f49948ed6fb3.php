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
    <li class="active">用户组管理</li>
    <span class="btn btn-primary rightbut" onclick="add()">新增用户组</span>
</ul>
<!--用户组列表-->
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
            <tr>
                <th>用户组名</th>
                <th>操作</th>
            </tr>
            </thead>
            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                    <td><?php echo ($v['title']); ?></td>
                    <td>
                        <a href="javascript:;" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="edit(this)">修改</a> |
                        <a href="javascript:if(confirm('确定删除？'))location='<?php echo U('delete_group',array('id'=>$v['id'],'title'=>$v['title']));?>'">删除</a> |
                        <a href="<?php echo U('rule_group',array('id'=>$v['id']));?>">分配权限</a> |
                        <a href="<?php echo U('Admin/Rule/check_user',array('group_id'=>$v['id']));?>">新增成员</a>
                    </td>
                </tr><?php endforeach; endif; ?>
        </table>
    </div>
</div>
<!--新增用户组-->
<div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel">添加用户组</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('add_group');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">用户组名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="title" name="title" placeholder="请输入用户组名" autocomplete="off" required>
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
<!--修改用户组-->
<div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel">修改用户组</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('edit_group');?>" method="post">
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">用户组名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="title" name="title" placeholder="请输入用户组名" autocomplete="off" required>
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
        $("input[name='title']").val('');
        $('#myModal-add').modal('show');
    }
    // 修改菜单
    function edit(obj){
        var ruleId=$(obj).attr('ruleId');
        var ruletitle=$(obj).attr('ruletitle');
        $("input[name='id']").val(ruleId);
        $("input[name='title']").val(ruletitle);
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