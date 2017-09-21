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



<!-- 模态框（Modal） -->
<div class="modal fade success" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content alert alert-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">系统提示</h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-info-circle fa-4x pull-left"></i>
                <div class="pull-left">
                    <p class="countdown"><?php echo ($message); ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<script type="text/javascript">

    require(['css!/Public/css/app.css']);
    require(['util','angular','jquery'],function () {
        angular.module('app', []).controller('ctrl', ['$scope', function ($scope) {
            setTimeout(function() {
                //显示毫秒跳动
                var i=<?php echo ($waitSecond); ?>-1;
                setInterval(function(){
                    $(".countdown").html(i + "秒后自动跳转到首页！");
                    i--;
                },1000);

                $('#myModal').modal()
                keyboard: true
                $('#myModal').on('hide.bs.modal',
                    function() {
                        setTimeout('delayer()',<?php echo ($waitSecond); ?>000);
                    })
            }, 500);
            $scope.delayer=function () {
                window.location="<?php echo ($jumpUrl); ?>";
            }

        }]);
        angular.bootstrap(document.getElementsByTagName('body'), ['app']);
    });

</script>

</body>
</html>