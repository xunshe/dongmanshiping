  <?php
    // +----------------------------------------------------------------------
    // | 后台动漫管理页面
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();
    //引入头部
    include('header-layout.php');

    //获取所有的动漫
    $sql = "SELECT movies.*,categorys.category_name FROM movies INNER JOIN categorys ON movies.category_id=categorys.id ORDER BY movies.id DESC";

    $movies = fetchAll($link,$sql);
?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">动漫视频管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="/dongmanshiping/app/admin/add_movie.php"><button class="btn btn-success">上传视频</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>编号</th>
                                            <th>封面</th>
                                            <th>标题</th>
                                            <th>分类</th>
                                            <th>时长</th>
                                            <th>会员</th>
                                            <th>推荐</th>
                                            <th>上传时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(is_array($movies)){
                                        //遍历每一个用户
                                        foreach($movies as $key=>$movie) {
                                    ?>
                                        <tr>
                                            <td><?php echo $key+1 ?></td>
                                            <td><img width="50px" src="/dongmanshiping/<?php echo $movie['img'] ?>" ></td>
                                            <td><?php echo $movie['title'] ?></td>
                                           
                                            <td><?php echo $movie['category_name'] ?></td>
                                            <td><?php echo $movie['time'] ?></td>
                                            <td>
                                                <?php echo $movie['status']==0?"否":"是" ?>
                                            </td>
                                             <td>
                                                <?php echo $movie['tuijian']==0?"否":"是" ?>
                                            </td>
                                            <td><?php echo getTime($movie['addtime']) ?></td>
                                           <td> 
                                            <a href="javascript:void(0)" onclick="del(<?php echo $movie['id'] ?>,'movies')"><button class="btn btn-denger btn-small">删除</button></a>
                                            <a href="/dongmanshiping/app/admin/edit_movies.php?id=<?php echo $movie['id'] ?>"><button class="btn btn-primary btn-small">修改</button></a>
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
            function del(id,table) {
                 if(confirm('确定删除此视频数据吗？')){
                $.post('/dongmanshiping/app/admin/handler/del.handler.php',{id:id,table:table},function(data){
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