<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动漫视频网站</title>
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/app.css">
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/theme.css">
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/dongmanshiping/public/home/layerslider/css/layerslider.css">
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/dongmanshiping/public/home/css/responsive.css">
    <script src="/dongmanshiping/public/js/jquery-1.12.4.js"></script>
</head>
<body>
<div class="off-canvas-wrapper">      
        <div class="off-canvas-content" data-off-canvas-content>
            <header>
         
                <section id="navBar">
                    <nav class="sticky-container" data-sticky-container>
                        <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                            <div class="row">
                                <div class="large-12 columns">
                                    <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                        <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                        <div class="title-bar-title"><img src="images/logo-small.png" alt="logo"></div>
                                    </div>

                                    <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                        <div class="top-bar-left">
                                            <ul class="menu">
                                                <li class="menu-text">
                                                   <img src="/dongmanshiping/public/home/images/logo.png" style="width: 50px">动漫视频网站
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top-bar-right search-btn">
                                            <ul class="menu">
                                                <li class="search">
                                                    <i class="fa fa-search"></i>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="top-bar-right">
                                            <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                                <li class="has-submenu">
                                                    <a href="/dongmanshiping/"><i class="fa fa-home"></i>主页</a>
                                                   
                                                </li>
                                                
                                                <li><a href="/dongmanshiping/app/home/category.php"><i class="fa fa-th"></i>视频分类</a></li>
                                                 <?php
                                                    //判断有没有开启session 
                                                    if(!isset($_SESSION)) {
                                                    //如果没有开启，那么开启  
                                                         @session_start();  
                                                    }
                                                    if(isset($_SESSION['user'])) {
                                                 ?>
                                                <li><a href="/dongmanshiping/app/home/profile.php"><img src="/dongmanshiping/<?php echo $_SESSION['user']['avatar'] ?>" width="30px" height="30px" style="border-radius: 100%"></a></li>
                                                <li><a href="javascript:void(0)" onclick="logout()"><i class="fa fa-logout"></i>退出</a></li>
                                                <?php }else{ ?>
                                                 <li><a href="/dongmanshiping/app/home/login.php"><i class="fa fa-user"></i>登录</a></li>
                                                 <li><a href="/dongmanshiping/app/home/adminlogin.php"><i class="fa fa-user"></i>后台登录</a></li>
                                                <li><a href="/dongmanshiping/app/home/register.php"><i class="fa fa-envelope"></i>注册</a></li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="search-bar" class="clearfix search-bar-light">
                                <form method="get" action="/dongmanshiping/app/home/search.php">
                                    <div class="search-input float-left">
                                        <input type="search" name="keyword" placeholder="搜索动漫视频">
                                    </div>
                                    <div class="search-btn float-right text-right">
                                        <button class="button" name="search" type="submit">搜索</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </nav>
                </section>
            </header><!-- End Header -->

    <script>
        //退出登录的方法
        function logout(){
             //ajax提交退出登录方法
             $.get("/dongmanshiping/app/home/handler/logout.handler.php",{}, function(data){
                if( data.result == 1 ){
                    alert('退出成功！');
                    window.location.href="/dongmanshiping/"; 
                }
                if( data.result == 0 ){
                    alert('退出失败！');
                }
            },'json');
        }   
    </script>
