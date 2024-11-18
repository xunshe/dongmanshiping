<?php
    // +----------------------------------------------------------------------
    // | 后台共享头部
    // +----------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>动漫视频网站后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/dongmanshiping/public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/dongmanshiping/public/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dongmanshiping/public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/dongmanshiping/public/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/dongmanshiping/public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="/dongmanshiping/public/admin/vendor/jquery/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">动漫视频网站后台</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)" onclick="logout()"><i class="fa fa-sign-out fa-fw"></i> 退出</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
          

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                  
                        <li>
                            <a href="/dongmanshiping/app/admin/index.php"><i class="fa fa-dashboard fa-fw"></i> 主页</a>
                        </li>
                        <li>
                            <a href="/dongmanshiping/app/admin/tags.php"><i class="fa fa-tags"></i>动漫分类</a>
                        </li>
                        <li>
                            <a href="/dongmanshiping/app/admin/movies.php"><i class="fa fa-film"></i>视频管理</a>
                        </li>
                        <li>
                            <a href="/dongmanshiping/app/admin/comments.php"><i class="fa fa-comments"></i> 评论管理</a>
                        </li>
                        <li>
                            <a href="/dongmanshiping/app/admin/users.php"><i class="fa fa-user"></i> 会员管理</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 管理员管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/dongmanshiping/app/admin/edit_password.php">修改密码</a>
                                </li>
                              
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <script>
            //退出登录的方法
            function logout(){
                 //ajax提交退出登录方法
                 $.get("/dongmanshiping/app/admin/handler/logout.handler.php",{}, function(data){
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
