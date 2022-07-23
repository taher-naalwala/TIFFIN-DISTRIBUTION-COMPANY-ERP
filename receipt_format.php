<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea<?php echo $zabihat_id ?>')" value="Print" />
<br>
<br>
<div id="printableArea<?php echo $zabihat_id ?>">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <style>
            .box_receipt1 {
                margin-top: 10px;
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
                height: 470px;
                border: 1px solid #000000;
                word-wrap: break-word;

            }

            @media print {

                .print-area {
                    display: block;
                }

                .box_receipt1 {
                    margin-top: 10px;
                    padding-left: 10px;
                    padding-right: 10px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    height: 480px;
                    border: 1px solid #000000;
                    word-wrap: break-word;

                }


                .example-screen {
                    display: none;
                }



            }
        </style>
    </head>


    <?php
    function getIndianCurrency($number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(
            0 => '', 1 => 'ONE', 2 => 'TWO',
            3 => 'THREE', 4 => 'FOUR', 5 => 'FIVE', 6 => 'SIX',
            7 => 'SEVEN', 8 => 'EIGHT', 9 => 'NINE',
            10 => 'TEN', 11 => 'ELEVEN', 12 => 'TWELVE',
            13 => 'THIRTEEN', 14 => 'FOURTEEN', 15 => 'FIFTEEN',
            16 => 'SIXTEEN', 17 => 'SEVENTEEN', 18 => 'EIGHTEEN',
            19 => 'NINETEEN', 20 => 'TWENTY', 30 => 'THIRTY',
            40 => 'FORTY', 50 => 'FIFTY', 60 => 'SIXTY',
            70 => 'SEVENTY', 80 => 'EIGHTY', 90 => 'NINETY'
        );
        $digits = array('', 'HUNDRED', 'THOUSAND', 'LAKH', 'CRORE');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'RUPEES ' : '') . $paise;
    }

    ?>

    <body>
        <div class="box_receipt1">
            <p style="text-align:left;">
                <u><b>RECEIPT</b></u>
                <span style="float:right;">
                    <b><?php
                        echo $trust_reg;  ?></b>
                </span>

            </p>
            <p class="text-center"><b><?php echo $trust_name ?></b></p>
            <p class="text-center"><?php echo $trust_address ?></p>
            <br>
            <p style="text-align:left;">
                Receipt No. &nbsp;&nbsp;&nbsp;<b><?php echo "Z/" . $zabihat_id ?></b>
                <span style="float:right;">
                    Date &nbsp;&nbsp;<u><b><?php echo $date ?></b></u>
                </span>
            </p>

            <p>Received with Thanks from &nbsp;&nbsp;<u><b><?php echo $name ?></b></u></p>



            <p>Rupees in Words &nbsp;&nbsp;<u><b><?php echo getIndianCurrency($amount) ?></b></u></p>

            <?php
            if ($pay_mode == 1) {
            ?>

                <p>By CHEQUE NO. &nbsp;&nbsp;<u><b><?php echo $cn ?></b></u></p>
            <?php
            } else if ($pay_mode == 0) {
            ?>
                <p>By CASH &nbsp;&nbsp;</p>
            <?php
            } else {
            ?>
                <p>By ONLINE TXN ID. &nbsp;&nbsp;<u><b><?php echo $cn ?></b></u></p>
            <?php
            }

            ?>

            <p style="text-align:left;">
                against Purpose &nbsp;&nbsp;<u><b><?php echo $purpose ?></b></u>
                <span>
                    on Date &nbsp;&nbsp;<u><b><?php echo  $created_date ?></b></u>
                </span>
            </p>

            <p>at &nbsp;&nbsp;<u><b><?php echo $place; ?></b></u></p>

            <style>
                .box_r1 {
                    width: 150px;
                    height: 50px;
                    border: 1px solid #000000;
                    word-wrap: break-word;

                }
            </style>

            <div class="box_r1 text-center">
                &#x20B9;&nbsp;<b><?php echo $amount ?></b>

            </div>
            <p style="text-align:center;margin-left:200px">
                Donor's Sign
                <span style="float:right;">
                    Receiver's Sign
                </span>
            </p>
            <?php
            if ($zabihat_date == 0) {
            } else {
            ?>

                <p>Note: Zabihat is scheduled on <?php echo $zabihat_date ?></p>

            <?php
            }
            ?>
        </div>
        <br>
        <br>
        <div class="box_receipt1">
            <p style="text-align:left;">
                <u><b>RECEIPT</b></u>
                <span style="float:right;">
                    <b><?php
                        echo $trust_reg;  ?></b>
                </span>

            </p>
            <p class="text-center"><b><?php echo $trust_name ?></b></p>
            <p class="text-center"><?php echo $trust_address ?></p>
            <br>
            <p style="text-align:left;">
                Receipt No. &nbsp;&nbsp;&nbsp;<b><?php echo "Z/" . $zabihat_id ?></b>
                <span style="float:right;">
                    Date &nbsp;&nbsp;<u><b><?php echo $date ?></b></u>
                </span>
            </p>

            <p>Received with Thanks from &nbsp;&nbsp;<u><b><?php echo $name ?></b></u></p>



            <p>Rupees in Words &nbsp;&nbsp;<u><b><?php echo getIndianCurrency($amount) ?></b></u></p>

            <?php
            if ($pay_mode == 1) {
            ?>

                <p>By CHEQUE NO. &nbsp;&nbsp;<u><b><?php echo $cn ?></b></u></p>
            <?php
            } else if ($pay_mode == 0) {
            ?>
                <p>By CASH &nbsp;&nbsp;</p>
            <?php
            } else {
            ?>
                <p>By ONLINE TXN ID. &nbsp;&nbsp;<u><b><?php echo $cn ?></b></u></p>
            <?php
            }
            ?>

            <p style="text-align:left;">
                against Purpose &nbsp;&nbsp;<u><b><?php echo $purpose ?></b></u>
                <span>
                    on Date &nbsp;&nbsp;<u><b><?php echo  $created_date ?></b></u>
                </span>
            </p>

            <p>at &nbsp;&nbsp;<u><b><?php echo $place; ?></b></u></p>

            <style>
                .box_r1 {
                    width: 150px;
                    height: 50px;
                    border: 1px solid #000000;
                    word-wrap: break-word;

                }
            </style>

            <div class="box_r1 text-center">
                &#x20B9;&nbsp;<b><?php echo $amount ?></b>

            </div>
            <p style="text-align:center;margin-left:200px">
                Donor's Sign
                <span style="float:right;">
                    Receiver's Sign
                </span>
            </p>
            <?php
            if ($zabihat_date == 0) {
            } else { ?>
                <p>Note: Zabihat is scheduled on <?php echo $zabihat_date ?></p>
            <?php
            }
            ?>

        </div>
        <script>
            function printDiv(divName) {

                var printContents = document.getElementById(divName).innerHTML;
                w = window.open();

                w.document.write(printContents);
                w.document.write('<scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

                w.document.close(); // necessary for IE >= 10
                w.focus(); // necessary for IE >= 10

                return true;

            }
        </script>
    </body>

    </html>
</div>
<script>
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        w = window.open();

        w.document.write(printContents);
        w.document.write(' <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet"> <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <link rel="stylesheet" href="css/waves.min.css" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="css/feather.css"> <link rel="stylesheet" href="css/chartist.css" type="text/css" media="all"> <link rel="stylesheet" type="text/css" href="css/style.css"> <link rel="stylesheet" type="text/css" href="css/widget.css"> <link rel="stylesheet" type="text/css" href="css/themify-icons.css"> <link rel="stylesheet" type="text/css" href="css/icofont.css"> <link rel="stylesheet" type="text/css" href="css/pages.css"> <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> <scr' + 'ipt type="text/javascript">' + 'window.onload = function() { window.print(); window.close(); };' + '</sc' + 'ript>');

        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10

        return true;

    }
</script>