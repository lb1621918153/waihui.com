<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2018/9/23
 * Time: 19:57
 */

namespace Admin\Controller;


class OrderController extends BaseController
{
    public function Index(){
        $orderModule=M("order");
        $count=$orderModule->count();
        $page=getPage($count);
        $orders=$orderModule
            ->field("order_id,username,product_name,price,`order`.status,kind,sellprice ,`order`.create_time,buy_time")
            ->join("product on product.id=order.product_id ")
            ->join("user on user.id=order.user_id")
            ->order("`order`.create_time desc")
            ->limit($page->firstRow.",".$page->listRows)
            ->select();
        for ($i=0;$i<count($orders);$i++){
            $orders[$i]["create_time"]=date("Y-m-d H:i:s",$orders[$i]["create_time"]);
            if ($orders[$i]["sellprice"]==null){
                $orders[$i]["sellprice"]="未结算";
            }else{
                $orders[$i]["sellprice"]="已结算";
            }
        }
        $this->assign("orders",$orders);
        $this->assign("page",$page->show());
        $this->assign("empty",'<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有订单信息！</div>');
        $this->display();
    }
    public function detail(){
        $id=I("id");
        $order=M("order")
            ->field("order_id,username,product_name,price,buy_price,buy_time,kind,sellprice ,selltime,ploss,`order`.status,`order`.create_time")
            ->join("product on product.id=order.product_id ")
            ->join("user on user.id=order.user_id")
            ->where(array("order_id"=>$id))
            ->find();
        $this->assign("order",$order);
        $this->display();

    }

    public function sell(){
        $id=I("id");
        $res=array();
        $sellprice=I("sellprice");
        if (!is_numeric($sellprice)){
            $res["msg"]="非法字符";
            $res["icon"]=2;
        }else {
            $status = 1;
            $selltime = time();
            $order = M("order")->where(array("order_id" => $id))->find();
            $ploss = $sellprice-$order["price"] ;
            $user=M("user")->where(array("id"=>$order["user_id"]))->find();
            $data = array(
                "sellprice" => $sellprice,
                "status" => $status,
                "selltime" => $selltime,
                "ploss" => $ploss
            );
            $user_money=$user["money"]+$sellprice;
            $update = M("order")->where(array("order_id" => $id))->save($data);
            if ($update){
                $user_update=M("user")
                    ->where(array("id"=>$order["user_id"]))
                    ->save(array("money"=>$user_money));
                if ($user_update){
                    $res["msg"]="结算成功";
                    $res["icon"]=1;
                }else
                {
                    $res["msg"]="结算失败";
                    $res["icon"]=2;
                }
            }else{
                $res["msg"]="结算失败";
                $res["icon"]=2;
            }
        }
        $this->ajaxReturn($res,"json");
    }
}
