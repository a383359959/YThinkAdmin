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
                <div class="panel panel-default" id="panel">
                    <div class="panel-heading relative"><?php echo ($title); ?><button type="button" class="create btn btn-primary" v-on:click="back">返回</button></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">标题：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="title" placeholder="请输入标题">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">缩略图：</label>
                                <div class="col-sm-5">
                                    <a href="javascript:;"><img v-bind:src="litpic" v-bind:style="{border : 'solid 1px #bebebe'}" width="100" height="100" v-on:click="upload" /></a>
                                    <input type="hidden" name="litpic" v-model="litpic" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">内容：</label>
                                <div class="col-sm-5">
                                    <script id="editor" type="text/plain" style="height:300px;">{{ content }}</script>
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
            title : '<?php echo ($rs["title"]); ?>',
            content : '<?php echo ($rs["content"]); ?>',
            litpic : <?php if($rs['litpic'] != ''): ?>'<?php echo ($rs["litpic"]); ?>'<?php else: ?>'/Public/Admin/images/upload.jpg'<?php endif; ?>,
            default_litpic : '/Public/Admin/images/upload.jpg',
            ue : null,
            editor : null,
        },
        created : function(){
            this.ue = UE.getEditor('editor');
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
                this.content = this.ue.getContent();
                if(this.title == ''){
                    ythink_modal('msg','alert','提示','标题不能为空！','确定',null);
                }else if(this.litpic == this.default_litpic){
                    ythink_modal('msg','alert','提示','请上传缩略图！','确定',null);
                }else if(this.content == ''){
                    ythink_modal('msg','alert','提示','内容不能为空！','确定',null);
                }else{
                    var option = {
                        title : this.title,
                        content : this.content,
                        litpic : this.litpic,
                        type : this.type,
                        id : this.id
                    };
                    ythink_ajax('News/action',option,function(result){
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
                        imageUrl : obj.litpic,
                        clickFn : function(url,title,width,height,border,align){
                            obj.litpic = url;
                            editor.hideDialog();
                        }
                    });
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>