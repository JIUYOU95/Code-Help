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
<body ng-cloak class="ng-cloak" ng-controller="ctrl">

<!-- 模态框（Modal） -->
<div class="modal fade success" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content alert alert-info">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">系统提示</h4>
            </div>
            <div class="modal-body">
                <i class="fa fa-check-circle fa-4x pull-left"></i>
                <div class="pull-left">
                    <p class="countdown"><?php echo ($message); ?>,2秒后自动跳转！</p>
                </div>
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
                var i=1;
                setInterval(function(){
                    $(".countdown").html("<?php echo ($message); ?>,"+ i + "秒后自动跳转！");
                    i--;
                },1000);
                //模态框自动激活
                $('#myModal').modal()
                $('#myModal').on('hide.bs.modal',
                    $(document).ready(function(){
                        setTimeout('window.location="<?php echo ($jumpUrl); ?>"',2000);
                    })
                )
            }, 500);

        }]);
        angular.bootstrap(document.getElementsByTagName('body'), ['app']);
    });


</script>

</body>
</html>