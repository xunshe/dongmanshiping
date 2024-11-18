  <?php
    // +----------------------------------------------------------------------
    // | 后台添加动漫标签页面
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>



  <div id="page-wrapper">
        <div class="col-md-6 col-md-offset-3">
            <section class="content" id="showcontent">
                <div class="row" style="margin-top: 10%">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">添加分类</h3>
                            </div>
                        
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="input_name">动漫分类名称</label>
                                        <input type="text" class="form-control" id="category_name" placeholder="请输入动漫分类名称！">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" onclick="addcate()">添加</button>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--内容-->
    </div>
    <script>
        //保存分类方法
        function addcate() {
            var category_name = $('#category_name').val();

            $.post('/dongmanshiping/app/admin/handler/add_category.handler.php',{category_name:category_name},function(data){
                if(data.result == 1){
                    alert(data.message);
                   window.location.href="/dongmanshiping/app/admin/tags.php"
                }
                if(data.result == 0){
                    alert(data.message);
                }
            },'json')
        }



    </script>


    <?php include('footer-layout.php') ?>