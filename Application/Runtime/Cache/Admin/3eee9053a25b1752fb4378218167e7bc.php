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
                    <div class="panel-heading relative"><?php echo getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME,$_REQUEST['type']);?><button type="button" class="create btn btn-primary" v-on:click="back">返回</button></div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">名称：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="name" placeholder="请输入名称">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">排序：</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" v-model="sort" placeholder="请输入排序">
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