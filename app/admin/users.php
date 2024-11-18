 <?php
    // +----------------------------------------------------------------------
    // | 后台会员管理页面
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
                    <h1 class="page-header">会员管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>昵称</th>
                                            <th>邮箱</th>
                                            <th>vip</th>
                                            <th>注册时间</th>
                                            <th>操作事项</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                    //写查询用户的sql语句,获取用户，除了管理员
                                    $sql = 'SELECT * FROM users where is_admin = 0';

                                    //查询所有用户
                                    $users = fetchAll($link,$sql);
                                    //判断users是否是个数组
                                    if(is_array($users)){
                                        //遍历每一个用户
                                        foreach($users as $user) {
                                    ?>
                                        <tr>
                                             <td><?php echo $user['id']?></td>
                                            <td><?php echo $user['name']?></td>
                                            <td><?php echo $user['email']?></td>
                                            <td><?php echo $user['is_vip']==1?"是":"否" ?></td>
                                            <td><?php echo $user['addtime']?></td>
                                            <td>
                                                <a href="javascript:void(0)" onclick="deluser(<?php echo $user['id'] ?>,'users')"  class="label label-danger">删除</a>
                                            </td>
                                        </tr> 
                                    <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        <?php include('footer-layout.php'); ?>

 
<script>
    //删除用户的方法
    function deluser(id,table) {
        if(confirm('确定删除此用户包括此用户的歌曲和评论吗？')){
        $.post('/dongmanshiping/app/admin/handler/del_user.handler.php',{id:id,table:table},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
        }else{
            return false;
        }
    }
</script>