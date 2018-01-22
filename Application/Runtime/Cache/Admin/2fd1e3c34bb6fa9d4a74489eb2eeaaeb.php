<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="ch">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo C('COMPANY_NAME');?> - <?php echo getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME);?></title>
    <link rel="stylesheet" href="/Public/Admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/Admin/KindEditor/themes/default/default.css" />
    <link rel="stylesheet" href="/Public/Admin/css/dropload.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/Admin/css/font-awesome-ie7.min.css">
    <![endif]-->
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
    <script src="/Public/Admin/js/jquery.min.js"></script>
    <script src="/Public/Admin/js/bootstrap.min.js"></script>
    <script src="/Public/Admin/js/metisMenu.min.js"></script>
    <script src="/Public/Admin/js/admin.js"></script>
    <script src="/Public/Admin/js/plupload/plupload.full.min.js"></script>
    <script src="/Public/Admin/js/vue.min.js"></script>
    <script src="/Public/Admin/UEditor/ueditor.config.js"></script>
    <script src="/Public/Admin/UEditor/ueditor.all.min.js"> </script>
    <script src="/Public/Admin/UEditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/Public/Admin/KindEditor/kindeditor-all-min.js"></script>
    <script src="/Public/Admin/KindEditor/lang/zh-CN.js"></script>
    <script src="/Public/Admin/js/dropload.min.js"></script>
    <!--
        arctemplate 与 vue 冲突
        <script src="/Public/Admin/js/template.js"></script>
    -->
    <script src="/Public/Admin/js/common.js"></script>
</head>
<body>