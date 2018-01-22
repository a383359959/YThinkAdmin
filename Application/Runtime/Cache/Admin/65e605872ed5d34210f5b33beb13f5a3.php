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
                                            <td style="text-align:center;"><span v-if="value.role > 0"><a v-bind:href="value.down">下属会员</a>&nbsp;&nbsp;|&nbsp;&nbsp;</span><span v-if="value.role == 1"><a v-bind:href="value.resume">我的简历</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a v-bind:href="value.account">账号审核</a>&nbsp;&nbsp;|&nbsp;&nbsp;</span><span v-if="value.role == 2"><a v-bind:href="value.account">账号审核</a>&nbsp;&nbsp;|&nbsp;&nbsp;</span><a v-bind:href="value.url">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;" v-on:click="del(value.id,index)">删除</a></td>
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
            parent_user_id : '<?php echo ($_GET['parent_user_id']); ?>'
        },
        mounted : function(){
            this.loadData();
        },
        methods : {
            add : function(){
                window.location.href = '<?php echo U("edit",array("type" => "add"));?>';
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
                            parent_user_id : obj.parent_user_id,
                        }
                        ythink_ajax('User/lists',option,function(result){
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
                ythink_ajax('User/action',option,function(result){
                    if(result.status == 'success') obj.list.splice(index,1);
                });
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>