<?php

require('connectDB.php');
$get_id = $_GET['input'];
$count = $_GET['count'];
if (strripos($get_id, '(') !== false) {

    $first_index = strripos($get_id, "(") + 1;
    $s_id_e = substr($get_id, $first_index);
    $get_id = rtrim($s_id_e, ") ");
}

$s1 = "SELECT name from dish_info where id=$get_id";
$run1 = $conn->query($s1);
$row1 = $run1->fetch_assoc();
$dish_name = $row1['name'];



?>
<div class="card" id="row<?php echo $dish_name . $count; ?>">
    <div class="card-header">
        <h5><?php echo $dish_name ?></h5> <button type="button" name="remove" id="<?php echo $dish_name . $count; ?>" class="btn btn-danger btn_remove">X</button>
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
                    <?php
                    $sql = "SELECT item_id,quantity,rate,cost,id from dish_item WHERE dish_id=$get_id";
                    $run = $conn->query($sql);
                    while ($row = $run->fetch_assoc()) {
                        $item_id = $row['item_id'];
                        $quantity = $row['quantity'];
                        $rate = $row['rate'];
                        $cost = $row['cost'];
                        $id = $row['id'];
                        $s3 = "SELECT name from item_info where id=$item_id";
                        $run3 = $conn->query($s3);
                        $row3 = $run3->fetch_assoc();
                        $item_name = $row3['name'];
                        $item_id_rates = $get_id . ";" . $item_id . ";" . $item_name . ";";
                        $combine_values=$item_id."/".$id."/".$item_name."/".$quantity."/".$rate;

                    ?>
                        <tr id="row<?php echo $dish_name . $id . $count; ?>">
                            <td class="order-name">
                                <b> <span><?php echo $item_name ?></span></b>
                            </td>
                            <td class="order-price">
                                <input type="hidden" name="item_id[]" class="form-control" value="<?php echo $item_id; ?>" tabindex="-1">
                                <input type="hidden" name="dish_id[]" class="form-control" value="<?php echo $get_id; ?>" tabindex="-1">
                                <input type="hidden" name="menu_dish_item[]" class="form-control" value="<?php echo $combine_values; ?>" tabindex="-1">

                                <input type="text" name="unitprice[]" class="unitprice form-control" value="<?php echo $rate; ?>" tabindex="-1">
                            </td>
                            <td class="order-qtytotal">
                                <input type="number" class="qtyorder form-control" name="qtyorder[]" value="<?php echo $quantity; ?>" min="0">
                            </td>
                            <td class="order-total">
                                <span name="subtotal[]" class="subtotal"><?php echo $cost ?></span>
                            </td>
                            <td><button type="button" name="remove" id="<?php echo $dish_name . $id . $count; ?>" class="btn btn-danger btn_remove">X</button></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </div>
</div>





<script>
    $(document).ready(function() {
        $('.qtyorder').on("keyup change", function() {
            update_amounts();
            update_per_container_cost();
        });
        $('.unitprice').on("keyup change", function() {
            update_amounts();
            update_per_container_cost();
        });
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

    function update_per_container_cost() {
        var total_container = $('#no_of_container').val();
        var menu_cost = $('#menu_cost').val();
        var per_container_cost = menu_cost / total_container;
        per_container_cost = per_container_cost.toString().substring(0, 5);

        $('#per_container_cost').val(per_container_cost);
    }


    $(document).ready(function() {


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            update_amounts();
            update_per_container_cost();
        });
    });
</script>