  <?php
    // +----------------------------------------------------------------------
    // | 后台管理员修改密码
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>


  <div id="page-wrapper">
        <!--内容-->
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">密码修改</h3>
                        </div>
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_pwd">管理员密码</label>
                                    <input type="password" class="form-control" id="password" placeholder="请输入管理员密码！">
                                </div>
                                <div class="form-group">
                                    <label for="input_re_pwd">重复密码</label>
                                    <input type="password" class="form-control" id="password_o"
                                           placeholder="请输入管理员重复密码！">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-primary" onclick="edit()">修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>



<?php include('footer-layout.php') ?>

<script>
    //保存管理员方法
    function edit() {
         var password_o = $('#password_o').val();
         var password = $('#password').val();
         //ajax提交登录方法
        $.post("/dongmanshiping/app/admin/handler/edit_password.handler.php",{password_o:password_o,password:password}, function(data){
            if( data.result == 1 ){
                alert('密码更新成功');
                window.location.reload(); 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }






</script>