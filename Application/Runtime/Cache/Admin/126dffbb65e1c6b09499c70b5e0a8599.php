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
                    <div class="panel-heading relative"><?php echo getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME);?></div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">#</th>
                                        <th>用户名</th>
                                        <th style="text-align:center;">角色</th>
                                        <th style="text-align:center;">注册IP</th>
                                        <th style="text-align:center;">注册时间</th>
                                        <th style="text-align:center;">省 / 市 / 区</th>
                                        <th style="text-align:center;">机构名称</th>
                                        <th style="text-align:center;">操作</th>
                                    </tr>
                                </thead>
                                <tbody class="content">
                                    <tr v-for="(value,index) in list">
                                        <td style="text-align:center;">{{value.id}}</td>
                                        <td>{{value.username}}</td>
                                        <td style="text-align:center;">{{value.role_name}}</td>
                                        <td style="text-align:center;">{{value.reg_ip}}</td>
                                        <td style="text-align:center;">{{value.add_time}}</td>
                                        <td style="text-align:center;">{{value.position}}</td>
                                        <td style="text-align:center;">{{value.mechanism_name}}</td>
                                        <td style="text-align:center;"><span v-if="value.status == 0"><a v-on:click="change_status(value.id,index,1)" href="javascript:;">同意</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a v-on:click="change_status(value.id,index,2)" href="javascript:;">拒绝</a></span><span v-else-if="value.status == 1"><a v-on:click="change_status(value.id,index,2)" href="javascript:;">拒绝</a></span><span v-else-if="value.status == 2"><a v-on:click="change_status(value.id,index,1)" href="javascript:;">同意</a></span></td>
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
            list : [],
            user_id : '<?php echo ($_GET['user_id']); ?>'
        },
        mounted : function(){
            this.loadData();
        },
        methods : {
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
                            user_id : obj.user_id,
                        }
                        ythink_ajax('User/account_lists',option,function(result){
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
            change_status : function(id,index,status){
                var obj = this;
                var option = {
                    id : id,
                    status : status
                }
                ythink_ajax('User/changeStatus',option,function(result){
                    if(result.status == 'success') window.location.href = window.location.href;
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>