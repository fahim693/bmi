<?php
include "dbconnect.php";
error_reporting(0);
//$height=null;
//$weight=null;
//$w=null;
//$h=null;
//$r=null;
//
//$msg=null;
if(isset($_POST["btn"])){
    $name=$_POST['username'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $address=$_POST['address'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];

    //    var_dump(floatval($height));
    $date=date("Y-m-d");


}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BMI</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <SCRIPT language=Javascript>
            <!--
                function isNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode != 46 && charCode > 31 
                    && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
            //-->
        </SCRIPT>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <style>
            .form{
                margin: 0 auto;
                margin-top: 70px;
                width: 40%;
                text-align: center;
            }
            /*
            input,select{
            text-align: center;
            }
            */
            footer{
                padding: 12px;
                text-align: center;
                background-color: black;
                color: white;
                position: absolute;
                right: 0;
                bottom: 0;
                left: 0;
            }
            .result{
                text-align: center;
                font-size: 17pt;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Body Mass Index</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">Calculate BMI</a>
                        </li>
                        <li>
                            <a href="bmichart.html">BMI Chart</a>
                        </li>
                        <li>
                            <a href="chart.php">User Chart</a>
                        </li>
                    </ul>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <form class="form" method="post">
            <h2>Calculate your BMI</h2><hr>
            <input type="text" class="form-control" placeholder="Name" name="username">
            <input type="number" class="form-control" placeholder="Age" name="age">
            <select class="form-control" name="sex">
                <option>Male</option>
                <option>Female</option>
            </select>
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Height in inch" id="height" name="height">
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Weight in lbs" id="weight" name="weight">
            <input type="text" class="form-control" placeholder="Address" name="address"><br>
            <button name="btn" class="btn btn-primary" onclick="calc()">Calculate</button>
        </form><br><br>
        <?php
        $h=floatval($height);
        $w=floatval($weight);

        $r=($w/($h*$h))*703;
        
        ?>
        <div  class='result'>
            <?php
            if($r<18.5){
                echo "<strong>Result: </strong>"."$r"."<br>You are UNDERWEIGHED!!"."<br><a href='underweight.html'>Get Suggestion</a>";
            }else if($r>=18.5 && $r<=24.9){
                echo "<strong>Result: </strong>"."$r"."<br>Your weight is NORMAL!!";
            }else if($r>=25 && $r<=29.9){
                echo "<strong>Result: </strong>"."$r"."<br>You are OVERWEIGHED!!"."<br><a href='overweight.html'>Get Suggestion</a>";
            }else if($r>=30 && $r<=34.9){
                echo "<strong>Result: </strong>"."$r"."<br>You are OBESE!!"."<br><a href='obesity.html'>Get Suggestion</a>";
            }else if($r>=35 && $r<=39.9){
                echo "<strong>Result: </strong>"."$r"."<br>You are SEVERELY OBESE!!"."<br><a href='obesity.html'>Get Suggestion</a>";
            }else if($r>=40 ){
                echo "<strong>Result: </strong>"."$r"."<br>You are MORBIDLY OBESE!!"."<br><a href='obesity.html'>Get Suggestion</a>";
            }?>
        </div>
        <?php
        mysqli_query($conn,"insert into user(user_name,user_age,user_height,user_weight,user_address,date_of_measure,sex,bmi) values('$name','$age','$height','$weight','$address','$date','$sex','$r')");
        //        echo $r;
        ?>

        
        <!--
<script>
function calc(){
var w=document.getElementById("weight").value;
var h=document.getElementById("height").value;


var result=(w/(h*h))*703;

document.write(result);
}
</script>
-->
    </body>
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; BMI 2017</p>
            </div>
        </div>
    </footer>
</html>