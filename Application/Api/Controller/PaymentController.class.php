<?php

namespace Api\Controller;

use Think\Controller;

class PaymentController extends Controller{

    /*
    *   统一下单
    */
    public function unifiedorder(){
        $url = 'http://'.$_SERVER['HTTP_HOST'];
        $data = file_get_contents('php://input','r');
        $data = json_decode($data,true);
        $status = $this->checkParameters($data);
        if($status['status'] == 'error'){
            $result = array(
                'return_code'   => 'FAIL',
                'return_msg'    => $status['error_msg']
            );
        }else{
            $store_id = M('store')->where('app_key = "'.$data['app_key'].'"')->getField('id');
            $arr = array(
                'type'              =>  1,
                'store_id'          =>  $store_id,
                'title'             =>  $data['title'],
                'order_sn'          =>  substr(md5(time().$store_id.$data['out_trade_no'].uniqid()),8,16),
                'out_trade_no'      =>  $data['out_trade_no'],
                'total_fee'         =>  $data['total_fee'],
                'spbill_create_ip'  =>  $data['spbill_create_ip'],
                'time_start'        =>  $data['time_start'],
                'time_expire'       =>  $data['time_expire'],
                'notify_url'        =>  $data['notify_url'],
                'trade_type'        =>  $data['trade_type'],
                'field_detail'      =>  $data['field_detail'],
                'goods_detail'      =>  json_encode($data['goods_detail'])
            );
            $id = M('store_order')->add($arr);
            if($id){
                $result = array(
                    'return_code'   => 'SUCCESS',
                    'url'           => $url.U('Payment/Service/index',array('key' => sha1($id)))
                );
            }
        }
        die(json_encode($result));
    }

    /*
    *   检测参数
    */
    public function checkParameters($arr){
        
        $app_key = $this->checkAppKey($arr['app_key']);
        if($app_key['status'] == 'error') return $app_key;
        
        $out_trade_no = $this->checkOutTradeNo($arr['out_trade_no']);
        if($out_trade_no['status'] == 'error') return $out_trade_no;

        $total_fee = $this->checkTotalFee($arr['total_fee']);
        if($total_fee['status'] == 'error') return $total_fee;

        $spbill_create_ip = $this->checkSpbillCreateIp($arr['spbill_create_ip']);
        if($spbill_create_ip['status'] == 'error') return $spbill_create_ip;

        $time_start = $this->checkTimeStart($arr['time_start']);
        if($time_start['status'] == 'error') return $time_start;

        $time_expire = $this->checkTimeExpire($arr['time_expire']);
        if($time_expire['status'] == 'error') return $time_expire;

        $trade_type = $this->checkTradeType($arr['trade_type']);
        if($trade_type['status'] == 'error') return $trade_type;

    }

    /*
    *   检测app_key
    */
    public function checkAppKey($app_key){
        if(!$app_key) return array('status' => 'error','error_msg' => '缺少参数 - app_key');
        if(strlen($app_key) != 32) return array('status' => 'error','error_msg' => 'app_key - 填写有误，请检查是否为32位字符串');
        $rs = M('store')->where('app_key = "'.$app_key.'"')->find();
        if(!$rs) return array('status' => 'error','error_msg' => 'app_key - 填写有误，没有查到该用户');
        if($rs['status'] == 1) return array('status' => 'error','error_msg' => 'app_key - 用户正在申请中，现在暂时还无法调用接口');
        if($rs['status'] == 2) return array('status' => 'error','error_msg' => 'app_key - 用户申请已被拒绝，拒绝理由：'.$rs['status_msg']);
        if($rs['status'] == 3) return array('status' => 'error','error_msg' => 'app_key - 用户申请已被封停，封停理由：'.$rs['status_msg']);
    }

    /*
    *   检查订单号
    */
    public function checkOutTradeNo($out_trade_no){
        if(!$out_trade_no) return array('status' => 'error','error_msg' => '缺少参数 - out_trade_no');
        if(strlen($out_trade_no) > 32) return array('status' => 'error','error_msg' => 'out_trade_no - 填写有误，请检查是否超过32位字符串');
    }

    /*
    *   检查金额
    */
    public function checkTotalFee($total_fee){
        if(!$total_fee) return array('status' => 'error','error_msg' => '缺少参数 - total_fee');
        if($total_fee < 0) return array('status' => 'error','error_msg' => 'total_fee - 不得小于0');
        if(strpos($total_fee,'.') !== false) return array('status' => 'error','error_msg' => 'total_fee - 必须是整数，不允许有小数点');
        if(!is_numeric($total_fee)) return array('status' => 'error','error_msg' => 'total_fee - 必须是数字');
    }

    /*
    *   检查IP
    */
    public function checkSpbillCreateIp($spbill_create_ip){
        if(!$spbill_create_ip) return array('status' => 'error','error_msg' => '缺少参数 - spbill_create_ip');
        if(!filter_var($spbill_create_ip,FILTER_VALIDATE_IP)) return array('status' => 'error','error_msg' => 'spbill_create_ip - 请输入正确IP地址');
    }

    /*
    *   检查交易起始时间
    */
    public function checkTimeStart($time_start){
        if($time_start){
            $time = strtotime($time_start);
            $checkstr = date('YmdHis',$time);
            if($time_start != $checkstr) return array('status' => 'error','error_msg' => 'time_start - 请输入正确交易起始时间');
        }
    }

    /*
    *   检查交易结束时间
    */
    public function checkTimeExpire($time_expire){
        if($time_expire){
            $time = strtotime($time_expire);
            $checkstr = date('YmdHis',$time);
            if($time_expire != $checkstr) return array('status' => 'error','error_msg' => 'time_expire - 请输入正确交易结束时间');
        }
    }

    /*
    *   检查支付方式
    */
    public function checkTradeType($trade_type){
        if($trade_type){
            $trade_type = explode(',',$trade_type);
            foreach($trade_type as $key => $value){
                if($value < 1 || $value > 3){
                    return array('status' => 'error','error_msg' => 'trade_type - 请输入正确交易方式（1：支付宝，2：微信，3：银联），多个用逗号隔开，请注意这里的逗号是英文状态下');
                    break;
                }
            }
        }
    }

}