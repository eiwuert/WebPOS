<?php
/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 25/07/2016
 * Time: 14:06
 */

/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 23/07/2016
 * Time: 20:55
 */

/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 21/07/2016
 * Time: 17:16
 */

session_start();
//include ("secureSessionID.php");//verify user session
//include ("inactiveTimeOut.php");//check user idle time
?>


<?php
include ("connect.php");
include ("myglobal.php");

$choice=$_GET['id'];

$choice = stripslashes( $choice );
$choice=mysqli_real_escape_string($db,$choice);
$choice = htmlspecialchars($choice);
$choice = trim($choice);

$msg="";



//prepare statement
if ($stmt = $sqlcon->prepare("SELECT proClass FROM proClassification where proTypeID = ?")) {
    $stmt->bind_param('i', $choice);

    $stmt->execute();
    //get result
    $result = $stmt->get_result();
}else{
    $msg = "SELECTION FAIL: Contact System Admin";
}

while ($row1 = $result->fetch_row()) {
    //  $mycompanyID = $row[0];
    //$mycompanyName = $row[1];
    // $mylogo = $row[2];
    // $getcompnayID = $getcompanyID . $mycompanyID;
    //  $getCompanyName = $getCompanyName . $mycompanyName;
    // $getlogo = $getlogo . $mylogo;

    //  $mylogo = "<p><img src='".$row[2]."' style='width:100px;height:100px;'></p>";
    // $getlogo = $getlogo.$mylogo;

    $resultText=$row1[0];


    echo "<option value='$resultText'>" . $resultText . "</option>";

    // $line = "<p><a href='frmAddShelf.php?id=" . $row[0] . "'>". "Click Here To Add Shelf to a Rack ". $row[1]." of Capacity ".$row[2]
    // . "</a></p>"."<br>";

    // $linePhoto = "<p><img src='".$row[2]."' style='width:100px;height:100px;'></p>";

    // $resultText =$resultText.$line;
    // $resultTextPhoto =$resultTextPhoto.$linePhoto;

}



