<?php
    // +----------------------------------------------------------------------
    // | 个人显示资料 页面
    // +----------------------------------------------------------------------
    
    //引入配置和常用的函数
    include('../../config/config.php');
    
    //引入头部公共部分
    include('header-layout.php');

    //获取当前用户的个人信息
    $id = $_SESSION['user']['id'];  //获取用户id
    $sql = "SELECT * FROM users WHERE id='$id'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql); //获取用户信息

     //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后再发布信息')</script>";
            redirect('/dongmanshiping/app/home/login.php');
    } 

  
?>
 <div class="row" style="margin-top: 30px">
                <?php include("profile-layout.php") ?>
             <div class="large-8 columns profile-inner">
                    <!-- profile settings -->
                    <section class="profile-settings">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-gears"></i>
                                    <h4>个人资料设置</h4>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <div class="setting-form">
                                            <form method="post" action="/dongmanshiping/app/home/handler/profile.handler.php"  enctype="multipart/form-data">
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                
                                                        <div class="medium-6 columns">
                                                            <label>用户名
                                                                <input type="text" value="<?php echo $user['name'] ?>" required name="name">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>地址
                                                                <input name="address" value="<?php echo $user['address'] ?>"  type="text" placeholder="请输入居住地址">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>邮箱
                                                                <input name="email" required value="<?php echo $user['email'] ?>" type="text" placeholder="请输入邮箱">
                                                            </label>
                                                        </div>
                                                        <div class="medium-6 columns">
                                                            <label>电话
                                                                <input name="phone" value="<?php echo $user['phone'] ?>" type="text" placeholder="请输入电话">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                <div class="setting-form-inner">
                                                    <div class="row">
                                                        <div class="medium-6 columns">
                                                            <label>头像:
                                                            <input type="file" name="avatar">
                                                            <img src="/dongmanshiping/<?php echo $user['avatar'] ?>">
                                                            </label>
                                                        </div>
                                                        <div class="medium-12 columns">
                                                            <label>个人简介:
                                                                <textarea name="info"><?php echo $user['info'] ?></textarea>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="setting-form-inner">
                                                    <button class="button expanded" type="submit" name="setting">更新</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End profile settings -->
                </div><!-- end left side content area -->
            </div>

            </div>
<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
