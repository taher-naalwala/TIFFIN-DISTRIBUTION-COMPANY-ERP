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
} else if ($_SESSION['access_fmb'] == "1" && $_SESSION['exp_date_fmb'] <= $c_d) {
    header("Location: maintainence.php");

    die();
} else {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title>FMB Software</title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/feather.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome-n.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/widget.css">
</head>

<body>

    <?php
    require('style.php');


    ?>
    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-home bg-c-blue"></i>
                        <div class="d-inline">
                            <h5>Dashboard</h5>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">


                    </div>
                </div>
            </div>
        </div>
    </div>

    <li>
        <a href="http://www.google.com/chrome/">
            <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
            <div>Chrome</div>
        </a>
    </li>
    <li>
        <a href="https://www.mozilla.org/en-US/firefox/new/">
            <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
            <div>Firefox</div>
        </a>
    </li>
    <li>
        <a href="http://www.opera.com">
            <img src="../files/assets/images/browser/opera.png" alt="Opera">
            <div>Opera</div>
        </a>
    </li>
    <li>
        <a href="https://www.apple.com/safari/">
            <img src="../files/assets/images/browser/safari.png" alt="Safari">
            <div>Safari</div>
        </a>
    </li>
    <li>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="../files/assets/images/browser/ie.png" alt="">
            <div>IE (9 & above)</div>
        </a>
    </li>
    </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->


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
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>