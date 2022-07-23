<?php
require('connectDB.php');
if (isset($_GET['item_id_available'])) {
    $item_id = $_GET['item_id_available'];
    $sql = "SELECT available from item_info where id=$item_id";
    $run = $conn->query($sql);
    $row = $run->fetch_assoc();

    $available = $row['available'];
?>
    <p><?php echo $available ?></p>
<?php
}
