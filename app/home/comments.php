<?php
    // +----------------------------------------------------------------------
    // | 个人资料留言页面
    // +----------------------------------------------------------------------
    //引入配置和常用的函数
    include('../../config/config.php');

    //引入头部公共部分
    include('header-layout.php');

    //获取我的留言数据
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE comments.user_id='$user_id'";
    $comments = fetchAll($link,$sql);
  
?>
 <div class="row" style="margin-top: 30px">
    <?php include("profile-layout.php") ?>
      <div class="large-8 columns profile-inner">
                    <!-- Comments -->
                    <section class="content comments">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="main-heading borderBottom">
                                    <div class="row padding-14">
                                        <div class="medium-12 small-12 columns">
                                            <div class="head-title">
                                                <i class="fa fa-comments"></i>
                                                <h4>我的评论</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            

                              

                                <!-- main comment -->
                                <div class="main-comment showmore_one">
                                <?php
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
                                <?php }} ?>
                                </div><!-- End main comment -->

                            </div>
                        </div>
                    </section><!-- End Comments -->
                </div><!-- end left side content area -->
            </div>





<?php include("footer-layout.php") ?>

