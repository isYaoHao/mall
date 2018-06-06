<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/6
 * Time: 10:41
 */
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_REQUEST["uname"]) && !empty($_REQUEST["upwd"])) {


        //预执行;


        $sql = "insert into secoonet.user(user_name,user_pwd) values (?,?)";

        $snn = $conn->prepare($sql);

        $snn->bind_param("ss", $_REQUEST["uname"], $_REQUEST["upwd"]);

        $snn->execute();

        $result=Array("status"=>0,"msg"=>"注册失败");

        if($snn->affected_rows==1){
            $result["status"]=1;
            $result["msg"]="注册成功";
        }

        print_r(json_encode($result));

        $conn->close();
        $snn->close();

    }


}
