<?php 
    // +----------------------------------------------------------------------
    // | 网站主页
    // +----------------------------------------------------------------------
    include('config/config.php');

    include('header-layout.php'); 
?>
<section id="category" style="margin-top: 30px">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="column row">
                            <div class="heading category-heading clearfix">
                                <div class="cat-head pull-left">
                                    <i class="fa fa-folder-open"></i>
                                    <h4>推荐视频</h4>
                                </div>
                            <div>
                                <div class="navText pull-right show-for-large">
                                    <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                    <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- category carousel -->
                        <div id="owl-demo-cat" class="owl-carousel carousel" data-car-length="6" data-items="6" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-auto-width="true" data-margin="10" data-dots="false">


                        <?php 
                            $tui_sql = "SELECT * FROM movies WHERE tuijian=1 ORDER BY id DESC";
                            $tuis = fetchAll($link,$tui_sql);
                            if(is_array($tuis)){
                                foreach($tuis as $tui){
                        ?>
                            <div class="item-cat item thumb-border">
                                <figure class="premium-img">
                                    <img src="/dongmanshiping/<?php echo $tui['img'] ?>" alt="carousel">
                                    <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $tui['id'] ?>" class="hover-posts">
                                        <span><i class="fa fa-search"></i></span>
                                    </a>
                                </figure>
                                <h6><a href="/dongmanshiping/app/home/detail.php?id=<?php echo $tui['id'] ?>"><?php echo $tui['title'] ?></a></h6>
                            </div>
                        <?php  }} ?>


                        
                        </div><!-- end carousel -->
                        <div class="row collapse">
                            <div class="large-12 columns text-center row-btn">
                                <a href="/dongmanshiping/app/home/category.php" class="button radius">浏览所有视频分类</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Category -->
            <div class="row">
                <!-- left side content area -->
                <div class="large-8 columns">
                    <section class="content content-with-sidebar">
               
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <p class="pull-left">最新视频</span></p>
                                    
                                </div>
                                <div class="tabs-content" data-tabs-content="newVideos">
                                    <div class="tabs-panel is-active" id="new-all">
                                        <div class="row list-group">
                                        <?php 
                                            $new_sql = "SELECT * FROM movies   ORDER BY id DESC limit 4";
                                            $news = fetchAll($link,$new_sql);
                                            if(is_array($news)){
                                                foreach($news as $new){
                                        ?>


                                            <div class="item large-4 medium-6 columns grid-medium end">
                                                <div class="post thumb-border">
                                                    <div class="post-thumb">
                                                        <img src="/dongmanshiping/<?php echo $new['img'] ?>" alt="new video">
                                                        <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $new['id'] ?>" class="hover-posts">
                                                            <span><i class="fa fa-play"></i>查看动漫</span>
                                                        </a>
                                                        <div class="video-stats clearfix">
                                                              <?php if($new['status']==1){?>
                                                            <div class="thumb-stats pull-left">
                                                          
                                                                <h6>会员</h6>
                                                           
                                                            </div>
                                                             <?php } ?>
                                                           
                                                            <div class="thumb-stats pull-right">
                                                                <span><?php echo $new['time'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-des">
                                                        <h6><a href="/dongmanshiping/app/home/detail.php?id=<?php echo $new['id'] ?>"><?php echo $new['title'] ?></a></h6>
                                                        <div class="post-stats clearfix">
                                                           
                                                            <p class="pull-left">
                                                                <i class="fa fa-clock-o"></i>
                                                                <span><?php echo  getTime($new['addtime']) ?></span>
                                                            </p>
                                                            <p class="pull-left">
                                                                <i class="fa fa-eye"></i>
                                                                <span><?php echo $new['view'] ?></span>
                                                            </p>
                                                        </div>
                                                        <div class="post-summary">
                                                            <p><?php echo $new['description'] ?></p>
                                                        </div>
                                                        <div class="post-button">
                                                            <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $new['id'] ?>" class="secondary-button"><i class="fa fa-play-circle"></i>观看视频</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }} ?>


                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="text-center row-btn">
                                    <a class="button radius" href="/dongmanshiping/app/home/category.php">查看所有动漫视频</a>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <!-- popular video -->
                    <section class="content content-with-sidebar" style="margin-top: 20px">
                    
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="row column head-text clearfix">
                                    <p class="pull-left">会员视频</span></p>
                                   
                                </div>
                                <div class="tabs-content" data-tabs-content="popularVideos">
                                    <div class="tabs-panel is-active" id="popular-all">
                                        <div class="row list-group">
                                        <?php 
                                            $member_sql = "SELECT * FROM movies WHERE status=1  ORDER BY id DESC limit 4";
                                            $members = fetchAll($link,$member_sql);
                                            if(is_array($members)){
                                                foreach($members as $member){
                                        ?>
                                            <div class="item large-4 medium-6 columns list">
                                                <div class="post thumb-border">
                                                    <div class="post-thumb">
                                                        <img src="/dongmanshiping/<?php echo $member['img'] ?>" alt="new video">
                                                        <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $member['id'] ?>" class="hover-posts">
                                                            <span><i class="fa fa-play"></i>查看动漫</span>
                                                        </a>
                                                        <div class="video-stats clearfix">
                                                              <?php if($member['status']==1){?>
                                                            <div class="thumb-stats pull-left">
                                                          
                                                                <h6>会员</h6>
                                                           
                                                            </div>
                                                             <?php } ?>
                                                           
                                                            <div class="thumb-stats pull-right">
                                                                <span><?php echo $member['time'] ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-des">
                                                        <h6><a href="/dongmanshiping/app/home/detail.php?id=<?php echo $member['id'] ?>"><?php echo $member['title'] ?></a></h6>
                                                        <div class="post-stats clearfix">
                                                           
                                                            <p class="pull-left">
                                                                <i class="fa fa-clock-o"></i>
                                                                <span><?php echo  getTime($member['addtime']) ?></span>
                                                            </p>
                                                            <p class="pull-left">
                                                                <i class="fa fa-eye"></i>
                                                                <span><?php echo $member['view'] ?></span>
                                                            </p>
                                                        </div>
                                                        <div class="post-summary">
                                                            <p><?php echo $member['description'] ?></p>
                                                        </div>
                                                        <div class="post-button">
                                                            <a href="/dongmanshiping/app/home/detail.php?id=<?php echo $member['id'] ?>" class="secondary-button"><i class="fa fa-play-circle"></i>观看视频</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }} ?>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center row-btn">
                                    <a class="button radius" href="/dongmanshiping/app/home/members.php">所有会员视频</a>
                                </div>
                            </div>
                        </div>
                      
                    </section><!-- End main content -->

                </div><!-- end left side content area -->
                <!-- sidebar -->
                <div class="large-4 columns padding-right-remove">
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
                                            <input class="input-group-field" type="text" name="keyword" placeholder="请输入动漫视频名称">
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


<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
