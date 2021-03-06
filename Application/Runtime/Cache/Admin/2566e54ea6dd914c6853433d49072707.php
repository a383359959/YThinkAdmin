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
                    <div class="panel-heading relative">反馈信息</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">#</th>
                                            <th style="text-align:center;">用户名</th>
                                            <th>反馈信息</th>
                                            <th style="text-align:center;">IP</th>
                                            <th style="text-align:center;">时间</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value,index) in list">
                                            <td style="width:10%;text-align:center;">{{value.id}}</td>
                                            <td style="width:100px;">{{value.username}}</td>
                                            <td>{{value.content}}</td>
                                            <td style="width:15%;text-align:center;">{{value.ip}}</td>
                                            <td style="width:15%;text-align:center;">{{value.add_time}}</td>
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
                        ythink_ajax('Feedback/lists',option,function(result){
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
            }
        }
    });
</script>
<?php echo W('Common/bottom');?>