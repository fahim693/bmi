<?php
include "dbconnect.php";
//if (!isset($_SESSION['userSession'])) {
// header("Location: index.php");
//}
$run=mysqli_query($conn,"select * from user");?>
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <style>

            footer{
                padding: 11px;
                text-align: center;
                background-color: black;
                color: white;
                position: fixed;
                right: 0;
                bottom: 0;
                left: 0;
            }
            /*
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
            */
            table{

                margin-top: 50px;
                margin-bottom: 100px;
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
        <table class="table" align="center">
            <tr>
                <th>Name</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Height</th>
                <th>Weight</th>
                <th>BMI</th>
                <th>Date of Measure</th>
            </tr>
            <?php
            while($row=mysqli_fetch_assoc($run)){
                $username=$row["user_name"];
                $sex=$row["sex"];
                $age=$row["user_age"];
                $height=$row["user_height"];
                $weight=$row["user_weight"]; 
                $bmi=$row['bmi'];
                $date=$row['date_of_measure'];
            ?>

            <tr>
                <td><?php echo "$username";?></td>
                <td><?php echo "$sex";?></td>
                <td><?php echo "$age";?></td>
                <td><?php echo "$height";?></td>
                <td><?php echo "$weight";?></td>
                <td><?php echo "$bmi";?></td>
                <td><?php echo "$date";?></td>
            </tr>

            <?php
            }
            ?>
        </table>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BMI 2017</p>
                </div>
            </div>
        </footer>
    </body>

</html>