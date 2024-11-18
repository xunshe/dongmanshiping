<?php
    // +----------------------------------------------------------------------
    // | 注册页面
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
                                    <span class="show-for-sr">当前页: </span> 注册
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
                              
                            </div>
                            <div class="row" data-equalizer data-equalize-on="medium" id="test-eq" >
                              
                             <div class="large-4 medium-6 columns end" style="margin-left:35%">
                                    <div class="register-form">
                                        <h5 class="text-center">创建新账户</h5>
                                        <form data-abide novalidate>
                                            <div data-abide-error class="alert callout" style="display: none;">
                                                <p><i class="fa fa-exclamation-triangle"></i> There are some errors in your form.</p>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-user"></i></span>
                                                <input class="input-group-field" type="text" id="name" placeholder="请输入用户名" required>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                                <input class="input-group-field" type="email" id="email" placeholder="请输入邮箱" required>
                                            </div>

                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                                <input type="password" id="password" placeholder="请输入密码" required>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                                <input type="password" id="password_o" placeholder="请重复输入密码" required pattern="alpha_numeric" data-equalto="password">
                                            </div>
                                            <span class="form-error">your email is invalid</span>
                                            <button class="button expanded" type="button" onclick="register()">立即注册</button>
                                            <p class="loginclick"> <a href="/dongmanshiping/app/home/login.php">已有账户，登录</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


<script>
    //注册的方法
    function register(){
         var name = $('#name').val();
         var email = $('#email').val();
         var password_o = $('#password_o').val();
         var password = $('#password').val();
         $.post("/dongmanshiping/app/home/handler/register.handler.php",{name:name,email:email,password_o:password_o,password:password}, function(data){
            if( data.result == 1 ){
                alert('注册成功');
                window.location.href="/dongmanshiping/app/home/login.php"; 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }   
</script>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
