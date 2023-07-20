<?php
require_once 'user-registration/lib/DataSource.php';
$database = new \Phppot\DataSource();

// Get the selected category
$category = $_GET['category'];

// Prepare the SQL query
if ($category === 'all') {
  $sql = "SELECT * FROM `menu`";
} else {
  $sql = "SELECT * FROM `menu` WHERE `category` = '$category'";
}

$fres = $database->select1($sql);

if (!empty($fres)) {
  foreach ($fres as $row) {
    $i_id = $row["item_id"];
    $i_photo = $row["photo"];
    $i_name = $row["item_name"];
    $i_time = $row["d_time"];
    $i_price = $row["price"];
    ?>

    <div class="col-md-4">
      <div class="card">
        <div class="card-img">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($i_photo); ?>" alt="Food Photo">
        </div>
        <div class="card-description">
          <h3><?php echo $i_name; ?></h3>
          <div class="time-price">
            <!-- <p><?php //echo $i_time; ?></p> -->
      
            <p><?php echo "Rs." . $i_price; ?></p>
            <button class="btn btn-dark order-button" data-item-id="<?php echo $i_id; ?>" data-item-name="<?php echo $i_name; ?>" data-item-time="<?php echo $i_time; ?>">Order</button>
          </div>
         
        </div>
      </div>
    </div>

<?php
  }
} else {
  echo "No records found.";
}
?>
