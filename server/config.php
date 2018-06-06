<?php
/**
 * Created by PhpStorm.
 * User: yaohao
 * Date: 2018/6/5
 * Time: 21:02
 */

header("Access-Control-Allow-Origin:*");
header("Content-Type:text/html;charset=utf-8");


$dbserverIp="127.0.0.1";
$dbUserName="root";
$dbPwd="";
$dbDataBase="secoonet";

$conn= new mysqli($dbserverIp,$dbUserName,$dbPwd,$dbDataBase,3306);

mysqli_query($conn,"set names utf8");
