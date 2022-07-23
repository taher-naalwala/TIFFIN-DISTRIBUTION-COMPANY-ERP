<?php
error_reporting(0);
?>

<input type="submit" class="btn btn-warning float-right" onclick="printDiv('printableArea<?php echo $menu_id ?>')" value="Print" />
<div id="printableArea<?php echo $menu_id ?>">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head id="Head1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Menu Form
        </title>

        <style>
            .ar {
                font-family: "AL-FATEMI(Lisaan-ud-Dawat)", serif;
                font-size: 36px;
            }

            .brk {
                page-break-after: always;
            }

            td {
                padding: 5px;
            }

            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                    margin: 0px;
                }
            }
        </style>

    </head>

    <body class="page-body  page-fade boxed-layout">
        <center>


            <table border="1" width="725" align="center">
                <tbody>
                    <tr>
                        <td colspan="2" width="100%">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 18px Arial, Helvetica, sans-serif;"><b><?php echo $trust_name ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo $trust_address  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b><?php echo $trust_reg  ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" style="font: 16px Arial, Helvetica, sans-serif;"><b>Managed By : Anjuman-E-Saifee</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <table width="100%">

                                <tbody>

                                    <tr>
                                        <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Menu ID:</b> <?php echo $menu_id  ?></td>
                                        <td align="right" style="font: 14px Arial, Helvetica, sans-serif;"><b>Date :</b> <?php echo date('d F Y [D]', strtotime($date)) ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left" style="font: 14px Arial, Helvetica, sans-serif;"><b>Purpose of Issue:</b> MENU</td>
                                        <td align="right" style="font: 16px Arial, Helvetica, sans-serif;"><b>FORM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%">
                                <tbody>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td colspan="10" align="center" style="font: 14px Arial, Helvetica, sans-serif;"><b>MENU INFORMATION</b></td>
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Hijri Date:</b> <?php echo $hijri_date . " " . $hijri_month . " " . $hijri_year  ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Date:</b> <?php echo $menu_date  ?></td>



                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Type: </b> <?php echo $menu_type_name ?></td>
                                        <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Container:</b> <?php echo $container_type_name ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Number of Container:</b> <?php echo $total_container ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Cost of Menu:</b> <?php echo $cost_of_menu  ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Per Container Cost:</b> <?php echo $cost_per_container ?></td>
                                        <td align="left" width="40%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Nazarul Makam:</b> <?php echo $nazarul_makam ?></td>

                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <td align="left" colspan="2" style="font: 14px Arial, Helvetica, sans-serif;"><b>Label:</b> <?php echo $label ?></td>
                                       
                                    </tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <tr></tr>
                                    <style>
                                        #box {
                                           
                                            width: 24%;

                                            background-color: lightgrey;

                                            border: 4px solid green;
                                            padding: 10px;
                                            margin: 5px;
                                        }

                                        #upper_handle {



                                            height: 30px;
                                            width: 30%;
                                            border-radius: 150px 150px 0 0;
                                            background-color: green;
                                        }

                                        #lower_handle {
                                            height: 30px;
                                            width: 30%;
                                            border-radius: 0 0 150px 150px;
                                            background-color: green;
                                        }
                                    </style>
                                    <tr>
                                        <td align="center" colspan="3" style="font: 14px Arial, Helvetica, sans-serif;">
                                            <p id="upper_handle"></p>
                                            <?php
                                            $s3 = "SELECT dish_id from menu_dish where menu_id=$menu_id";
                                            $run3 = $conn->query($s3);
                                            while ($row3 = $run3->fetch_assoc()) {
                                                $dish_id = $row3['dish_id'];
                                                $s4 = "SELECT name from dish_info where id=$dish_id";
                                                $run4 = $conn->query($s4);
                                                $row4 = $run4->fetch_assoc();
                                                $dish_name = $row4['name'];
                                            ?>
                                                <p id="box"><?php echo $dish_name ?></p>

                                               
                                             


                                            <?php
                                            }
                                            ?>
                                            <p id="lower_handle"></p>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!--
            <tr>

                <td colspan="2">
                    <table width="100%">
                        <tbody>

                            <tr>

                                <td align="left" width="30%" style="font: 14px Arial, Helvetica, sans-serif;"><b>Voluntary Contribution:</b> <?php // echo "Rs. " . $amt  
                                                                                                                                                ?></td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
                                -->


                    <tr>
                        <td colspan="2">
                            <table width="100%">
                                <tbody>




                                    <tr>
                                        <td colspan="2">
                                            <table width="100%">

                                                <tbody>
                                                    <br>

                                                    <tr>
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;"> <?php
                                                                                                                                if ($status == 0) {
                                                                                                                                ?>
                                                                <img src="images/deleted.png" style="max-width: 100px;">
                                                            <?php
                                                                                                                                } else {
                                                            ?>

                                                            <?php
                                                                                                                                }
                                                            ?>
                                                        </td>

                                                    </tr>

                                                    <tr>
                                                        <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                    </tr>


                                                    <tr>
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>


                                                        <td align="center" style="font: 12px Arial, Helvetica, sans-serif;">____________________</td>
                                                    </tr>
                                                    <tr>


                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Secretary</td>
                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Finance</td>
                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Procurement</td>
                                                        <td align="center" valign="top" style="font: 12px Arial, Helvetica, sans-serif;">Operation</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="center" style="font: 16px Arial, Helvetica, sans-serif;">&nbsp;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                </tbody>
            </table>
            </td>
            </tr>





            </tbody>
            </table>
            </td>
            </tr>



            </tbody>
            </table>
            <p style="page-break-after:always;"></p>
        </center>
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