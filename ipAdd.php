<?php
/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 07/08/2016
 * Time: 18:09
 */

$ip="";
/*if(!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip=$_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip=$_SERVER["HTTP_X_FORWARDED_FOR"];
}else
{
    $ip=$_SERVER["REMOTE_ADDR"];

}*/
echo $ip;