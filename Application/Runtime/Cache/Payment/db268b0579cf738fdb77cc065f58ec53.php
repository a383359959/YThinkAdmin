<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ($rs["title"]); ?></title>
    <link rel="stylesheet" href="/Public/Payment/css/common.css?v=<?php echo ($time); ?>">
    <link rel="stylesheet" href="/Public/Payment/css/style.css?v=<?php echo ($time); ?>">
    <script src="/Public/Payment/js/jquery.min.js?v=<?php echo ($time); ?>"></script>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="header_logo"><?php echo ($rs["title"]); ?></div>
            <div class="header_item">
                <ul>
                    <li>全国服务热线：400-024-2276</li>
                    <li>
                        <a href="javascript:;">技术QQ客服：383359959</a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="order_main">
        <div class="container">
            <ul>
                <li>
                    <label>平台订单编号：</label>
                    <span><?php echo ($rs["order_sn"]); ?></span>
                    <div class="clear"></div>
                </li>
                <li>
                    <label>商户订单编号：</label>
                    <span><?php echo ($rs["out_trade_no"]); ?></span>
                    <div class="clear"></div>
                </li>
                <?php if($rs['total_fee'] > 0): ?><li>
                    <label>订单应付金额：</label>
                    <span><?php echo ($rs["total_fee"]); ?>&nbsp;元</span>
                    <div class="clear"></div>
                </li><?php endif; ?>
                <?php if($rs['time_start'] > 0): ?><li>
                    <label>交易起始时间：</label>
                    <span><?php echo (date("Y-m-d H:i:s",$rs["time_start"])); ?></span>
                    <div class="clear"></div>
                </li><?php endif; ?>
                <?php if($rs['time_start'] > 0): ?><li>
                    <label>交易结束时间：</label>
                    <span><?php echo (date("Y-m-d H:i:s",$rs["time_expire"])); ?></span>
                    <div class="clear"></div>
                </li><?php endif; ?>
                <?php echo ($rs["goods_detail"]); ?>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="left">
                <!--<div class="box">
                    <h1>手机扫码</h1>
                    <div class="box_main">
                        <div class="box_main_qrcode">
                            <img src="/Public/Payment/images/qrcode.png" />
                        </div>
                    </div>
                </div>-->
                <div class="box">
                    <h1>注意事项</h1>
                    <div class="box_main">
                        <ul>
                            <li>1、请仔细检查选择或输入的信息是否准确，以免造成不必要的麻烦。如果发现充错区或者帐号填写错误，请不要领取游戏币，及时与平台客服联系。我们严格拒接黄、赌、毒、钓鱼、诈骗等性质的网络产品，如有发现欢迎举报，我们将在第一时间进行封杀处理</li>
                            <li>2、如果发现充错区或者帐号填写错误，请不要领取游戏币，及时与平台客服联系。</li>
                            <li>3、我们严格拒接黄、赌、毒、钓鱼、诈骗等性质的网络产品，如有发现欢迎举报，我们将在第一时间进行封杀处理。</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="info">
                    <ul>
                        <!--
                            <li>
                                <label>开通账号：</label>
                                <input type="text" />
                            </li>
                            <li>
                                <label>开通账号：</label>
                                <input type="text" />
                            </li>
                            <li>
                                <label>开通账号：</label>
                                <input type="text" />
                            </li>
                        -->
                        <li>
                            <label>支付方式：</label>
                            <ul class="pay_type">
                                <li class="active"><a href="javascript:;">微信支付</a><img src="/Public/Payment/images/focus.png" /></li>
                                <li><a href="javascript:;">支付宝</a></li>
                                <li><a href="javascript:;">银联在线</a></li>
                                <div class="clear"></div>
                            </ul>
                        </li>
                        <li>
                            <label>应付金额：</label>
                            <span class="total"><font><?php echo ($rs["total_fee"]); ?></font>元</span>
                            <div class="clear"></div>
                        </li>
                        <li style="margin:0px;">
                            <label></label>
                            <a href="javascript:;" class="submit">立即支付</a>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="copyright">
        <p>Copyright&nbsp;©&nbsp;2017&nbsp;-&nbsp;<?php echo ($year); ?>&nbsp;株洲龙脉网络科技有限公司</p>
    </div>
</body>
</html>