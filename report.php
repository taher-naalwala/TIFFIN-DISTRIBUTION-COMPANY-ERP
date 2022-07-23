<?php

session_start();
require('connectDB.php');
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$c_d = $date;
$admin_id = $_SESSION['admin_id_fmb'];

$forms_access = array();


if ($_SESSION['access_fmb'] == "1" && $_SESSION['exp_date_fmb'] > $c_d) {
    $access = $_SESSION['access_fmb'];

    $s1 = "SELECT formid from access_web_login WHERE adminid=$admin_id";
    $run1 = $conn->query($s1);
    while ($row1 = $run1->fetch_assoc()) {
        $formid = $row1['formid'];
        array_push($forms_access, $formid);
    }
    $_SESSION['forms_access_fmb'] = $forms_access; 

    $forms_access = $_SESSION['forms_access_fmb'];

    if (in_array("4", $forms_access)) {
    } else {
        header('Location:main.php');
        exit();
    }
} else if ($_SESSION['access_fmb'] == "1" && $_SESSION['exp_date_fmb'] <= $c_d) {
    header("Location: maintainence.php");

    die();
} else {
    header("Location: login.php");
    die();
}
$get_name = $_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title> Module <?php echo $get_name ?></title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="FMB Software" />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/feather.css">


    <link rel="stylesheet" href="css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">





    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">



    <link rel="stylesheet" type="text/css" href="css/icofont.css">

    <link rel="stylesheet" type="text/css" href="css/pages.css">


    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/3582a84b00.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function() {

            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                constrainInput: false
            });

        });
    </script>
</head>

<body>
    <?php

    ?>
    <?php
    require('style.php');
    require('connectDB.php');

    ?>
    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-box bg-c-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo $get_name ?></h5>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"><i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href=""><?php echo $get_name ?></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="pcoded-inner-content">

            <div class="main-body">
                <div class="page-wrapper">

                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card">

                                    <div class="card-block">
                                        <h5 class="sub-title">Module</h5>

                                        <!--


                                        <form id="form1" method="GET">
                                            <div class="row">
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <select name="type" class="form-control" onChange="change_type()" id="type" required>
                                                                <option value="" disabled>--TYPE--</option>
                                                                <option value="0" selected>Menu</option>
                                                                <option value="0" selected>Item</option>
                                                                <option value="0" selected>Dish</option>
                                                              

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="1">
                                                        <div class="form-group ">

                                                            <div class="col-sm-10">

                                                            <input type="text" name="menu_date" placeholder="Select Menu Date" autocomplete="FALSE" class="form-control" id="datepicker" required>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div id="2">
                                                        <div class="form-group">

                                                            <div class="col-sm-10">
                                                            <button id="submit_button" style="color:#fff" name="submit" class="btn btn-primary" value="submit">Submit</button>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="3">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="4">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">

                                                    <div class="form-group">

                                                        <div class="col-sm-10">

                                                            <div id="5">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="6">

                                            </div>




                                        </form>

    -->

                                        <h3>This Module will be live Tomorrow at 5 PM</h3>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="styleSelector">
    </div>
    </div>
    </div>




    <script data-cfasync="false" src="js/email-decode.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/popper.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/bootstrap.min.js"></script>

    <script src="js/waves.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/jquery.slimscroll.js"></script>

    <script src="js/jquery.flot.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/jquery.flot.categories.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/jquery.flot.tooltip.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/custom-dashboard.min.js"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="js/script.min.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>
    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>