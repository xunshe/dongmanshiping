<?php
    // +----------------------------------------------------------------------
    // | change password
    // +----------------------------------------------------------------------

    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 15%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;修改密码</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="/app/home/handler/changePassword2.handler.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;你的新密码</label>
                                <input  class="form-control input-lg" name="password" type="password" value="">
                            </div>
                             <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;重复密码</label>
                                <input id="password_o" class="form-control input-lg" name="password_o" type="password" value="">
                            </div>
                            <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>">
                            <div class="col-md-12" id="error_password"></div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">修改密码</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php          
    //footer
    include('footer-layout.php');
?>
