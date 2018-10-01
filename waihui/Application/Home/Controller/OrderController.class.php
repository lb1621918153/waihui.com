<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/9/22
 * Time: 19:36
 */

namespace Home\Controller;

class OrderController extends BaseController
{
    public function add(){
        $res=array();
        $userId=session("user.id");
        $time=$this->time_stamp();
        $orderId="WHJY-".date("Ymd")."-".$time."-".$userId;
        $buyTime=I("buy_time");
        $product_id=I("product_id");
        $price=I("price");
        $buy_price=I("buy_price");
        $kind=I("kind");
        $order=array(
            "order_id"=>$orderId,"user_id"=>$userId,
            "product_id"=>$product_id,"price"=>$price,
            "buy_time"=>$buyTime,"create_time"=>time(),
            "buy_price"=>$buy_price,"kind"=>$kind
        );
        $map=array(
            "user_id"=>$userId,
            "status"=>0
        );
        $money=session("user.money") - (M("withdrawal")->where($map)->sum("money"));
        if ($price>$money){
            $res["msg"]="可用余额不足";
            $res["icon"]=2;
        }else{
            $Orders=M("order")->add($order);
            $User=M("user")->where(array("user_id"=>$userId))->save(array(
                "money"=>(session("user.money") - $price)
            ));
            session("user.money",(session("user.money") - $price));
            if ($Orders&&$User){
                $res["msg"]="下单成功";
                $res["icon"]=1;
            }else{
                $res["msg"]="下单失败";
                $res["icon"]=2;
            }
        }
        $this->ajaxReturn($res,"json");
    }
    public function time_stamp(){
        //获取当前凌晨的时间戳
        $time=time()-strtotime(date("Y-m-d"));
        $count=strlen($time);
        if ($count<5){
            for ($i=0;$i<(5-$count);$i++){
                $time="0".$time;
            }
        }
        return $time;
    }
    public function Index(){
        $OrderModel=M("order");
        $user_id=session("user.id");
        $page=getPage($OrderModel->where(array("user_id"=>$user_id))->count());
        $orders=$OrderModel
            ->field("order_id,product_name,price,create_time,kind")
            ->join("product on product.id=order.product_id")
            ->where(array("user_id"=>$user_id))
            ->order("create_time desc")
            ->limit($page->firstRow.",".$page->listRows)
            ->select();
        for ($i=0;$i<count($orders);$i++){
            $orders[$i]["create_time"]= date("Y-m-d H:i:s",$orders[$i]["create_time"]);
        }
        $this->assign("orders",$orders);
        $this->assign("page",$page->show());
        $this->assign("empty",'<div class="text-center" style="font-size: 24px; line-height: 50px;">您还没有任何交易记录！</div>');
        $this->display();
    }
    public function detail(){
        $id=I("order_id");
        $order=M("order")
            ->field("product_name,buy_price,sellprice,handing_fee,ploss,create_time,selltime")
            ->join("product on product.id=order.product_id")
            ->where(array("order_id"=>$id))
            ->select();
            $order[0]["create_time"]= date("Y-m-d H:i:s",$order[0]["create_time"]);
            $order[0]["selltime"]= date("Y-m-d H:i:s",$order[0]["selltime"]);
        $this->ajaxReturn($order,"json");
    }
}