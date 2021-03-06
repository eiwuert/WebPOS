<?php
// Start the session
session_start();
?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Created by IntelliJ IDEA.
 * User: prosper
 * Date: 11/06/2016
 * Time: 15:37
 */
//get connection string
include ("connect.php");
//get global variable file
include ("myglobal.php");
//get user session name and id
$username= $_SESSION["uname"];
$userid= $_SESSION["userid"];
//get connection
if(isset($_POST['submit']))
{
    //get user inputs

    $personID = $_GET['id'];
    $hometel = $_POST["hometel"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];

    $mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    //check empty fields

    if($personID<1)//QUESTIONS MUST CONTAIN AT LEAST ONE CATEGORY
    {
        echo "<script>alert('Please select a valid person.');window.history.go(-1);</script>";
        $error = "Valid person is Required.";
        exit;
    }

    elseif ( $userid<0){
        echo "<script>alert('Please login as registered user.');window.history.go(-1);</script>";
        $error = "Valid user login in is required.";
        exit;
    }
    elseif ( empty($_POST["hometel"]) && empty($_POST["mobile"])){
        echo "<script>alert('Please enter home telephone or mobile phone number of person.');window.history.go(-1);</script>";
        $error = "Address Line 1 is Required.";
        exit;
    }

    //elseif ( empty($_POST["dob"])){ $error = "Date of Birth is Required.";}

    elseif ( empty($_POST["postBox"])){
        echo "<script>alert('Please enter Postal code or Box of person.');window.history.go(-1);</script>";
        $error = "Postal Code/Box is Required.";
        exit;}
    elseif ( empty($_POST["town"])){
        echo "<script>alert('Please enter town of person.');window.history.go(-1);</script>";
        $error = "Town is Required.";
        exit;}
    elseif ( empty($_POST["region"])){
        echo "<script>alert('Please enter Region/County of person.');window.history.go(-1);</script>";
        $error = "Town is Required.";
        exit;}
    elseif ( empty($_POST["country"])){
        echo "<script>alert('Please enter Country of person.');window.history.go(-1);</script>";
        $error = "Country is Required.";
        exit;}

    else{

        //clean usser input person id

        $personID = stripslashes( $personID );
        $personID=mysqli_real_escape_string($db,$personID);
        $personID = htmlspecialchars($personID);
        $personID = trim($personID);

        //clean input address1
        $addressline1 = stripslashes( $addressline1 );
        $addressline1=mysqli_real_escape_string($db,$addressline1);
        $addressline1 = htmlspecialchars($addressline1);
        $addressline1 = trim($addressline1);
        //clean input addressline 2
        $addressline2 = stripslashes( $addressline2 );
        $addressline2=mysqli_real_escape_string($db,$addressline2);
        $addressline2 = htmlspecialchars($addressline2);
        $addressline2 = trim($addressline2);

        //clean input
        $postbox = stripslashes( $postbox );
        $postbox=mysqli_real_escape_string($db,$postbox);
        $postbox = htmlspecialchars($postbox);
        $postbox = trim($postbox);

        //clean input town
        $town = stripslashes( $town );
        $town=mysqli_real_escape_string($db,$town);
        $town = htmlspecialchars($town);
        $town = trim($town);

        //clean input region
        $region = stripslashes( $region );
        $region=mysqli_real_escape_string($db,$region);
        $region = htmlspecialchars($region);
        $region = trim($region);
        //clean input country
        $country = stripslashes( $country );
        $country=mysqli_real_escape_string($db,$country);
        $country = htmlspecialchars($country);
        $country = trim($country);

        if ( ( $stmt=$mysqli->prepare("INSERT INTO personAddress (personID,addressline1, addressline2, postBox,town,region,country,userid) VALUES (?,?,?,?,?,?,?,?)"))){
            //bind parameter
            $stmt->bind_param('issssssi',$personID, $addressline1, $addressline2,$postbox,$town,$region,$country, $userid);
            if( $stmt->execute()){
                $error="SUCCESS!"."Record Added Successfully.";
            }else{
                $error="FAILURE!"."Record Did Not Add. System Does Not Allow Duplicate Records";
            }
        }else{$error= "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;}

    }




}



