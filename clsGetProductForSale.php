<?php
/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 29/07/2016
 * Time: 05:28
 */


include ("connect.php");
include ("myglobal.php");









include ("connect.php");

$keyword = '%'.$_POST['keyword'].'%';

$stmt = $sqlcon->prepare("SELECT partName FROM product WHERE partName=? ORDER BY productID ASC LIMIT 0, 10");
     $stmt->bind_param('s', $keyword);

    $stmt->execute();
    //get result
    $result = $stmt->get_result();

foreach ($result as $rs) {
    // put in bold the written text
    $partName = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['partName']);
    // add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['partName']).'\')">'.$partName.'</li>';
}


?>