<?php

namespace Common\Tag;
use Think\Template\TagLib;

class My extends TagLib {
    // 定义标签
    protected $tags=array(
        'bootstrapcss'=>array('','close'=>0),
        'bootstrapjs'=>array('','close'=>0),
        'bootstrapselect'=>array('','close'=>0),
        'layuicss'=>array('','close'=>0),
        'layuijs'=>array('','close'=>0),
        'jquery'=>array('','close'=>0),
        'font'=>array('','close'=>0),
        'fontb'=>array('','close'=>0),
        'editorcss'=>array('','close'=>0),
        'editorjs'=>array('','close'=>0),
        'markdown'=>array('','close'=>0),
        'WdatePicker'=>array('','close'=>0),
        'nicescroll'=>array('','close'=>0),
        'login'=>array('','close'=>0),
        'admin'=>array('','close'=>0),
        'admincss'=>array('','close'=>0),
        'adminjs'=>array('','close'=>0),
        'manual'=>array('','close'=>0),
        'manualjs'=>array('','close'=>0),
        
    );

    /**
     * bootstrapcss引入
     <link rel="stylesheet" href="__COMMON__/bootstrap/3.3.0/css/bootstrap-theme.min.css" />
     */
    public function _bootstrapcss($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="__COMMON__/font-awesome/4.7.0/css/font-awesome.min.css" />
php;
    return $link;
    }
    /*bootstrapjs引入*/
    public function _bootstrapjs($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
    <script src="__COMMON__/bootstrap/3.3.0/js/bootstrap.min.js"></script>
php;
    return $link;
    }

    /*bootstrap-select引入*/
    public function _bootstrapselect($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/bootstrap-select/1.7.2/css/bootstrap-select.min.css" />
    <script src="__COMMON__/bootstrap-select/1.7.2/js/bootstrap-select.min.js"></script>
    <script src="__COMMON__/bootstrap-select/1.7.2/js/i18n/defaults-zh_CN.min.js"></script>
php;
    return $link;
    }

    /*layuicss*/
    public function _layuicss($tag,$content){
         $link=<<<php
    <link rel="stylesheet" href="__COMMON__/layui/css/layui.css" />
php;
    return $link;
    }
    /*layuijs*/
    public function _layuijs($tag,$content){
         $link=<<<php
     <script src="__COMMON__/layui/layui.js"></script>
php;
    return $link;
    }
    /*jquery*/
    public function _jquery($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
php;
    return $link;
    }
    /*Font字体图标*/
    public function _font($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/font-awesome/4.7.0/css/font-awesome.min.css" />
php;
    return $link;
    }
    public function _fontb($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/font-awesome/3.2.1/css/font-awesome.min.css" />
php;
    return $link;
    }
    /*Editor.md编辑器*/
    public function _editorcss($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__COMMON__/Editor.md/1.5.0/css/editormd.css" />
php;
    return $link;
    }
    public function _editorjs($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/Editor.md/1.5.0/editormd.js"></script>
php;
    return $link;
    }
    public function _markdown($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/Editor.md/1.5.0/editormd.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/marked.min.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/prettify.min.js"></script>

    <script src="__COMMON__/Editor.md/1.5.0/lib/raphael.min.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/underscore.min.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/sequence-diagram.min.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/flowchart.min.js"></script>
    <script src="__COMMON__/Editor.md/1.5.0/lib/jquery.flowchart.min.js"></script>
php;
    return $link;
    }
    /*WdatePicker时间控件*/
     public function _WdatePicker($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/My97DatePicker/4.8/WdatePicker.js"></script>
php;
    return $link;
    }
    /*nicescroll滚动条*/
     public function _nicescroll($tag,$content) {
        $link=<<<php
    <script src="__COMMON__/Js/jquery.nicescroll.js"></script>
    
php;
    return $link;
    }
    /* Admin后台css和js*/
    public function _admin($tag,$content) {
        $link=<<<php
  	<link rel="stylesheet" href="__PUBLIC__/Admin/Css/base.css" />
  	<script src="__PUBLIC__/Admin/Js/base.js"></script>
php;
    return $link;
    }
    /* Admin后台css和js*/
    public function _admincss($tag,$content) {
        $link=<<<php
    <link rel="stylesheet" href="__PUBLIC__/Admin/Css/main.css" />
php;
    return $link;
    }
    public function _adminjs($tag,$content) {
        $link=<<<php
    <script src="__PUBLIC__/Admin/Js/main.js"></script>
php;
    return $link;
    }
    /*登录*/
    public function _login(){
         $link=<<<php
    <link rel="stylesheet" href="__COMMON__/bootstrap/3.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="__COMMON__/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="__COMMON__/jquery/2.0.0/jquery.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/util.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/Admin/Css/login.css" />
php;
    return $link;
    }
    /*Manual*/
    public function _manual(){
         $link=<<<php
    <link rel="stylesheet" href="__PUBLIC__/Home/Css/manual.css" />
    <script src="__PUBLIC__/Home/Js/manual.js"></script>
php;
    return $link;
    }
    public function _manualjs(){
         $link=<<<php
    <script src="__PUBLIC__/Home/Js/nicescroll.js"></script>
php;
    return $link;
    }

}