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
                    <div class="panel-heading relative"><?php echo getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME);?><button type="button" class="create btn btn-primary" v-on:click="add">添加</button></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th>名称</th>
                                            <th style="text-align:center;">排序</th>
                                            <th style="text-align:center;">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody class="content">
                                        <tr v-for="(value,index) in list">
                                            <td style="width:10%;text-align:center;">{{value.id}}</td>
                                            <td>{{value.name}}</td>
                                            <td style="width:15%;text-align:center;">{{value.sort}}</td>
                                            <td style="width:15%;text-align:center;"><a v-bind:href="value.url">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;" v-on:click="del(value.id,index)">删除</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
            list : []
        },
        mounted : function(){
            this.loadData();
        },
        methods : {
            add : function(){
                window.location.href = '<?php echo U("education_degree_edit",array("type" => "add"));?>';
            },
            loadData : function(){
                var obj = this;
                var page = 0;
                $('.content').html('');
                $('.dropload-down').remove();
                $('.table').dropload({
                    scrollArea : window,
                    loadDownFn : function(me){
                        page++;
                        var option = {
                            page : page,
                        }
                        ythink_ajax('Resume/education_degree_lists',option,function(result){
                            if(result.list.length > 0){
                                for(var i = 0;i < result.list.length;i++){
                                    obj.list.push(result.list[i]);
                                }
                            }else{
                                me.lock();
                                me.noData();
                            }
                            me.resetload();
                        });
                    }
                });
            },
            del : function(id,index){
                var obj = this;
                var option = {
                    id : id,
                    type : 'del'
                }
                ythink_ajax('Resume/education_degree_action',option,function(result){
                    if(result.status == 'success') obj.list.splice(index,1);
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>