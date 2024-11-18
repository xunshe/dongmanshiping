<?php
	// +----------------------------------------------------------------------
    // | 后台管理员个人信息管理页面
    // +----------------------------------------------------------------------
	
	//引用常用的函数
	require_once('../../config/config.php');

	//判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
	validateAdmin();
	//引入头部
	include('header-layout.php');

    //获取此管理员信息
    $sql = "SELECT * FROM users WHERE is_admin=1";
    $admin = fetchOne($link,$sql);

?>
  <div id="page-wrapper">
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">管理员信息</h3>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-warning">
                                    <div class="panel-body">
                                        <form role="form" action="/app/admin/handler/profile.handler.php" method="post" enctype=multipart/form-data>
                                            <fieldset>
                                                    <div class="form-group">
                                                        <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;用户名</label>
                                                        <input id="input_name" class="form-control" disabled placeholder="昵称" value="<?php echo $admin['name'] ?>" name="name" type="text" autofocus value="jinlong">
                                                    </div>
                                                    <div class="col-md-12" id="error_name"></div>
                                                    <div class="form-group">
                                                        <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;邮箱</label>
                                                        <input id="input_email" class="form-control" disabled  value="<?php echo $admin['email'] ?>" name="email" type="email" autofocus value="1780316635@qq.com">
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone"><span class="glyphicon glyphicon-phone"></span>&nbsp;手机</label>
                                                        <input id="input_phone" class="form-control" placeholder="手机" name="phone" value="<?php echo $admin['phone'] ?>" type="text" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_email"></div>
                                                    <div class="form-group">
                                                        <label for="input_phone"><span class="glyphicon glyphicon-flag"></span>&nbsp;住址</label>
                                                        <input id="input_phone" class="form-control" placeholder="住址" value="<?php echo $admin['address'] ?>" name="address" type="text" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_phone"></div>
                                                    <div class="form-group">
                                                        <label for="input_face"><span class="glyphicon glyphicon-picture"></span>&nbsp;头像修改</label>
                                                        <input id="input_face" class="form-control" name="avatar" type="file" autofocus>
                                                    </div>
                                                    <div class="col-md-12" id="error_face"></div>
                                                    <div class="form-group">
                                                        <label for="input_info"><span class="glyphicon glyphicon-edit"></span>&nbsp;个人简介</label>
                                                        <textarea class="form-control" rows="10" name="info"><?php echo $admin['info'] ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="col-md-12" id="error_info"></div>
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;保存修改</button>
                                                </fieldset>
                                    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>


<?php include('footer-layout.php'); ?>
