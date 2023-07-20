<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="images/fevicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>

    <style>

.card {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 20px;
  height: auto;
  display: flex;
}

.card-img {
  flex: 1;
  max-width: 50%;
  height: auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-img img {
  max-height: 100%;
  max-width: 100%;
  object-fit: contain;
}

.card-details {
  flex: 5;
  padding: 10px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-description h3 {
  font-size: 18px;
  margin-bottom: 5px;
}

.card-footer {
  margin-top: auto;
}

.card-footer p {
  font-size: 16px;
  margin-bottom: 5px;
}

.order-button {
  display: block;
  margin-top: 10px;
}




    .display-6 {
        margin-top: 70px;
        border-bottom: 1px solid white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .display-6 a {
        text-decoration: none;
        color: white;
    }

    .display-6 a i {
        font-size: 20px;
        margin-left: 20px;
        color: white;
    }

    .menu {
        font-size: 40px;
        font-weight: bold;
        color:white;
    }

    .home-search {
        display: flex;
        align-items: center;
        gap: 25px;
    }

    .home {
        font-size: 16px;
        font-weight: bold;
    }

    .search {
        font-size: 16px;
    }

    .time-price {
        display: flex;
        justify-content: space-between;
        font-size: 20px;
        margin-bottom: 5px;
    }

    .order-button {
        display: block;
        margin-top: 10px;
    }
</style>



</head>

<body class="bg-dark">
    <?php 
    require_once 'user-registration/lib/DataSource.php';
    session_start();
    $database = new \Phppot\DataSource();
    $username = $_SESSION["username"];
    $user_orders = "SELECT * from `orders` where `username`='$username'";
    $result3 = $database->select1($user_orders);
    ?>
    <div class="container">
      <div class="card-header">
        <h2 class="display-6 text-center">
          <span class="menu">My Orders</span>
          <span class="home-search">
          <?php if (isset($_SESSION["username"])) { ?>
        <a href="user-registration/home.php" class="home"><i class="fa fa-home"></i><span>Home</span></a>
    <?php } else { ?>
        <a href="index.php" class="home"><i class="fa fa-home"></i><span>Home</span></a>
    <?php } ?>
     
            
            
          </span>
        </h2>
      </div>
      <?php
    if (!empty($result3)) {
        // $itemIds = array();
        foreach ($result3 as $row) {
            // $itemIds[] = $row["item_id"];
            $item_id = $row["item_id"];
            $timestamp = $row["timestamp"];
            $deliveryLocation = $row["Delivery_Location"];
            $res_ord = "SELECT * FROM `menu` WHERE `item_id`=$item_id";
    $result4 = $database->select1($res_ord);
        
        // $itemIdsString = implode(",", $itemIds);
    
   ?>
        
        
               <!-- <hr>  -->
               <div class="row mt-5">
                 <?php
                 foreach ($result4 as $row) {
                   $i_id = $row["item_id"];
                   $i_photo = $row["photo"];
                   $i_name = $row["item_name"];
                   $i_time = $row["d_time"];
                   $i_price = $row["price"];
                 ?>
                  
                  <div class="card">
  <div class="row">
    <!-- <div class="col-md-6"> -->
      <div class="card-img">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($i_photo); ?>" alt="Food Photo">
      </div>
    <!-- </div> -->
    <!-- <div class="col-md-6"> -->
      <div class="card-details">
        <div class="card-description">
          <h2><?php echo $i_name; ?></h2>
        </div>
        <div class="card-footer">
          <div class="amount">
            <p>Amount: <?php echo "Rs.".$i_price; ?></p>
          </div>
          <div class="deliveryLocation">
            <p>Delivery Location: <?php echo $deliveryLocation; ?></p>
          </div>
          <div class="timestamp">
            <p>Timestamp: <?php echo $timestamp; ?></p>
          </div>
          
          <div class="order-button">
            
          </div>
        </div>
      <!-- </div> -->
    </div>
  </div>
</div>

                 <?php
                 }
                 ?>
                 
               </div>
             
        <?php
    } }
    else {
        echo "No records found.";
    }?>
    </div>
    

          
    
    
    


    
</body>
</html>