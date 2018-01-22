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
                <div class="panel panel-default" id="panel">
                    <div class="panel-heading relative"><?php echo getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME,$_REQUEST['type']);?><button type="button" class="create btn btn-primary" v-on:click="back">返回</button></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">密码：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="password" placeholder="密码若为空，则不改变">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">头像：</label>
                                <div class="col-sm-5">
                                    <a href="javascript:;"><img v-bind:src="headimg" v-bind:style="{border : 'solid 1px #bebebe'}" width="100" height="100" v-on:click="upload" /></a>
                                    <input type="hidden" name="headimg" v-model="headimg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入姓名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别：</label>
                                <div class="col-sm-5">
                                    <select v-model="sex" class="form-control">
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
    </div>
</div>
<script>
    new Vue({
        el : '#panel',
        data : {
            id : '<?php echo ($_GET['id']); ?>',
            type : '<?php echo ($_GET['type']); ?>',
            name : '<?php echo ($rs["name"]); ?>',
            headimg : <?php if($rs['headimg'] != ''): ?>'<?php echo ($rs["headimg"]); ?>'<?php else: ?>'/Public/Admin/images/upload.jpg'<?php endif; ?>,
            default_headimg : '/Public/Admin/images/upload.jpg',
            sex : '<?php echo ($rs["sex"]); ?>',
            password : '',
            editor : null,
        },
        created : function(){
            this.editor = KindEditor.editor({
                allowFileManager : true
            });
        },
        methods : {
            back : function(){
                window.location.href = '<?php echo U("index");?>';
            },
            submit : function(){
                var obj = this;
                if(this.name == ''){
                    ythink_modal('msg','alert','提示','姓名不能为空！','确定',null);
                }else if(this.headimg == this.default_headimg){
                    ythink_modal('msg','alert','提示','请上传头像！','确定',null);
                }else{
                    var option = {
                        name : this.name,
                        headimg : this.headimg,
                        sex : this.sex,
                        password : this.password,
                        type : this.type,
                        id : this.id
                    };
                    ythink_ajax('User/action',option,function(result){
                        if(result.status == 'success') obj.back();
                    });
                }
            },
            upload : function(){
                var editor = this.editor;
                var obj = this;
                editor.loadPlugin('image',function(){
                    editor.plugin.imageDialog({
                        showRemote : false,
                        imageUrl : obj.headimg,
                        clickFn : function(url,title,width,height,border,align){
                            obj.headimg = url;
                            editor.hideDialog();
                        }
                    });
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>