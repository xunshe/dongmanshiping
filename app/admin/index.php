<?php
    // +----------------------------------------------------------------------
    // | 后台首页
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="margin-top: 50px" class="text-center">动漫视频网站</h2>
                <div class="panel">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="box box-solid">
                        <!-- /.box-header -->
                        <div class="box-body">
                          <h3 style="margin-left: 30%">作者姓名：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                          <h3 style="margin-left: 30%">学号：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                          <h3 style="margin-left: 30%">指导老师：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                          <h3 style="margin-left: 30%">学院：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                          <h3 style="margin-left: 30%">专业：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h3>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                </div>
            </div>
            
        </div>      
    </div>

<?php include('footer-layout.php') ?>