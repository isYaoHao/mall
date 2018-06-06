<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/6
 * Time: 19:47
 */

include "config.php";


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!empty($_REQUEST["datalist"])) {

        $sql = "select * from secoonet.goodsdata where goodsid=?";


        $snn = $conn->prepare($sql);
        $snn->bind_param("s", $_REQUEST["datalist"]);

        $snn->execute();

        $result = $snn->get_result();
        $row = $result->fetch_assoc();




        print_r(json_encode($row));


    }


}