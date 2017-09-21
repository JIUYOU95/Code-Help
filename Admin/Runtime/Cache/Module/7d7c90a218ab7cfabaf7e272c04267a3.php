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
    <li><a href="#">系统设置</a></li>
    <li class="active">菜单管理</li>
    <span class="btn btn-primary rightbut" onclick="add()">新增菜单</span>
</ul>
<!--菜单显示列表-->
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo U('nav_order');?>" method="post">
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                <tr>
                    <th width="8%">排序</th>
                    <th>菜单名</th>
                    <th>连接</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td style="padding:0;"><input class="form-control order" type="text" name="<?php echo ($v['id']); ?>" value="<?php echo ($v['order_number']); ?>" autocomplete="off"></td>
                        <td><?php echo ($v['_name']); ?></td>
                        <td><?php echo ($v['mca']); ?></td>
                        <td>
                            <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" onclick="add_child(this)">添加子菜单</a> |
                            <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" navMca="<?php echo ($v['mca']); ?>" navIco="<?php echo ($v['ico']); ?>" onclick="edit(this)">修改</a> |
                            <a href="javascript:if(confirm('确定删除？'))location='<?php echo U('delete_nav',array('id'=>$v['id'],'name'=>$v['name']));?>'">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4"><input class="btn btn-success" type="submit" value="排序"></td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>

<!--新增菜单-->
<div class="modal fade" id="myModal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel"> 添加菜单</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('add_nav');?>" method="post">
                <input type="hidden" name="pid" value="0">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">菜单名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="name" name="name" placeholder="请输入菜单名" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mca" class="col-sm-2 control-label">链接</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mca" name="mca" placeholder="模块/控制器/方法 例如 Admin/Nav/index" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ico" class="col-sm-2 control-label">图标</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ico" name="ico" placeholder="font-awesome图标 输入fa fa- 后边的即可" autocomplete="off">
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

<!--修改菜单-->
<div class="modal fade" id="myModal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times;</button>
                <h4 class="modal-title" id="myModalLabel">修改菜单</h4>
            </div>
            <form class="form-horizontal" action="<?php echo U('edit_nav');?>" method="post">
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">菜单名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  id="name" name="name" placeholder="请输入菜单名" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mca" class="col-sm-2 control-label">链接</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mca" name="mca" placeholder="模块/控制器/方法 例如 Admin/Nav/index" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ico" class="col-sm-2 control-label">图标</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ico" name="ico" placeholder="font-awesome图标 输入fa fa- 后边的即可" autocomplete="off">
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
        $("input[name='name'],input[name='mca']").val('');
        $("input[name='pid']").val(0);
        $('#myModal-add').modal('show');
    }
    // 添加子菜单
    function add_child(obj){
        var navId=$(obj).attr('navId');
        $("input[name='pid']").val(navId);
        $("input[name='name']").val('');
        $("input[name='mca']").val('');
        $("input[name='ico']").val('');
        $('#myModal-add').modal('show');
    }

    // 修改菜单
    function edit(obj){
        var navId=$(obj).attr('navId');
        var navName=$(obj).attr('navName');
        var navMca=$(obj).attr('navMca');
        var navIco=$(obj).attr('navIco');
        $("input[name='id']").val(navId);
        $("input[name='name']").val(navName);
        $("input[name='mca']").val(navMca);
        $("input[name='ico']").val(navIco);
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