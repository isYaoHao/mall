<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/7
 * Time: 10:18
 */


include "config.php";

session_start();
/*if(!empty($_SESSION["user"])){*/
    if($_SERVER["REQUEST_METHOD"]="POST"){
        if( !empty($_REQUEST["username"]) && !empty($_REQUEST["goodsid"]) && !empty($_REQUEST["goodsnum"])){

            $sqldelete="DELETE  FROM paydata WHERE username='".$_REQUEST["username"]."' AND goodsid='".$_REQUEST["goodsid"]."'";
            $conn->query($sqldelete);

            $sql="insert into secoonet.paydata(username,goodsid,goodsnum) values (?,?,?)";

            $snn=$conn->prepare($sql);

            $snn->bind_param("sss",$_REQUEST["username"],$_REQUEST["goodsid"],$_REQUEST["goodsnum"]);

            $result=$snn->execute();


            $res=Array("status"=>1,"msg"=>"商品添加成功");

            if($result!=1){

                $res=Array("status"=>0,"msg"=>"商品添加失败");

            }
            print_r(json_encode($res));



            $conn->close();
            $snn->close();


        }



/*    }*/





}