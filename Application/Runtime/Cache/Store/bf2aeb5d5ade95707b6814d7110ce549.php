<?php if (!defined('THINK_PATH')) exit(); echo W('Common/header');?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">欢迎登陆</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入用户名" name="username" type="text" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入密码" name="password" type="password" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="记住密码">记住密码
                                </label>
                            </div>
                            <a href="javascript:;" class="btn btn-lg btn-success btn-block">登陆</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.btn').bind('click',function(){
            var option = {
                username : $('input[name="username"]').val(),
                password : $('input[name="password"]').val()
            };
            $.ajax({
                url : '<?php echo U("checkLogin");?>',
                data : option,
                dataType : 'json',
                success : function(result){
                    if(result.status == 'success'){
                        window.location.href = '<?php echo U("index");?>';
                    }else{
                        alert(result.msg);
                        if(result.focus != null) $(result.focus).focus();
                    }
                }
            });
        });
    });
</script>

<?php echo W('Common/bottom');?>