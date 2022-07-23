<?php

require('connectDB.php');
$get_id = $_GET['input'];
$count=$_GET['count'];
if (strripos($get_id, '(') !== false) {

    $first_index = strripos($get_id, "(") + 1;
    $s_id_e = substr($get_id, $first_index);
    $get_id = rtrim($s_id_e, ") ");
}

$sql = "SELECT rate,per,name from item_info WHERE id=$get_id";
$run = $conn->query($sql);
$row = $run->fetch_assoc();
$rate = $row['rate'];
$per = $row['per'];
$name = $row['name'];
$item_id=$get_id;


?>


<tr id="row<?php echo $count; ?>">
    <td class="order-name">
        <b> <span><?php echo $name ?></span></b>
        <input type="hidden" name="item_id[]" value="<?php echo $item_id ?>"  />
    </td>
    <td class="order-price">
        <input type="text" name="unitprice[]" class="unitprice form-control" value="<?php echo $rate; ?>" tabindex="-1">
    </td>
    <td class="order-qtytotal">
        <input type="number" class="qtyorder form-control" name="qtyorder[]" value="<?php echo "1"; ?>" min="0">
    </td>
    <td class="order-total">
        <input type="number" name="subtotal[]" class="subtotal form-control" value='<?php echo $rate ?>' readonly/>

    </td>
    <td><button type="button" name="remove" id="<?php echo $count; ?>" class="btn btn-danger btn_remove">X</button></td>
</tr>



<script>
    $(document).ready(function() {
        $('.qtyorder').on("keyup change", function() {
            update_amounts();
        });
        $('.unitprice').on("keyup change", function() {
            update_amounts();
        });
    });

    function update_amounts() {
        var sum = 0.0;
        $('#ordertable > tbody  > tr').each(function() {
            var price = parseFloat($(this).find('.unitprice').val());
            var qty = parseFloat($(this).find('.qtyorder').val());
            var amount = (qty * price)

            if (amount > 0) {
                $(this).find('.subtotal').val(amount);
                sum = sum + amount;
            } else {
                $(this).find('.subtotal').val("0");
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