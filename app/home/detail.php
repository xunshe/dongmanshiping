 <?php 
    // +----------------------------------------------------------------------
    // | 动漫视频详情页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    //获取动漫视频详情
    $id = $_GET['id'];
    $sql = "select * from movies WHERE id='$id'";
    $movie = fetchOne($link,$sql);


    //判断用户有没有登录
    //获取当前用户的个人信息
    $user_id = $_SESSION['user']['id'];  //获取用户id
    $sql = "SELECT * FROM users WHERE id='$user_id'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql); //获取用户信息

     //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后再看视频')</script>";
            redirect('/dongmanshiping/app/home/login.php');
    } 


    //判断此视频是否vip视频
    if($movie['status']==1) {
        if($user['is_vip']!=1) {
            notice("抱歉，此视频为会员视频，请升级为会员","/dongmanshiping");
        }
    }
?>  
            <section class="fullwidth-single-video">
                <div class="row">
                    <div class="large-12 columns">
                        <div class="flex-video widescreen">
                            <video src="/dongmanshiping/<?php echo $movie['path'] ?>" width="320" height="240" controls="controls">
                            Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <!-- left side content area -->
                <div class="large-8 columns">
                    <!-- single post stats -->
                    <section class="SinglePostStats">
                        <!-- newest video -->
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="media-object stack-for-small">
                                
                                    <div class="media-object-section object-second">
                                        <div class="author-des clearfix">
                                            <div class="post-title">
                                                <h4><?php echo $movie['title'] ?>(<?php echo $movie['status']==1?"会员":"" ?>)</h4>
                                               
                                            </div>
                                          
                                             <button type="button" onclick="collect(<?php echo $movie['id'] ?>)" name="fav" style="margin-left: 20px"><i class="fa fa-heart"></i>收藏</button>
                                            <script>
                                                function collect(id) {
                                                    //用户点击收藏
                                                     $.post('/dongmanshiping/app/home/handler/collection.handler.php',{id:id},function(data){
                                                            if(data.result == 1) {
                                                                alert(data.message);
                                                                window.location.reload();
                                                            }
                                                            if(data.result == 0){
                                                                alert(data.message);
                                                            }
                                                    },'json');      
                                                }
                                                    

                                            </script>
                                           
                                        </div>
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End single post stats -->

                    <!-- single post description -->
                    <section class="singlePostDescription">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <h5>简述</h5>
                                </div>
                                <div class="description showmore_one">
                                    <p><?php echo $movie['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </section><!-- End single post description -->

                    
                    <!-- Comments -->
                    <section class="content comments">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="main-heading borderBottom">
                                    <div class="row padding-14">
                                        <div class="medium-12 small-12 columns">
                                            <div class="head-title">
                                                <i class="fa fa-comments"></i>
                                                <h4>评论</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <?php
                                    //判断有没有开启session 
                                    if(!isset($_SESSION)) {
                                    //如果没有开启，那么开启  
                                         @session_start();  
                                    }
                                    if(isset($_SESSION['user'])) {
                                 ?>
                                <div class="comment-box thumb-border">
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "/dongmanshiping/<?php echo $_SESSION['user']['avatar'] ?>" alt="comment">
                                            </div>
                                            <h6><a href="#"><?php echo $_SESSION['user']['name'] ?></a></h6>
                                        </div>
                                        <div class="media-object-section comment-textarea">
                                            <form method="post" action="/dongmanshiping/app/home/handler/comment.handler.php">
                                                <textarea name="comment_content" placeholder="请输入评论"></textarea>
                                                <input name="movie_id" type="hidden" value="<?php echo $id ?>">
                                                <input type="submit" name="submit" value="发送">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                               <?php } ?>
                             
                                <!-- main comment -->
                                <div class="main-comment showmore_one">
                                    <?php
                                        $comment_sql = "select * FROM comments inner join users on users.id=comments.user_id where comments.movie_id='$id' AND comments.status=1";
                                        $comments = fetchAll($link,$comment_sql);
                                        if(is_array($comments)){
                                            foreach($comments as $comment){
                                    ?>
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "/dongmanshiping/<?php echo $comment['avatar'] ?>" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#"><?php echo $comment['name'] ?></a></span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i><?php echo getTime($comment['addtime']) ?></span>
                                            </div>
                                            <div class="comment-text">
                                                <p><?php echo $comment['comment_content'] ?>.</p>
                                            </div>
                                        
                                    

                                        </div>
                                    </div>
                                <?php  }} ?>

                                  
                               
                                </div><!-- End main comment -->

                            </div>
                        </div>
                    </section><!-- End Comments -->
                </div><!-- end left side content area -->
                <!-- sidebar -->
                <div class="large-4 columns">
                    <aside class="secBg sidebar">
                        <div class="row">
                            <!-- search Widget -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>搜索视频</h5>
                                    </div>
                                    <form id="searchform" method="get" action="/dongmanshiping/app/home/search.php" role="search">
                                        <div class="input-group">
                                            <input class="input-group-field" type="text" name="keyword" placeholder="请输入搜索视频标题">
                                            <div class="input-group-button">
                                                <input type="submit" class="button" value="搜索">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- End search Widget -->

                            <!-- most view Widget -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>最多播放</h5>
                                    </div>
                                    <div class="widgetContent">
                                       <?php 
                                            $most_sql = "SELECT * FROM movies ORDER BY view DESC limit 4";
                                            $mosts = fetchAll($link,$most_sql);
                                            if(is_array($mosts)){
                                                foreach($mosts as $most){
                                        ?>
                                        <div class="video-box thumb-border">
                                            <div class="video-img-thumb">
                                                <img src="/dongmanshiping/<?php echo $most['img'] ?>" alt="most viewed videos">
                                                <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $most['id'] ?>" class="hover-posts">
                                                    <span><i class="fa fa-play"></i>观看视频</span>
                                                </a>
                                            </div>
                                            <div class="video-box-content">
                                                <h6><a href="/dongmanshiping/app/home/detail.php?id=<?php echo $most['id'] ?>"><?php echo $most['title'] ?></a></h6>
                                                <p>
                                                    
                                                    <span><i class="fa fa-clock-o"></i><?php echo getTime($most['addtime']) ?></span>
                                                    <span><i class="fa fa-eye"></i><?php echo $most['view'] ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <?php }} ?>
                                        
                                    </div>
                                </div>
                            </div><!-- end most view Widget -->

                            

                           
                        </div>
                    </aside>
                </div><!-- end sidebar -->
            </div>

            <!-- footer -->
            <footer>
<?php include('footer-layout.php') ?>