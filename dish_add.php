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

    if (in_array("2", $forms_access) || in_array("11", $forms_access)) {
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
    <title> Add Dish</title>


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
                            <h5><?php echo "ADD Dish" ?></h5>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                        <ul class=" breadcrumb breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="main.php"><i class="feather icon-box"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href=""><?php echo "ADD Dish" ?></a> </li>
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



                                <form method="POST">

                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">ADD Dish</h5>
                                            <?php
                                            if (isset($_POST['submit'])) {
                                                $dish_name = $_POST['dish_name'];
                                                $dish_type = $_POST['dish_type'];
                                                $rating = $_POST['rating'];
                                                $calorie = $_POST['calorie'];
                                                $cost = $_POST['ordertotal'];
                                                $sql = "SELECT COUNT(*) as c from dish_info where name='$dish_name' and status=1";
                                                $run = $conn->query($sql);
                                                $row = $run->fetch_assoc();
                                                $c = $row['c'];
                                                if ($c > 0) {
                                                    echo "DISH ALREADY EXISTS";
                                                } else {
                                                    $s1 = "INSERT INTO dish_info (`name`, `type`, `rating`, `calorie`,`cost`, `created_date`, `created_timestamp`, `created_admin_id`,`status`) VALUES ('$dish_name','$dish_type','$rating','$calorie','$cost','$date','$time',$admin_id,1)";
                                                    if (mysqli_query($conn, $s1)) {
                                                        $s3 = "SELECT id from dish_info where name='$dish_name'";
                                                        $run3 = $conn->query($s3);
                                                        $row3 = $run3->fetch_assoc();
                                                        $dish_id = $row3['id'];
                                                        $item_id_array = $_POST['item_id'];
                                                        $unitprice = $_POST['unitprice'];
                                                        $qtyorder = $_POST['qtyorder'];
                                                        $subtotal = $_POST['subtotal'];
                                                        foreach ($item_id_array as $id => $item_id) {
                                                            $item_rate = $unitprice[$id];
                                                            $item_quantity = $qtyorder[$id];
                                                            $item_cost = $subtotal[$id];
                                                            $s2 = "INSERT INTO dish_item ( `dish_id`, `item_id`, `quantity`, `rate`, `cost`) VALUES ($dish_id,'$item_id','$item_quantity','$item_rate','$item_cost')";
                                                            if (mysqli_query($conn, $s2)) {
                                                            } else {
                                                                echo "There was issue adding some items in dish_item table";
                                                            }
                                                        }
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
                                                            <strong>Fail</strong>
                                                        </div>
                                            <?php
                                                    }
                                                }
                                            }

                                            ?>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Enter Dish Name" name="dish_name" class="form-control" onfocus="this.removeAttribute('readonly');" required />

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Type</label>
                                                <div class="col-sm-10">

                                                    <select name="dish_type" class="form-control fill" required>
                                                        <option value="" disabled selected>Select Type</option>
                                                        <option value="STARTER">STARTER</option>

                                                        <option value="MAIN COURSE">MAIN COURSE</option>
                                                        <option value="SIDE DISH">SIDE DISH</option>
                                                        <option value="DESERT">DESERT</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Rating</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Rate Dish Out of 10" name="rating" class="form-control" onfocus="this.removeAttribute('readonly');" />

                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Calorie</label>
                                                <div class="col-sm-10">

                                                    <input type="text" placeholder="Enter Calorie of Dish" name="calorie" class="form-control" onfocus="this.removeAttribute('readonly');" />

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Dish Cost</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="ordertotal form-control" name="ordertotal" tabindex="-1" value="0.00" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">

                                        <div class="card-block">
                                            <h5 class="sub-title">ADD Item</h5>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Item</label>
                                                <div class="row">
                                                    <div class="col-sm-10 col-lg-9">

                                                        <div class="search-box">

                                                            <input class="form-control" name="input" id="input" type="text" autocomplete="off" placeholder="Enter Item Name..." />

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
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Items</h5>

                                        </div>
                                        <div class="card-block">

                                            <div class="table-responsive">
                                                <table class="order-table table table-striped table-bordered" id="ordertable">
                                                    <thead>
                                                        <tr>
                                                            <th class="order-name">Name</th>
                                                            <th class="order-price">Rate</th>
                                                            <th class="order-qtytotal">Quantity</th>
                                                            <th class="order-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
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
                $.get("search_item.php", {
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
                    url: 'ajax_dish_item.php?count=' + count + '&',
                    data: $('#input').serialize(),
                    success: function(response) {
                        $('tbody').append(response);
                        update_amounts();
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
        }

        $(document).ready(function() {


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
                update_amounts();
            });
        });
    </script>


    <?php
    require('footer.php');
    ?>
</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>