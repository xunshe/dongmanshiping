<?php 
    // +----------------------------------------------------------------------
    // | 会员视频列表
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');
?>

 <section class="category-content" style="margin-top: 30px">
                <div class="row">
                    <!-- left side content area -->
                    <div class="large-8 columns">
                        <section class="content content-with-sidebar">
                            <!-- newest video -->
                            <div class="main-heading removeMargin">
                                <div class="row secBg padding-14 removeBorderBottom">
                                    <div class="medium-8 small-8 columns">
                                        <div class="head-title">
                                            <i class="fa fa-film"></i>
                                            <h4>会员视频列表</h4>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="row secBg">
                                <div class="large-12 columns">
                                   
                                    <div class="tabs-content" data-tabs-content="newVideos">
                                        <div class="tabs-panel is-active" id="new-all">
                                            <div class="row list-group">

                                         <?php 
                                          $limit = 12;   
                                          
                                            //写查询的sql语句,获取分类下的所有信息
                                            $sql = "SELECT * FROM movies WHERE status=1 ORDER BY id DESC";


                                            $num_max = getTotalRows($link,$sql);
                                            if(isset($_REQUEST['start'])) { 
                                                $start = $_REQUEST['start']; 
                                            }else { 
                                                $start = 0; 
                                            } 
                                            $sql2 = "SELECT * FROM movies  WHERE status=1 ORDER BY id DESC limit $start,$limit"; 
                                    
                                            $pre = $start-$limit;

                                            $next = $start + $limit;
                                            //查询所有信息
                                            $news = fetchAll($link,$sql2);
                                            //判断是否是个数组
                                                if(is_array($news)){
                                                    //遍历每一个标签
                                                        foreach($news as $new) {
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
                                        <?php }}else{ ?>
										<h3 class="text-center" style="margin-top: 50px">抱歉，暂时没有会员视频</h3>
                                        <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pagination">
                                        <?php
                                             if($pre >= 0 ){
                                         ?>
                                         
                                         <a href="/dongmanshiping/app/home/members.php?&start=<?php echo $pre ?>" class="prev page-numbers">« 上一页</a>
                                       
                                        <?php }else{ ?>
                                            <a href="#" class="prev page-numbers">« 上一页</a>
                                        <?php } ?>
                                        <?php 
                                         if($next < $num_max) { ?>
                                        <a href="/dongmanshiping/app/home/members.php?start=<?php echo $next ?>" class="next page-numbers">下一页 »</a>
                                         <?php  }else{?>
                                             <a href="#" class="next page-numbers">下一页 »</a>
                                        <?php } ?></div>
                                    </div>
                            </div>
                        </section>
                        <!-- ad Section -->
                    
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
                                        <form id="searchform" method="get" role="search">
                                            <div class="input-group">
                                                <input class="input-group-field" type="text" placeholder="请输入视频标题">
                                                <div class="input-group-button">
                                                    <input type="submit" class="button" value="Submit">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- End search Widget -->

                                <!-- categories -->
                                <div class="large-12 medium-7 medium-centered columns">
                                    <div class="widgetBox">
                                        <div class="widgetTitle">
                                            <h5>动漫视频分类</h5>
                                        </div>
                                        <div class="widgetContent">
                                            <ul class="accordion" data-accordion>
                                                <li class="accordion-item is-active" data-accordion-item>
                                                    <a href="#" class="accordion-title">选择分类</a>
                                                    <div class="accordion-content" data-tab-content>
                                                       <ul>
                                                        <?php
                                                            $category_sql = "SELECT * FROM categorys";
                                                            $categorys = fetchAll($link,$category_sql);
                                                            if(is_array($categorys)){
                                                                foreach($categorys as $category){
                                                        ?>
                                                           <li class="clearfix">
                                                               <i class="fa fa-play-circle-o"></i>
                                                               <a href="/dongmanshiping/app/home/list.php?id=<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?>
                                                          
                                                                </a>
                                                           </li>
                                                        <?php }} ?>
                                                           
                                                       </ul>
                                                    </div>
                                                </li>
                                             
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div><!-- end sidebar -->
                </div>
            </section><!-- End Category Content-->









<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
