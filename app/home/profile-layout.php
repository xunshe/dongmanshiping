 <div class="large-4 columns">
                    <aside class="secBg sidebar">
                        <div class="row">
                            <!-- profile overview -->
                            <div class="large-12 columns">
                                <div class="widgetBox">
                                    <div class="widgetTitle">
                                        <h5>个人资料</h5>
                                    </div>
                                    <div class="widgetContent">
                                        <ul class="profile-overview">
                                            <li class="clearfix"><a href="/dongmanshiping/app/home/collects.php"><i class="fa fa-heart"></i>我的收藏</a></li>
                                            <li class="clearfix"><a href="/dongmanshiping/app/home/comments.php"><i class="fa fa-comments-o"></i>我的评论</a></li>
                                            <li class="clearfix"><a href="/dongmanshiping/app/home/profile.php"><i class="fa fa-gears"></i>个人资料</a></li>
                                            <li class="clearfix"><a href="javascript:void(0)" onclick="logout()"><i class="fa fa-sign-out"></i>退出</a></li>
                                        </ul>
                                      <a href="javascript:void(0)" class="button" onclick="plus()"><i class="fa fa-plus-circle"></i>升级会员</a>
                                    </div>
                                </div>
                            </div><!-- End profile overview -->
                        </div>
                    </aside>
                </div><!-- end sidebar -->
                <script>
                    function plus() {
                    if(confirm('每月支付10元，升级为会员')){
                        $.post('/dongmanshiping/app/home/handler/plus.handler.php',{},function(data){
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