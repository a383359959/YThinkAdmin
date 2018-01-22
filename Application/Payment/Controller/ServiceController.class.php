<?php

namespace Payment\Controller;

use Think\Controller;

class ServiceController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->assign('time',time());
    }

    public function index(){
        // if(empty($_REQUEST['key'])) exit;
        $rs = M('store_order')->where('sha1(id) = "'.$_REQUEST['key'].'"')->find();
        // dump($rs);
        if($rs['type'] == 0){

        }else if($rs['type'] == 1){

            $rs['total_fee'] = number_format($rs['total_fee'] / 100,2);

            $goods_detail = '';
            if(!empty($rs['goods_detail'])){
                $goods_detail = '<table>';
                $goods_detail_arr = json_decode($rs['goods_detail'],true);

                $goods_detail .= '<tr>';
                foreach($goods_detail_arr['title'] as $key => $value){
                    $width = !empty($value['width']) ? 'width="'.$value['width'].'%"' : '';
                    $goods_detail .= '<th '.$width.' >'.$value['name'].'</th>';
                }
                $goods_detail .= '</tr>';

                foreach($goods_detail_arr['data'] as $key => $value){
                    $goods_detail .= '<tr>';
                    foreach($value as $k => $v){
                        $goods_detail .= '<td>'.$v.'</td>';
                    }
                    $goods_detail .= '</tr>';
                }

                $goods_detail .= '<table>';
            }

            $rs['goods_detail'] = $goods_detail;

        }

        $this->assign('rs',$rs);
        $this->assign('year',date('Y'));
        $this->display();
    }

}