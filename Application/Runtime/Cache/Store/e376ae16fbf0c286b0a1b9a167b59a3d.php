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
                    <div class="panel-heading">API 列表</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#unifiedorder">统一下单</a>
                                    </h4>
                                </div>
                                <div id="unifiedorder" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">接口地址</div>
                                            <div class="panel-body"><?php echo ($url); echo U('Api/Payment/unifiedorder');?></div>
                                        </div>
                                        <div class="panel panel-green" style="margin-top:15px;">
                                            <div class="panel-heading">请求参数</div>
                                            <div class="panel-body">
                                                <div class="table-responsive table-bordered">
                                                    <table class="table" style="margin-bottom:0px;">
                                                        <thead>
                                                            <tr>
                                                                <th>字段名</th>
                                                                <th>变量名</th>
                                                                <th>必填</th>
                                                                <th>类型</th>
                                                                <th>示例值</th>
                                                                <th>描述</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>账号ID</td>
                                                                <td>app_key</td>
                                                                <td>是</td>
                                                                <td>String(32)</td>
                                                                <td>wxd678efh567hg6787</td>
                                                                <td>分配给每个用户的ID</td>
                                                            </tr>
                                                            <tr>
                                                                <td>详情</td>
                                                                <td>field_detail</td>
                                                                <td>是</td>
                                                                <td>String(32)</td>
                                                                <td>wxd678efh567hg6787</td>
                                                                <td>分配给每个用户的ID</td>
                                                            </tr>
                                                            <tr>
                                                                <td>订单号</td>
                                                                <td>out_trade_no</td>
                                                                <td>是</td>
                                                                <td>String(32)</td>
                                                                <td>20150806125346</td>
                                                                <td>商户系统内部订单号，要求32个字符内</td>
                                                            </tr>
                                                            <tr>
                                                                <td>金额</td>
                                                                <td>total_fee</td>
                                                                <td>是</td>
                                                                <td>Int</td>
                                                                <td>88</td>
                                                                <td>订单总金额，单位为分</td>
                                                            </tr>
                                                            <tr>
                                                                <td>终端IP</td>
                                                                <td>spbill_create_ip</td>
                                                                <td>是</td>
                                                                <td>String(16)</td>
                                                                <td>123.12.12.123</td>
                                                                <td>提交用户端ip</td>
                                                            </tr>
                                                            <tr>
                                                                <td>通知地址</td>
                                                                <td>notify_url</td>
                                                                <td>是</td>
                                                                <td>String(256)</td>
                                                                <td>http://www.xxx.com/notify_url.php</td>
                                                                <td>异步接收支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数</td>
                                                            </tr>
                                                            <tr>
                                                                <td>支付方式</td>
                                                                <td>trade_type</td>
                                                                <td>否</td>
                                                                <td>String(5)</td>
                                                                <td>1,2,3</td>
                                                                <td>支付方式（1：支付宝，2：微信，3：银联），多个用逗号隔开，请注意这里的逗号是英文状态下</td>
                                                            </tr>
                                                            <tr>
                                                                <td>交易起始时间</td>
                                                                <td>time_start</td>
                                                                <td>否</td>
                                                                <td>String(14)</td>
                                                                <td>20091225091010</td>
                                                                <td>订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010</td>
                                                            </tr>
                                                            <tr>
                                                                <td>交易结束时间</td>
                                                                <td>time_expire</td>
                                                                <td>否</td>
                                                                <td>String(14)</td>
                                                                <td>20091225091010</td>
                                                                <td>订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-green" style="margin-top:15px;">
                                            <div class="panel-heading">返回结果</div>
                                            <div class="panel-body">
                                                <div class="table-responsive table-bordered">
                                                    <table class="table" style="margin-bottom:0px;">
                                                        <thead>
                                                            <tr>
                                                                <th>字段名</th>
                                                                <th>变量名</th>
                                                                <th>必填</th>
                                                                <th>类型</th>
                                                                <th>示例值</th>
                                                                <th>描述</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>返回状态码</td>
                                                                <td>return_code</td>
                                                                <td>是</td>
                                                                <td>String(16)</td>
                                                                <td>SUCCESS</td>
                                                                <td>SUCCESS / FAIL，此字段是通信标识</td>
                                                            </tr>
                                                            <tr>
                                                                <td>返回信息</td>
                                                                <td>return_msg</td>
                                                                <td>否</td>
                                                                <td>String(255)</td>
                                                                <td>app_key - 填写有误，请检查是否为32位字符串</td>
                                                                <td>如果return_code为FAIL，则显示错误信息</td>
                                                            </tr>
                                                            <tr>
                                                                <td>跳转地址</td>
                                                                <td>url</td>
                                                                <td>否</td>
                                                                <td>String(255)</td>
                                                                <td><?php echo U('Payment/');?></td>
                                                                <td>如果return_code为SUCCESS，则需要跳转到此网址上进行支付</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-green" style="margin-top:15px;">
                                            <div class="panel-heading">示例</div>
                                            <div class="panel-body">
                                                <pre>
$_config = array(
    'app_key'           =>  '813992f5346252bcea9af322f9078374',
    'field_detail'      =>  '会员充值',
    'out_trade_no'      =>  time(),
    'total_fee'         =>  '100',
    'spbill_create_ip'  =>  $_SERVER['REMOTE_ADDR'],
    'time_start'        =>  '20091225091010',
    'time_expire'       =>  '20091227091010',
    'notify_url'        =>  'http://www.xx.com/xx.php',
    'trade_type'        =>  '1,2,3'
);

$data = json_encode($_config);

$stream = array('http' => array('method' => 'POST','header'  => 'Content-type: application/json','content' => $data));

$content  = stream_context_create($stream);

$sUrl = 'http://192.168.1.104/index.php/Api/Payment/unifiedorder.html';

$result = @file_get_contents($sUrl,false,$content);  

if($result['return_code'] == 'SUCCESS') header('location:'.$result['url']);</pre>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.create').bind('click',function(){
            window.location.href = '<?php echo U("lists_add");?>';
        });
    });
</script>

<?php echo W('Common/bottom');?>