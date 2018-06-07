<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/7
 * Time: 14:35
 */

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!empty($_REQUEST["uesername"])) {


        $drop = "DROP TABLE secoonet.tmp_data";
        $create="CREATE TABLE tmp_data AS
SELECT a.username,a.goodsid,a.goodsnum,b.goodsname3,b.goodsprice,b.goodspt1 FROM secoonet.paydata a
LEFT JOIN
(SELECT * FROM secoonet.goodsdata) b ON a.goodsid=b.goodsid";

        $conn->query($drop);
        $conn->query($create);

        $sql="select * from secoonet.tmp_data where username='".$_REQUEST["uesername"]."'";

        $res=$conn->query($sql);

        $putarr=Array();

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

    }


}