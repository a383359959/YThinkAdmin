<?php if (!defined('THINK_PATH')) exit(); echo W('Common/header');?>

<div id="wrappar">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <a href="javascript:;" class="navbar-brand">管理中心</a>
        </div>
        <?php echo W('Common/left');?>
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">创建支付<button type="button" class="create btn btn-primary">返回</button></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最低金额：</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                            <span class="input-group-addon">￥</span>
                                        <input type="text" class="form-control" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">充值信息：</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" placeholder="请输入充值信息" id="" rows="10"></textarea>
                                    <div class="panel panel-green" style="margin-top:15px;margin-bottom:0px;">
                                        <div class="panel-heading">说明</div>
                                        <div class="panel-body">
                                            <p>1、充值信息是用户付款时预留的信息，例如账号等；</p>
                                            <p>2、充值信息是跟数据库执行语句息息相关的；</p>
                                            <p>3、创建方法是中文名称|英文名称，多个请用逗号隔开，请注意这里的符号都是在英文状态下输入的；</p>
                                            <p>4、例如：账号|username,密码|password,QQ号|qq</p>
                                            <p>5、数据库执行语句（MySQL）就可以这么写：SELECT * FROM db_name WHERE username = "{$username}"，{$username}就等于上面输入的某一个英文名称；</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">支付方式：</label>
                                <div class="col-sm-5">
                                    <label class="checkbox-inline">
                                        <input type="checkbox">&nbsp;支付宝
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">&nbsp;微信
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">&nbsp;银联支付
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库类型：</label>
                                <div class="col-sm-5">
                                    <select class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="MySQL">MySQL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库地址：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入数据库地址">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库端口：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入数据库端口">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库编码：</label>
                                <div class="col-sm-5">
                                    <select class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="UTF-8">UTF-8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库名称：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入数据库名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库登陆用户：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入数据库登陆用户">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库登陆密码：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="请输入数据库登陆密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">数据库执行语句：</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" placeholder="请输入数据库执行语句" id="" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary">创建</button>&nbsp;&nbsp;<button type="button" class="btn btn-info">预览</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.create').bind('click',function(){
            window.location.href = '<?php echo U("lists");?>';
        });
    });
</script>

<?php echo W('Common/bottom');?>