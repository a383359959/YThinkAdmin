<?php if (!defined('THINK_PATH')) exit(); echo W('Common/header');?>
<div class="container">
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">网站管理系统</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入用户名" name="username" type="text" v-model="username" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="请输入密码" name="password" type="password" v-model="password" />
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="记住密码">记住密码
                                </label>
                            </div>
                            <a href="javascript:;" class="btn btn-lg btn-success btn-block" v-on:click="submit">登陆</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    new Vue({
        el : '#form',
        data : {
            username : '',
            password : ''
        },
        methods : {
            submit : function(){
                var option = {
                    username : this.username,
                    password : this.password
                }
                ythink_ajax('Index/checkLogin',option,function(result){
                    if(result.status == 'success'){
                            window.location.href = '<?php echo U("index");?>';
                    }else{
                        ythink_modal('msg','alert','提示',result.msg,'确定',function(){
                            if(result.focus != null) $(result.focus).focus();
                        });
                    }
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>