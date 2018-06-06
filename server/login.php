<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/6
 * Time: 11:03
 */

include "config.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_REQUEST["uname"]) && !empty($_REQUEST["upwd"])) {


        $sql = "select * from secoonet.user where user_name=? and user_pwd=?";

        $snn = $conn->prepare($sql);
        $snn->bind_param("ss", $_REQUEST["uname"], $_REQUEST["upwd"]);

        $snn->execute();

        $result = $snn->get_result();

        $res = Array("status" => 0, "msg" => "登录失败,用户名或密码错误");

        if ($result->num_rows >= 1) {
            $tmp=$result->fetch_assoc();

            //设置session;
            $arrtmp=Array();

            $arrtmp["uid"]=$tmp["user_id"];
            $arrtmp["uname"]=$tmp["user_name"];
            $arrtmp["upwd"]=$tmp["user_pwd"];

            $_SESSION["user"]=json_encode($arrtmp);

            $res["status"] = 1;
            $res["msg"] = "登录成功";
            $res["data"]=json_encode($arrtmp);

        }

        print_r(json_encode($res));

        $conn->close();
        $snn->close();

    }


}