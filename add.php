<?php

session_start();
require('connectDB.php');
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$time = date('H:i:s');
$c_d = $date;
$admin_id = $_SESSION['admin_id_fmb'];

$forms_access = array();

$get_name = $_GET['name'];

if ($_SESSION['access_fmb'] == "1" && $_SESSION['exp_date_fmb'] > $c_d) {
    $access = $_SESSION['access_fmb'];

    $s1 = "SELECT formid from access_web_login WHERE adminid=$admin_id";
    $run1 = $conn->query($s1);
    while ($row1 = $run1->fetch_assoc()) {
        $formid = $row1['formid'];
        array_push($forms_access, $formid);
    }
    $_SESSION['forms_access_fmb'] = $forms_access; 

    if ($_GET['name'] == "ITEM") {
        $forms_access = $_SESSION['forms_access_fmb'];
        $flag = 0;
        if (in_array("1", $forms_access) || in_array("5", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }

    if ($_GET['name'] == "Zabihat") {
        $forms_access = $_SESSION['forms_access_fmb'];
        $flag = 0;
        if (in_array("17", $forms_access) || in_array("24", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }
    if ($_GET['name'] == "Access") {
        $forms_access = $_SESSION['forms_access_fmb'];
        $flag = 0;
        if (in_array("20", $forms_access) || in_array("21", $forms_access)) {
        } else {
            header('Location:main.php');
            exit();
        }
    }
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
    <title> Add <?php echo $get_name ?></title>


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


    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>




    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>


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

    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('.choices-multiple-remove-button', {
                removeItemButton: true,
                searchResultLimit: 5,
                renderChoiceLimit: 5
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
                                        <h5 class="sub-title">ADD <?php echo $get_name ?></h5>

                                        <?php
                                        if ($get_name == "ITEM") { ?>
                                            <?php
                                            if (isset($_POST['submit'])) {
                                                $type = $_POST['type'];
                                                if ($type == 1) {
                                                    $type_name = "KG";
                                                }
                                                if ($type == 2) {
                                                    $type_name = "G";
                                                }
                                                if ($type == 3) {
                                                    $type_name = "L";
                                                }
                                                if ($type == 4) {
                                                    $type_name = "mL";
                                                }

                                                $item_name = strtoupper($_POST['item_name']) . " (" . $type_name . ")";

                                                $rate = $_POST['rate'];

                                                $sql = "SELECT COUNT(*) as c FROM item_info WHERE name='$item_name' and status=1";
                                                $run = $conn->query($sql);
                                                $row = $run->fetch_assoc();
                                                $count = $row['c'];
                                                if ($count > 0) {

                                            ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>ITEM already exists. Go to EDIT</strong>
                                                    </div>

                                                    <?php
                                                } else {
                                                    $s1 = "INSERT INTO item_info ( `name`, `rate`, `per`, `created_date`, `created_timestamp`,`created_admin_id`) VALUES ('$item_name','$rate',$type,'$date','$time',$admin_id)";
                                                    if (mysqli_query($conn, $s1)) {
                                                    ?>
                                                        <div class="alert alert-success background-success">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>Success</strong>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="alert alert-danger background-danger">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                                            </button>
                                                            <strong>FAIL</strong>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <form method="POST">


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">

                                                        <input type="text" placeholder="Enter Item Name" name="item_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Unit</label>
                                                    <div class="col-sm-10">

                                                        <select name="type" class="form-control">
                                                            <option value="1">kg (Kilogram)</option>
                                                            <option value="2">g (Gram)</option>
                                                            <option value="3">L (Liter)</option>
                                                            <option value="4">mL (MilliLiter)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Rate</label>
                                                    <div class="col-sm-10">

                                                        <input type="number" name="rate" placeholder="Enter Rate" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">

                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>

                                                    </div>
                                                </div>


                                            </form>
                                            <?php
                                        }

                                        if ($get_name == "Access") {


                                            if (isset($_POST['submit'])) {
                                                $powers = $_POST['powers'];
                                                $name = strtoupper($_POST['name']);
                                                $its = $_POST['its'];
                                                $pass = $_POST['pass'];
                                                $role = $_POST['role'];
                                                $email = $_POST['email'];
                                                $mobile = $_POST['mobile'];
                                                $sql = "SELECT COUNT(*) as c from web_login WHERE its='$its' and status=1";
                                                $run = $conn->query($sql);
                                                $row_c = $run->fetch_assoc();
                                                $c = $row_c['c'];

                                                if ($c > 0) {

                                            ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>Account Already Exists</strong>
                                                    </div>
                                                    <?php


                                                } else {

                                                    $a_id = $_SESSION['admin_id_fmb'];
                                                    $s0 = "SELECT exp_date,pay_id FROM web_login WHERE id=$a_id and status=1";
                                                    $run0 = $conn->query($s0);
                                                    $row0 = $run0->fetch_assoc();
                                                    $exp_date = $row0['exp_date'];
                                                    $pay_id = $row0['pay_id'];
                                                    $s1 = "INSERT INTO web_login ( `its`, `password`, `name`, `mobile`, `role`, `email`, `exp_date`, `pay_id`,`created_admin_id`,`created_date`,`created_timestamp`,`status`) VALUES('$its','$pass','$name','$mobile',$role,'$email','$exp_date','$pay_id',$admin_id,'$date','$time',1)";
                                                    if (mysqli_query($conn, $s1)) {
                                                        $log = "ADDED ACCESS FOR " . $name;
                                                        $s2_log = "INSERT INTO `user_logcat` ( `adminid`, `log`, `date`, `timestamp`) VALUES ($admin_id, '$log', '$date', '$time');";
                                                        mysqli_query($conn, $s2_log);
                                                        $s2 = "SELECT id from web_login WHERE its='$its'";
                                                        $run1 = $conn->query($s2);
                                                        $row = $run1->fetch_assoc();
                                                        $id = $row['id'];
                                                        $f = 0;
                                                        $flag == 0;
                                                        if (count($powers) == 0) {
                                                        } else {
                                                            foreach ($powers as $formid) {
                                                                $s3 = "INSERT INTO access_web_login (`adminid`, `formid`) VALUES($id,$formid)";
                                                                if (mysqli_query($conn, $s3)) {
                                                                    $flag = 1;
                                                                } else {
                                                                    $flag = 0;
                                                                }
                                                            }
                                                            if ($flag == 1) {
                                                    ?>
                                                                <div class="alert alert-success background-success">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <strong>Success</strong>
                                                                </div>
                                                            <?php

                                                            } else {
                                                            ?>
                                                                <div class="alert alert-danger background-danger">
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <i class="icofont icofont-close-line-circled text-white"></i>
                                                                    </button>
                                                                    <strong>FAIL</strong>
                                                                </div>
                                            <?php

                                                            }
                                                        }
                                                    }
                                                }
                                            }

                                            ?>
                                            <form method="POST">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Role</label>
                                                    <div class="col-sm-10">

                                                        <select name="role" class="form-control fill" required>
                                                            <option value="" disabled selected>Select Role</option>
                                                            <option value="0">Admin</option>

                                                            <option value="1">User</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Powers</label>
                                                    <div class="col-sm-10">
                                                        <select name="powers[]" class="choices-multiple-remove-button form-control fill" multiple required>

                                                            <?php
                                                            $sql = "SELECT name,id from form ";
                                                            $run = $conn->query($sql);
                                                            while ($row = $run->fetch_assoc()) {
                                                                $name = $row['name'];
                                                                $id = $row['id'];
                                                            ?>
                                                                <option value='<?php echo $id  ?>'><?php echo $name ?></option>


                                                            <?php   }

                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Full Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">ITS</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" max="99999999" placeholder="Enter ITS" name="its" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Enter Password" name="pass" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" max="9999999999" placeholder="Enter Mobile" name="mobile" required>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" placeholder="Enter Email" name="email">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <?php
                                        }



                                        if ($get_name == "Zabihat") {


                                            if (isset($_POST['submit'])) {
                                                $zabihat_type = $_POST['type'];
                                                $its = $_POST['its'];
                                                $name = strtoupper($_POST['name']);
                                                $mobile = $_POST['mobile'];
                                                $amount = $_POST['amount'];
                                                $pay_mode = $_POST['mode'];
                                                $cn = $_POST['cn'];
                                                $zabihat_date = $_POST['zabihat_date'];
                                                if (empty($zabihat_date)) {
                                                    $zabihat_date = 0;
                                                }
                                                $sql = "INSERT INTO `zabihat_info` ( `its`, `name`, `mobile`, `amount`, `zabihat_date`, `zabihat_type`, `created_date`, `created_timestamp`,`pay_mode`,`cn`,`created_admin_id`,`status`) VALUES ('$its', '$name', '$mobile', '$amount', '$zabihat_date', $zabihat_type, '$date', '$time',$pay_mode,'$cn',$admin_id,1)";
                                                if (mysqli_query($conn, $sql)) {
                                                    $s1 = "SELECT id from zabihat_info where its='$its' and name='$name' and mobile='$mobile' and amount='$amount' and zabihat_date='$zabihat_date' and zabihat_type=$zabihat_type and created_date='$date' and created_timestamp='$time' and pay_mode=$pay_mode and cn='$cn'";
                                                    $run1 = $conn->query($s1);
                                                    $row1 = $run1->fetch_assoc();
                                                    $zabihat_id = $row1['id'];
                                            ?>
                                                    <script type="text/javascript">
                                                        window.location = 'receipt_add_view.php?id=<?php echo $zabihat_id ?>';
                                                    </script>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="alert alert-danger background-danger">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="icofont icofont-close-line-circled text-white"></i>
                                                        </button>
                                                        <strong>Fail</strong>
                                                    </div>
                                            <?php
                                                }
                                            }

                                            ?>
                                            <form method="POST">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Type</label>
                                                    <div class="col-sm-10">

                                                        <select name="type" class="form-control fill" required>
                                                            <option value="" disabled selected>Select Type</option>
                                                            <option value="1">SALAWAAT</option>

                                                            <option value="2">MOULANA HAMZA (AS)</option>

                                                            <option value="3">AQA MOULA (TUS) TUL-UL-UMR</option>


                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Zabihat Date</label>
                                                    <div class="col-sm-10">

                                                        <input type="text" name="zabihat_date" placeholder="Select Zabihat Date (Optional)" autocomplete="FALSE" class="form-control" id="datepicker">

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Full Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">ITS</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="8" id="flight_number1" placeholder="Enter ITS" name="its" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" oninput="numberOnly(this.id);" class="test_css form-control" maxlength="10" id="flight_number" placeholder="Enter Mobile Number" maxlength="10" name="mobile" onfocus="this.removeAttribute('readonly');" required />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Amount</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" placeholder="Enter Amount" name="amount">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Payment Mode</label>
                                                    <div class="col-sm-10">
                                                        <select name="mode" id="mode" onchange="change_mode_receipt()" class="form-control" required>
                                                            <option value="0">Cash</option>
                                                            <option value="2">Online</option>
                                                            <option value="1">Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="cheque">

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        <?php
                                        }
                                        ?>

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
    <script>
        function change_mode_receipt() {
            var xmlhttp = new XMLHttpRequest();
            var type = document.getElementById("mode").value;
            if (type == "1") {
                document.getElementById("cheque").innerHTML = ' <div class="form-group row"><label class="col-sm-2 col-form-label">Cheque No.</label><div class="col-sm-10"><input class="form-control" type="text" name="cn" placeholder="Enter Cheque No." required/></div></div>';

            } else if (type == "2") {
                document.getElementById("cheque").innerHTML = ' <div class="form-group row"><label class="col-sm-2 col-form-label">TXN ID</label><div class="col-sm-10"><input class="form-control" type="text" name="cn" placeholder="Enter TXN ID" required/></div></div>';

            } else {
                document.getElementById("cheque").innerHTML = "";
            }
        }
    </script>
    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>