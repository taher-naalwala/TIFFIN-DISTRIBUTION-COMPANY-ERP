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

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title> Add Menu</title>


    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

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
    require('search_item_css.php');

    ?>
    <div class="pcoded-content">

        <div class="page-header card">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="feather icon-box bg-c-blue"></i>
                        <div class="d-inline">
                            <h5><?php echo "ADD Menu" ?></h5>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"><i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href=""><?php echo "ADD Menu" ?></a> </li>
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

                                <?php
                                if (isset($_POST['submit'])) {

                                    $menu_type = $_POST['type'];
                                    $menu_date = $_POST['menu_date'];
                                    $hijri_date = $_POST['hijri_date'];
                                    $hijri_month = $_POST['hijri_month'];
                                    $hijri_year = $_POST['hijri_year'];
                                    $container_type = $_POST['container_type'];
                                    $no_of_container = $_POST['no_of_container'];
                                    $cost_of_menu = $_POST['ordertotal'];
                                    $per_container_cost = $_POST['per_container_cost'];
                                    $nazarul_makam = $_POST['nazarul_makam'];
                                    $dish_id_array = $_POST['dish_id'];
                                    $item_id_array = $_POST['item_id'];
                                    $item_rate_array = $_POST['unitprice'];
                                    $item_quantity_array = $_POST['qtyorder'];
                                    $menu_dish_item_array = $_POST['menu_dish_item'];
                                    $menu_dish_item_array_unq = array_unique($menu_dish_item_array);
                                    $label = $_POST['label'];

                                     $dish_id_array_unq = array_unique($dish_id_array);

                                    $sql = "INSERT INTO `menu_info` ( `type`, `date`, `hijri_date`, `hijri_month`, `hijri_year`, `nazar`, `container_type`, `total_container`, `cost_of_menu`, `cost_per_container`, `status`,`created_date`,`created_timestamp`,`created_admin_id`,`label`) VALUES ( $menu_type, '$menu_date', '$hijri_date', '$hijri_month', '$hijri_year', '$nazarul_makam', $container_type, '$no_of_container', '$cost_of_menu', '$per_container_cost', 1,'$date','$time',$admin_id,'$label')";
                                    if (mysqli_query($conn, $sql)) {
                                        $s1 = "SELECT id from menu_info where type=$menu_type and date='$menu_date' and hijri_date='$hijri_date' and hijri_month='$hijri_month' and hijri_year='$hijri_year' and nazar='$nazarul_makam' and container_type=$container_type and total_container='$no_of_container' and cost_of_menu='$cost_of_menu' and cost_per_container='$per_container_cost' and status=1 and created_date='$date' and created_timestamp='$time' and label='$label'";
                                        $run = $conn->query($s1);
                                        $row = $run->fetch_assoc();
                                        $menu_id = $row['id'];
                                        foreach ($dish_id_array_unq as $dish_id_unq) {
                                            $s2 = "INSERT INTO menu_dish ( `menu_id`, `dish_id`) VALUES ($menu_id,$dish_id_unq)";
                                            mysqli_query($conn, $s2);
                                        }

                                        foreach ($menu_dish_item_array_unq as $index => $menu_dish_item) {

                                            list($item_id,$dish_id,$item_name,$item_quantity,$item_rate) = explode('/', $menu_dish_item);
                                           


                                            $s3 = "INSERT INTO `menu_dish_item` (`menu_id`, `dish_id`, `item_id`, `item_name`, `quantity`, `rate`) VALUES ( $menu_id, $dish_id, $item_id, '$item_name', '$item_quantity', '$item_rate')";
                                            if (mysqli_query($conn, $s3)) {
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
                                        /*
                                        foreach ($dish_id_array as $index => $dish_id) {
                                            $item_id = $item_id_array[$index];
                                            $item_quantity = $item_quantity_array[$index];
                                            $item_rate = $item_rate_array[$index];

                                            $s3 = "SELECT name from item_info where id=$item_id";
                                            $run3 = $conn->query($s3);
                                            $row3 = $run3->fetch_assoc();
                                            $item_name = $row3['name'];
                                           
                                                $s4="SELECT id from menu_dish where menu_id=$menu_id and dish_id";

                                                $s3 = "INSERT INTO `menu_dish_item` (`menu_id`, `dish_id`, `item_id`, `item_name`, `quantity`, `rate`) VALUES ( $menu_id, $dish_id, $item_id, '$item_name', '$item_quantity', '$item_rate')";
                                                if (mysqli_query($conn, $s3)) {
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
                                            
                                        } */
                                        ?>
                                        <script type="text/javascript">
                                            window.location = 'form_view_menu.php?menu_id=<?php echo $menu_id ?>';
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

                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">ADD Menu</h5>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="type" class="form-control fill" required>
                                                        <option value="" disabled selected>Select Type</option>
                                                        <option value="0">NORMAL</option>

                                                        <option value="1">MIQAAT</option>

                                                    </select>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">

                                                    <input type="text" name="menu_date" placeholder="Select Menu Date" autocomplete="FALSE" class="form-control" id="datepicker" required>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hijri Date</label>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <input type="number" name="hijri_date" placeholder="Date" autocomplete="FALSE" class="form-control" required>


                                                        </div>
                                                        <div class="col-lg-4">
                                                            <select name="hijri_month" class="form-control" required>
                                                                <option value="" disabled>--Hijri Month--</option>
                                                                <option value="Moharram al-Haraam">Moharram al-Haraam</option>
                                                                <option value="Safar al-Muzaffar">Safar al-Muzaffar</option>
                                                                <option value="Rabi al-Awwal">Rabi al-Awwal</option>
                                                                <option value="Rabi al-Aakhar">Rabi al-Aakhar</option>
                                                                <option value="Jumada al-Ula">Jumada al-Ula</option>
                                                                <option value="Jumada al-Ukhra">Jumada al-Ukhra</option>
                                                                <option value="Rajab al-Asab">Rajab al-Asab</option>
                                                                <option value="Shabaan al-Karim">Shabaan al-Karim</option>
                                                                <option value="Ramadaan al-Moazzam">Ramadaan al-Moazzam</option>
                                                                <option value="Shawwal al-Mukarram">Shawwal al-Mukarram</option>
                                                                <option value="Zilqadah al-Haraam">Zilqadah al-Haraam</option>
                                                                <option value="Zilhaj al-Haraam">Zilhaj al-Haraam</option>
                                                            </select>

                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="number" name="hijri_year" placeholder="Year" autocomplete="FALSE" class="form-control" required>


                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Container</label>
                                                <div class="col-sm-10">

                                                    <select name="container_type" class="form-control fill" required>
                                                        <option value="" disabled selected>Select Container</option>
                                                        <option value="0">THAALI</option>

                                                        <option value="1">THAAL</option>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Number of Container</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Enter Number of Containers" name="no_of_container" class="form-control" id="no_of_container" onfocus="this.removeAttribute('readonly');" required />

                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Cost of Menu</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Enter Cost of Menu" class="ordertotal form-control" name="ordertotal" id="menu_cost" value="0.00" readonly required />

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Per Container Cost</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="per_container_cost" id="per_container_cost" readonly="readonly" tabindex="-1" value="0.00" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nazarul Makam</label>
                                                <div class="col-sm-10">

                                                    <input type="number" placeholder="Enter Nazarul Makam" name="nazarul_makam" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Label</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Enter Label (Optional)" name="label" class="form-control" onfocus="this.removeAttribute('readonly');" />

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">ADD Dish</h5>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Dish</label>
                                                <div class="row">
                                                    <div class="col-sm-10 col-lg-9">

                                                        <div class="search-box">

                                                            <input class="form-control" name="input" id="input" type="text" autocomplete="off" placeholder="Enter Dish Name..." />

                                                            <div class="result"></div>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-10 col-lg-3">

                                                        <button class="btn btn-mat waves-effect waves-light btn-primary" name="submit" id="add" value="submit">ADD</button>

                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                    <div id="dynamic_field">

                                    </div>
                                    <button name="submit" value="submit" class="btn btn-mat waves-effect waves-light btn-primary btn-block">Submit</button>
                                </form>
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




    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/jquery.min.js"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/popper.min.js"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/bootstrap.min.js"></script>

    <script src="js/waves.min.js" type="1fe1b88cea5b2fe8354363ed-text/javascript"></script>

    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/jquery.slimscroll.js"></script>

    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/modernizr.js"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/css-scrollbars.js"></script>

    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/jquery.tabledit.js"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/editable.js"></script>

    <script src="js/pcoded.min.js" type="1fe1b88cea5b2fe8354363ed-text/javascript"></script>
    <script src="js/vertical-layout.min.js" type="1fe1b88cea5b2fe8354363ed-text/javascript"></script>
    <script src="js/jquery.mcustomscrollbar.concat.min.js" type="1fe1b88cea5b2fe8354363ed-text/javascript"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript" src="js/script.js"></script>


    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="1fe1b88cea5b2fe8354363ed-text/javascript"></script>
    <script type="1fe1b88cea5b2fe8354363ed-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script src="js/rocket-loader.min.js" data-cf-settings="1fe1b88cea5b2fe8354363ed-|49" defer=""></script>

    <script>
        $('.search-box input[type="text"]').on("keyup input", function() {
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if (inputVal.length) {
                $.get("search_dish.php", {
                    term: inputVal
                }).done(function(data) {
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else {
                resultDropdown.empty();
            }
        });

        var count = 0;

        $(function() {

            $('#add').on('click', function(e) {

                e.preventDefault();

                $.ajax({
                    type: 'GET',
                    url: 'ajax_menu_dish.php?count=' + count + '&',
                    data: $('#input').serialize(),
                    success: function(response) {
                        $('#dynamic_field').append(response);
                        update_amounts();
                        update_per_container_cost();
                        count = count + 1;


                    }
                });
                $(document).on({
                    ajaxStart: function() {
                        $("body").addClass("loading");
                    },
                    ajaxStop: function() {
                        $("body").removeClass("loading");
                    }
                });


            });

        });

        $(document).ready(function() {
            $('.qtyorder').on("keyup change", function() {
                update_amounts();

            });
        });
        $('.unitprice').on("keyup change", function() {
            update_amounts();

        });

        $('#no_of_container').on("keyup change", function() {
            update_per_container_cost();

        });

        function update_per_container_cost() {
            var total_container = $('#no_of_container').val();
            var menu_cost = $('#menu_cost').val();
            var per_container_cost = menu_cost / total_container;
            per_container_cost = per_container_cost.toString().substring(0, 5);

            $('#per_container_cost').val(per_container_cost);
        }

        function update_amounts() {
            var sum = 0.0;
            $('#ordertable > tbody  > tr').each(function() {
                var price = parseFloat($(this).find('.unitprice').val());
                var qty = parseFloat($(this).find('.qtyorder').val());
                var amount = (qty * price)

                if (amount > 0) {
                    $(this).find('.subtotal').html(amount);
                    sum = sum + amount;
                } else {
                    $(this).find('.subtotal').html("0.00");
                }
            });

            if (sum > 0) $('.ordertotal').val(sum);
            else $('.ordertotal').val("0.00");
            update_per_container_cost();
        }
    </script>


    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>