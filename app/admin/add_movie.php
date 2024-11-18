  <?php
    // +----------------------------------------------------------------------
    // | 后台上传动漫视频
    // +----------------------------------------------------------------------
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
<div id="page-wrapper">
 
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">动漫视频添加</h3>
                        </div>
                        <form role="form" action="/dongmanshiping/app/admin/handler/add_movie.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">动漫名称</label>
                                    <input type="text" class="form-control" name="title" placeholder="请输入动漫名称！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">动漫分类</label>
                                              <select class="form-control" name="category_id">
                                                <?php 
                                                    //获取所有的分类
                                                    $sql = "SELECT * FROM categorys";
                                                    $stars = fetchAll($link,$sql);
                                                    if(is_array($stars)){
                                                        foreach ($stars as $star) {                                                           
                                                ?>

                                                <option value="<?php echo $star['id'] ?>"><?php echo $star['category_name'] ?></option>
                                                  <?php }}?>
                                              </select>
                                </div>
                                <div class="form-group">
                                    <label for="input_title">是否会员视频</label>
                                        <select class="form-control" name="status">
                                               
                                                <option value="1">是</option>
                                                <option selected value="0">否</option>
                                                 
                                        </select>
                                </div>
                                  <div class="form-group">
                                    <label for="input_title">是否推荐视频</label>
                                        <select class="form-control" name="tuijian">
                                               
                                                <option value="1">是</option>
                                                <option selected value="0">否</option>
                                                 
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="input_title">时长（格式：04.11）</label>
                                    <input type="text" class="form-control"  name="time" placeholder="请输入视频时长！">
                                </div>
                                <div class="form-group">
                                    <label for="logo">上传视频封面</label>
                                    <input type="file"  name="img">   
                                </div>
                                 <div class="form-group">
                                    <label for="logo">上传视频(请选择MP4格式)</label>
                                    <input type="file" name="path">   
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">视频描述</label>
                                    <textarea id="textarea1"  class="form-control" rows="10" name="description"></textarea>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">上传</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>



  
<?php include('footer-layout.php') ?>   