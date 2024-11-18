<?php
    // +----------------------------------------------------------------------
    // | 登录页面
    // +----------------------------------------------------------------------


    //引入头部公共部分
    include('header-layout.php');
?>


 <!--breadcrumbs-->
            <section id="breadcrumb">
                <div class="row">
                    <div class="large-12 columns">
                        <nav aria-label="You are here:" role="navigation">
                            <ul class="breadcrumbs">
                                <li><i class="fa fa-home"></i><a href="/dongmanshiping/">主页</a></li>
                                <li>
                                    <span class="show-for-sr">当前页: </span> 登录
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section><!--end breadcrumbs-->

            <!-- registration -->
            <section class="registration">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="login-register-content">
                            <div class="row collapse borderBottom">
                                <div class="medium-6 large-centered medium-centered">
                                    <div class="page-heading text-center">
                                        <h3>用户登录</h3>
                                        <p>动漫视频网站的用户，请登录后进行视频观看，会员视频需要升级为视频用户</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                                <div class="large-4 medium-6 columns end" style="margin-left:35%">
                                    <div class="register-form">
                                        <h5 class="text-center">漫友登录</h5>
                                        <form method="post" data-abide novalidate>
                                            <div data-abide-error class="alert callout" style="display: none;">
                                                <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-user"></i></span>
                                                <input class="input-group-field" type="text" id="name" placeholder="输入用户名" required>
                                                <span class="form-error">username is required</span>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                                <input type="password" id="password" placeholder="请输入密码" required>
                                                <span class="form-error">password is required</span>
                                            </div>
                                            <button class="button expanded" type="button" onclick="login()">登录</button>
                                            <p class="loginclick"><a href="/dongmanshiping/app/home/register.php">创建新账户</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
<script>
    //登录的方法
    function login(){
         var name = $('#name').val();
         var password = $('#password').val();
         var role = 1;
         //ajax提交登录方法
         $.post("/dongmanshiping/app/home/handler/login.handler.php",{name:name,password:password,role:role}, function(data){
            if( data.result == 1 ){
                alert('恭喜你,登录成功');
                window.location.href="/dongmanshiping/"; 
            }else if(data.result == 2){
                alert('恭喜你，管理员登录成功');
                window.location.href="/dongmanshiping/app/admin/index.php"; 
            }
            else{
                alert(data.message);
            }
        },'json');
    }   
</script>