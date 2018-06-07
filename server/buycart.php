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
    if( !empty($_REQUEST["username"])){

        if(!empty($_REQUEST["goodsid"])){
            $sqldelete="DELETE  FROM paydata WHERE username='".$_REQUEST["username"]."' AND goodsid='".$_REQUEST["goodsid"]."'";
            $conn->query($sqldelete);
        }


        if(!empty($_REQUEST["goodsnum"])){

            if( $_REQUEST["goodsnum"]>0){
                $sql="insert into secoonet.paydata(username,goodsid,goodsnum) values (?,?,?)";

                $snn=$conn->prepare($sql);

                $snn->bind_param("sss",$_REQUEST["username"],$_REQUEST["goodsid"],$_REQUEST["goodsnum"]);

                $snn->execute();
            }




        }






        /*$sql="insert into secoonet.paydata(username,goodsid,goodsnum) values (?,?,?)";

        $snn=$conn->prepare($sql);

        $snn->bind_param("sss",$_REQUEST["username"],$_REQUEST["goodsid"],$_REQUEST["goodsnum"]);

        $result=$snn->execute();*/


        $drop = "DROP TABLE secoonet.tmp_data";
        $create="CREATE TABLE tmp_data AS
SELECT a.username,a.goodsid,a.goodsnum,b.goodsname3,b.goodsprice,b.goodspt1 FROM secoonet.paydata a
LEFT JOIN
(SELECT * FROM secoonet.goodsdata) b ON a.goodsid=b.goodsid";

        $conn->query($drop);
        $conn->query($create);

        $sql="SELECT username,SUM(goodsnum)sumb FROM secoonet.tmp_data WHERE username='".$_REQUEST["username"]."' GROUP BY 1";

        $res=$conn->query($sql)->fetch_assoc();

        print_r(json_encode($res));

        /*$putarr=Array();

        while ($result=$res->fetch_assoc()){
            $rs=Array();

            $rs["username"]=$result["username"];
            $rs["goodsid"]=$result["goodsid"];
            $rs["goodsnum"]=$result["goodsnum"];
            $rs["goodsname3"]=$result["goodsname3"];
            $rs["goodsprice"]=$result["goodsprice"];
            $rs["goodspt1"]=$result["goodspt1"];

            array_push($putarr,$rs);

        }

        print_r(json_encode($putarr));



        $conn->close();*/


    }



    /*    }*/





}