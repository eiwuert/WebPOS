<?php
session_start();

$ip=$_SESSION["ip"];
$timeout=$_SESSION ["timeout"];
if (!($ip==$_SERVER['REMOTE_ADDR'])){
    header("location: logout.php"); // Redirecting To Other Page
}

if($_SESSION ["timeout"]+60 < time()){

    //session timed out
    header("location: logout.php"); // Redirecting To Other Page
}else{
    //reset session time
    $_SESSION['timeout']=time();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title> Product Settings</title>


    <link rel="stylesheet" href="css/style-forms.css">
</head>

<body>


<br><br>
<section>
    <form class="login-form" method="post" action="">
        <div class="content">
            <div class="header">
                <h1>Product Settings</h1>
                <span>Settings to be Done Before All Sales of Products</span>
            </div>

            <div id="photolist">
                <ul class="list-unstyled menu-parent" id="mainMenu">

                    <div>
                        <a  href="frmProductType.php" class="waves-effect waves-light">
                            <i class="icon ti-id-badge"></i>
                            <span class="text">Add Type of Prodcuct</span>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a  href="frmAddPosition.php" class="waves-effect waves-light">
                            <i class="icon ti-id-badge"></i>
                            <span class="text">Add Position of Part</span>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a  href="frmAddProduct.php" class="waves-effect waves-light">
                            <i class="icon ti-id-badge"></i>
                            <span class="text">Add Taxes</span>
                        </a>
                    </div>
                    <br>
                    <div>
                        <a  href="frmAddMarkup.php" class="waves-effect waves-light">
                            <i class="icon ti-id-badge"></i>
                            <span class="text">Add Price Markup</span>
                        </a>
                    </div>

                    <br>
                    <div>
                        <a  href="home1.php" class="waves-effect waves-light">
                            <i class="icon ti-id-badge"></i>
                            <span class="text">Click here to go back to home page</span>
                        </a>
                    </div>

                </ul>
            </div>

        </div>
    </form>

</section>
</div>

</body>
</html>