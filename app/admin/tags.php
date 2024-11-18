<?php
    // +----------------------------------------------------------------------
    // | 后台动漫分类管理
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
 
  <div id="page-wrapper">
        <section id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">动漫分类列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/dongmanshiping/app/admin/add_category.php"><button class="btn btn-success">添加分类</button></a>
                                </div>
                            </div>
                        </div>
                        <div class=" table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>编号</th>
                                    <th>分类名</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                <?php
                                    //写查询分类的sql语句,获取所有分类
                                    $sql = 'SELECT * FROM categorys ORDER BY id ASC';
                                    //查询所有分类
                                    $categorys = fetchAll($link,$sql);
                                    //判断是否是个数组
                                    if(is_array($categorys)){
                                        //遍历每一个分类
                                        foreach($categorys as $category) {
                                ?>

                                <tr>
                                    <td><?php echo $category['id'] ?></td>
                                    <td><?php echo $category['category_name'] ?></td>
                                    <td><?php echo $category['addtime'] ?></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="delcategory(<?php echo $category['id'] ?>,'categorys')"  class="label label-danger">删除</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>

<script>
    //删除分类的方法
    function delcategory(id,table) {
        if(confirm('确定删除此数据吗？')){
        $.post('/dongmanshiping/app/admin/handler/del_category.handler.php',{id:id,table:table},function(data){
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



<?php include('footer-layout.php'); ?>






