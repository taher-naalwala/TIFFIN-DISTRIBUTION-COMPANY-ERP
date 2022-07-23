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

    if (in_array("8", $forms_access) || in_array("25",$forms_access)) {
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
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title> Add IN/OUT</title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="fmb Software" />
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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
    <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>


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
                            <h5><?php echo "ADD IN/OUT" ?></h5>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"><i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href=""><?php echo "ADD IN/OUT" ?></a> </li>
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
                                        <h5 class="sub-title">ADD IN/OUT</h5>


                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $item_id = $_POST['item_id'];
                                            $quantity = $_POST['quantity'];
                                            $type = $_POST['type'];

                                            $s1 = "INSERT INTO in_out (`item_id`,`quantity`,`created_date`,`created_timestamp`,`type`,`status`,`created_admin_id`) VALUES ($item_id,'$quantity','$date','$time',$type,0,$admin_id)";
                                            if (mysqli_query($conn, $s1)) {
                                                if ($type == 0) {
                                                    $s2 = "UPDATE item_info set available=available+$quantity where id=$item_id";
                                                } else {
                                                    $s2 = "UPDATE item_info set available=available-$quantity where id=$item_id";
                                                }
                                                if (mysqli_query($conn, $s2)) {
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
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="type" class="form-control">
                                                        <option value="0">INWARD</option>
                                                        <option value="1">OUTWARD</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Item</label>
                                                <div class="col-sm-10">

                                                    <select name="item_id" id="item_id" onchange="change_item_id_available()" class="form-control" required>
                                                        <option >SELECT ITEM</option>
                                                        <?php
                                                        $sql = "SELECT name,id from item_info where status=1";
                                                        $run = $conn->query($sql);
                                                        while ($row = $run->fetch_assoc()) {
                                                            $name = $row['name'];
                                                            $id = $row['id'];
                                                           
                                                        ?>
                                                            <option value='<?php echo $id  ?>'><?php echo $name  ?></option>


                                                        <?php   }

                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">In Stock</label>
                                                <div class="col-sm-10">
                                                    <div id="available"></div>


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-10">

                                                    <input type="number" placeholder="Enter Item Quantity" name="quantity" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">

                                                    <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" value="submit">Submit</button>

                                                </div>
                                            </div>


                                        </form>

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
    <script src="select.js"></script>
    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>