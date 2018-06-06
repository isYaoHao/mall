<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/5
 * Time: 21:02
 */

include "config.php";


if (!empty($_REQUEST["uname"])) {

    $sql = "select * from secoonet.user where user_name='" . $_REQUEST["uname"] . "'";

    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        print_r("false");
    } else {
        print_r("true");
    }


}