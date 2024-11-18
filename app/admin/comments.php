 <?php
    // +----------------------------------------------------------------------
    // | 后台管理评论页面
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
                    <h1 class="page-header">用户评论管理列表</h1>
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
                                            <th>评论用户名</th>
                                            <th>评论内容</th>
                                            <th>评论时间</th>
                                            <th>审核结果</th>
                                            <th>操作</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php
                                      //写查询所有用户评论的sql语句
                                      $sql = "SELECT users.name,comments.* FROM comments INNER JOIN users ON users.id=comments.user_id";

                                      //查询所有评论
                                      $results = fetchAll($link,$sql);

                                      //判断是否是个数组
                                      if(is_array($results)){
                                          //遍历每一个用户评论
                                          foreach($results as $result) {

                                  ?>
                                         <tr>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php echo mb_substr($result['comment_content'], 0,40); ?></td>
                                    <td><?php echo $result['addtime'] ?></td>
                                    <td>
                                        <?php if($result['status'] == 1) { ?>
                                        <button class="btn btn-success">通过</button>
                                        <?php }else{ ?>
                                        <button class="btn btn-danger">未通过</button>
                                        <?php } ?>
                                    </td>
                              
                                    <td>
                                        <a class="label label-danger" onclick="del(<?php echo $result['id'] ?>,'comments')">删除</a>
                                        <a class="label label-info" onclick="check_comment(<?php echo $result['id'] ?>)">审核</a>
                                    </td>
                                </tr>
                                <?php }} ?>
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
    //删除的方法
    function del(id,table) {
        if(confirm('确定删除此评论吗？')){
        $.post('/dongmanshiping/app/admin/handler/del_comment.handler.php',{id:id,table:table},function(data){
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

    //审核的方法
    function check_comment(id){
         $.post('/dongmanshiping/app/admin/handler/check_comment.handler.php',{id:id},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
    }
</script>
