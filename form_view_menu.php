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

    if (in_array("3", $forms_access) || in_array("14", $forms_access)) {
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
$get_name = "MENU FORM";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU FORM</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Qabrastan Software" />
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
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
                                        <h5 class="sub-title">Menu Form</h5>

                                        <?php
                                        $menu_id = $_GET['menu_id'];


                                        
                                        $s1 = "SELECT name,address,reg_no from trust_info where id=1";
                                        $run1 = $conn->query($s1);
                                        $row1 = $run1->fetch_assoc();
                                        $trust_name = $row1['name'];
                                        $trust_address = $row1['address'];
                                        $trust_reg = $row1['reg_no'];
                                        $s2 = "SELECT * from menu_info where id=$menu_id";
                                        $run2 = $conn->query($s2);
                                        $row5 = $run2->fetch_assoc();
                                        $menu_type=$row5['type'];
                                        if($menu_type==0)
                                        {
                                            $menu_type_name="NORMAL";
                                        }
                                        else
                                        {
                                            $menu_type_name="MIQAAT";
                                        }

                                        $menu_date=$row5['date'];

                                        $hijri_date = $row5['hijri_date'];
                                        $hijri_month = $row5['hijri_month'];
                                        $hijri_year = $row5['hijri_year'];
                                        $nazarul_makam=$row5['nazar'];

                                        $container_type=$row5['container_type'];
                                        if($container_type==0)
                                        {
                                            $container_type_name="THAALI";
                                        }
                                        else
                                        {
                                            $container_type_name="THAAL";
                                        }
                                        $total_container=$row5['total_container'];
                                        $cost_of_menu=$row5['cost_of_menu'];
                                        $cost_per_container=$row5['cost_per_container'];
                                        $status=$row5['status'];
                                        $label=$row5['label'];
                                        if(empty($label))
                                        {
                                            $label="NOT AVAILABLE";
                                        }


                                        require('form_menu_format.php');
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
    </div>

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

   
    <script src="js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>


</body>

</html>