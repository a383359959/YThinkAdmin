<?php if (!defined('THINK_PATH')) exit(); echo W('Common/header');?>
<div id="wrappar">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="navbar-header">
            <a href="javascript:;" class="navbar-brand"><?php echo C('COMPANY_NAME');?></a>
        </div>
        <?php echo W('Common/left');?>
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">简历名称</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">名称：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" v-on:click="submit">完成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">个人信息</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <select name="" id="" class="form-control">
                                        <option value="0">男</option>
                                        <option value="1">女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" v-on:click="submit">完成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">教育背景</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <select name="" id="" class="form-control">
                                        <option value="0">男</option>
                                        <option value="1">女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" v-on:click="submit">完成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">工作、实习经历</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <select name="" id="" class="form-control">
                                        <option value="0">男</option>
                                        <option value="1">女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" v-on:click="submit">完成</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading relative">自我评价</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" rows="11"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <button type="button" class="btn btn-primary" v-on:click="submit">完成</button>
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
    new Vue({
        el : '#page-wrapper',
        data : {
            id : '<?php echo ($_GET['id']); ?>',
            type : '<?php echo ($_GET['type']); ?>',
            name : '<?php echo ($rs["name"]); ?>',
            sort : '<?php echo ($rs["sort"]); ?>'
        },
        methods : {
            back : function(){
                window.location.href = '<?php echo U("education_degree");?>';
            },
            submit : function(){
                var obj = this;
                if(this.name == ''){
                    ythink_modal('msg','alert','提示','名称不能为空！','确定',null);
                }else if(this.sort == ''){
                    ythink_modal('msg','alert','提示','排序不能为空！','确定',null);
                }else{
                    var option = {
                        name : this.name,
                        sort : this.sort,
                        type : this.type,
                        id : this.id
                    };
                    ythink_ajax('Resume/education_degree_action',option,function(result){
                        if(result.status == 'success') obj.back();
                    });
                }
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>