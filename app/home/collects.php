<?php
    // +----------------------------------------------------------------------
    // | 个人资料我的收藏
    // +----------------------------------------------------------------------
    include('../../config/config.php');
    //引入头部公共部分
    include('header-layout.php');

       //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后在查看')</script>";
            redirect('/dongmanshiping/app/home/login.php');
    } 

    //获取我的收藏视频
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT collects.*,users.name,movies.title,movies.img,movies.description,movies.title,movies.id as ids FROM collects INNER JOIN users ON users.id=collects.user_id INNER JOIN movies ON movies.id=collects.movie_id where collects.user_id='$user_id'";
    $collects = fetchAll($link,$sql);
  
?>
 <div class="row" style="margin-top: 30px">
                <?php include("profile-layout.php") ?>
   <div class="large-8 columns profile-inner">
                    <!-- single post description -->
                    <section class="profile-videos">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <i class="fa fa-video-camera"></i>
                                    <h4>我的收藏</h4>
                                </div>

                                <?php 
                                  if(is_array($collects)){
                                    foreach ($collects as $collect) {
                                 ?>
                                <div class="profile-video">
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section media-img-content">
                                            <div class="video-img">
                                                <img src="/dongmanshiping/<?php echo $collect['img'] ?>" alt="video thumbnail">
                                            </div>
                                        </div>
                                        <div class="media-object-section media-video-content">
                                            <div class="video-content">
                                                <h5><a href="/dongmanshiping/app/home/detail.php?id=<?php echo $collect['ids'] ?>"><?php echo $collect['title'] ?></a></h5>
                                                <p><?php echo $collect['description'] ?></p>
                                            </div>
                                            <div class="video-detail clearfix">
                                              
                                                <div class="video-btns">
                                                    <a class="video-btn" onclick="del(<?php echo $collect['id'] ?>)"><i class="fa fa-trash"></i>删除</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }}else{ ?>
                                <h3>暂无收藏</h3>
                                <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                    </section><!-- End single post description -->
                </div><!-- end left side content area -->
            </div>



<script>

    function del(id){
    
         $.post("/dongmanshiping/app/home/handler/del_collect.handler.php",{id:id}, function(data){
            if( data.result == 1 ){
                alert(data.message);
                window.location.reload();
             }
            else{
                alert(data.message);
            }
        },'json');
    }   
</script>
<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
