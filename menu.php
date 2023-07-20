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
          #searchInput {
        border-radius: 20px;
        width:150px;
      }

label {
  font-size:15px;
  font-weight:bold;
}
      select {
        font-size:small;
    width: 100px; 
    height: 25px; 
  }

  select option {
    font-size: small;
    background-color: black; 
  color: white;
  }



      .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
      }

      .card {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }

      .card-img {
        flex: 1;
        overflow: hidden;
      }

      .card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .card-description {
        padding-top: 10px;
      }

      .card-description h3 {
        font-size: 18px;
        margin-bottom: 5px;
      }

      .card-description p {
        font-size: 20px;
        margin-bottom: 5px;
      }

      .card-header {
        color: white;
      }

      .display-6 {
        margin-top:70px;
  border-bottom: 1px solid white;
  display: flex;
  justify-content: space-between;
  align-items: center;
    }

.display-6 a{
      text-decoration:none;
      color:white;
}

.display-6 a i{
    font-size: 20px;
    margin-left: 20px;
    color: white;
}

.menu {
  font-size: 40px;
  font-weight:bold;
}

.home-search {
  display: flex;
  align-items: center;
  gap: 25px;
}

.home {
  font-size: 16px;
  font-weight:bold;
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
$items = "SELECT * from `menu`";
$result = $database->select1($items);

?>
    
    <div class="container">
    <div class="card-header">
    <h2 class="display-6 text-center">
      <span class="menu">Menu</span>
      <span class="home-search">
      <?php if (isset($_SESSION["username"])) { ?>
    <a href="user-registration/home.php" class="home"><i class="fa fa-home"></i><span>Home</span></a>
<?php } else { ?>
    <a href="index.php" class="home"><i class="fa fa-home"></i><span>Home</span></a>
<?php } ?>

<label for="category-dropdown">Quick Filters:</label>
<select id="category-dropdown">
  <option value="all">All</option>
  <option value="pizza">Pizza</option>
  <option value="burger">Burger</option>
  <option value="Role">Role</option>
  <option value="pasta">Pasta</option>
  <option value="biryani">Biryani</option>
  <option value="fries">Fries</option>
  
</select>


        
        <input type="text" id="searchInput" placeholder="&#128269; Search" class="search">
      </span>
    </h2>
  </div>
  
  <?php  if (!empty($result)) { ?>
           <!-- <hr>  -->
           <div id="menu-container" class="row mt-5">
             <?php
             
             $category = isset($_GET['category']) ? $_GET['category'] : 'all';


   
    if ($category === 'all') {
        $sql = "SELECT * FROM `menu`";
    } else {
        $sql = "SELECT * FROM `menu` WHERE `category` = '$category'";
    }
    $fres = $database->select1($sql);

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
              <p><?php echo "Rs.".$i_price; ?></p>
              <button class="btn btn-dark order-button" data-item-id="<?php echo $i_id; ?>" data-item-name="<?php echo $i_name; ?>" data-item-time="<?php echo $i_time; ?>">Order</button>

            </div>
                     <!-- <p></p> -->
                   </div>
                 </div>
               </div>
             <?php
             }
             ?>
             
           </div>
         </div>
    <?php
} else {
    echo "No records found.";
}?>



<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <?php if (isset($_SESSION["username"])){?>
                <h5 class="modal-title" id="orderModalLabel">Order Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div id="deliveryLocationForm">
          <div class="form-group">
            <label for="deliveryLocation">Delivery Location:</label>
            <input type="text" class="form-control" id="deliveryLocation" placeholder="Enter delivery location">
          </div>
        </div> 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="placeOrderButton">Place Order</button>
            </div>
            <?php }  else {?>
              <h5 class="modal-title" id="orderModalLabel">Error!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You need to first login to order food.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
 $(document).ready(function() {
 
  $("#category-dropdown").change(function() {
    filterMenu();
  });

  
  function filterMenu() {
    var selectedCategory = $("#category-dropdown").val(); 

   
    $.ajax({
      url: "filter_menu.php", 
      type: "GET",
      data: {
        category: selectedCategory
      },
      success: function(data) {
      
        $(".row#menu-container").html(data);
        <?php if (isset($_SESSION["username"])){?>
 $(document).ready(function() {
  $(".order-button").click(function(event) {
    var itemId = $(this).data("item-id");
    var itemName = $(this).data("item-name");
    var itemTime = $(this).data("item-time");
    var currentDate = new Date();
    var timestamp = currentDate.toISOString();

   
    $("#orderModal").find(".modal-body").html(`
    <div id="deliveryLocationForm">
      <div class="form-group">
        <label for="deliveryLocation">Delivery Location:</label>
        <input type="text" class="form-control" id="deliveryLocation" placeholder="Enter delivery location">
      </div>
    </div>
  `);

  $("#orderModal").find(".modal-footer").html(`
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="placeOrderButton">Place Order</button>
  `);

  $("#orderModal").modal("show");

  $("#placeOrderButton").click(function() {
    var deliveryLocation = $("#deliveryLocation").val().trim();

    if (deliveryLocation !== "") {
      $("#orderModal").find(".modal-body").html(`
      Your order has been placed successfully for <span id="itemName">${itemName}</span>. It will be delivered to you in <span id="itemTime">${itemTime}</span>.
      `);

      $("#orderModal").find(".modal-footer").html(`
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      `);
    }

    $.ajax({
    url: "store_item_id.php", 
    type: "POST",
    data: { itemId: itemId ,
           timestamp: timestamp,
           deliveryLocation: deliveryLocation
          },
    success: function(response) {
        
        console.log(response);
    },
    error: function(xhr, status, error) {
      
        console.error(error);
    }
});
  });
  });

 

    $("#itemName").text(itemName);
    $("#itemTime").text(itemTime);
    $("#timestamp").text(timestamp);
    $("#deliveryLocation").text(deliveryLocation);
    $("#orderModal").modal("show");

 
  $("#orderModal").on("hidden.bs.modal", function() {
    
    $("#itemName").text("");
    $("#itemTime").text("");
    $("#timestamp").text("");
    $("#deliveryLocation").text("");
  });

 
  
});
<?php } else { ?>
 $(document).ready(function() {
  $(".order-button").click(function(event) {
    var itemId = $(this).data("item-id");
    var itemName = $(this).data("item-name");
    var itemTime = $(this).data("item-time");
    var currentDate = new Date();
    var timestamp = currentDate.toISOString();

    $.ajax({
    url: "store_item_id.php", 
    type: "POST",
    data: { itemId: itemId ,
           timestamp: timestamp
          },
    success: function(response) {
       
        console.log(response);
    },
    error: function(xhr, status, error) {
       
        console.error(error);
    }
});

    $("#itemName").text(itemName);
    $("#itemTime").text(itemTime);
    $("#timestamp").text(timestamp);

    $("#orderModal").modal("show");
  });

 
  $("#orderModal").on("hidden.bs.modal", function() {
   
    $("#itemName").text("");
    $("#itemTime").text("");
    $("#timestamp").text("");
  });
});
<?php } ?>
      }
    });
    
  }
});



</script>
<script>

  $(document).ready(function() {
    $("#searchInput").keyup(function() {
      var searchText = $(this).val().toLowerCase();

    
      $(".card").each(function() {
        var cardName = $(this).find("h3").text().toLowerCase();

       
        if (cardName.indexOf(searchText) !== -1) {
          $(this).show(); 
        } else {
          $(this).hide(); 
        }
      });

     
      resetCardOrder();
    });

    
    function resetCardOrder() {
      var visibleCards = $(".card:visible");
      var hiddenCards = $(".card:hidden");
      
     
      visibleCards.each(function(index) {
        var columnIndex = index % 3;
        var targetColumn = $(".row").find(".col-md-4").eq(columnIndex);
        $(this).appendTo(targetColumn);
      });

     
      hiddenCards.each(function(index) {
        var columnIndex = index % 3;
        var targetColumn = $(".row").find(".col-md-4").eq(columnIndex);
        $(this).appendTo(targetColumn);
      });
    }

   
    resetCardOrder();
  });

    
  </script>


<script>
$(document).ready(function() {
  
    $("#category-dropdown").change(function() {
        filterMenu();
    });

   
    function filterMenu() {
        var selectedCategory = $("#category-dropdown").val(); 

       
        $.ajax({
            url: "your-php-file.php",
            type: "GET",
            data: {
                category: selectedCategory
            },
            success: function(data) {
              
                $(".menu-container").html(data);
            }
        });
    }
});


</script>
<script>


<?php if (isset($_SESSION["username"])){?>
 $(document).ready(function() {
  $(".order-button").click(function(event) {
    var itemId = $(this).data("item-id");
    var itemName = $(this).data("item-name");
    var itemTime = $(this).data("item-time");
    var currentDate = new Date();
    var timestamp = currentDate.toISOString();

   
    $("#orderModal").find(".modal-body").html(`
    <div id="deliveryLocationForm">
      <div class="form-group">
        <label for="deliveryLocation">Delivery Location:</label>
        <input type="text" class="form-control" id="deliveryLocation" placeholder="Enter delivery location">
      </div>
    </div>
  `);

  $("#orderModal").find(".modal-footer").html(`
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" id="placeOrderButton">Place Order</button>
  `);

  $("#orderModal").modal("show");

  $("#placeOrderButton").click(function() {
    var deliveryLocation = $("#deliveryLocation").val().trim();

    if (deliveryLocation !== "") {
      $("#orderModal").find(".modal-body").html(`
      Your order has been placed successfully for <span id="itemName">${itemName}</span>. It will be delivered to you in <span id="itemTime">${itemTime}</span>.
      `);

      $("#orderModal").find(".modal-footer").html(`
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      `);
    }

    $.ajax({
    url: "store_item_id.php",
    type: "POST",
    data: { itemId: itemId ,
           timestamp: timestamp,
           deliveryLocation: deliveryLocation
          },
    success: function(response) {
      
        console.log(response);
    },
    error: function(xhr, status, error) {
      
        console.error(error);
    }
});
  });
  });

 

    $("#itemName").text(itemName);
    $("#itemTime").text(itemTime);
    $("#timestamp").text(timestamp);
    $("#deliveryLocation").text(deliveryLocation);
    $("#orderModal").modal("show");

  
  $("#orderModal").on("hidden.bs.modal", function() {
  
    $("#itemName").text("");
    $("#itemTime").text("");
    $("#timestamp").text("");
    $("#deliveryLocation").text("");
  });

 
  
});
<?php } else { ?>
 $(document).ready(function() {
  $(".order-button").click(function(event) {
    var itemId = $(this).data("item-id");
    var itemName = $(this).data("item-name");
    var itemTime = $(this).data("item-time");
    var currentDate = new Date();
    var timestamp = currentDate.toISOString();

    $.ajax({
    url: "store_item_id.php",
    type: "POST",
    data: { itemId: itemId ,
           timestamp: timestamp
          },
    success: function(response) {
        
        console.log(response);
    },
    error: function(xhr, status, error) {
       
        console.error(error);
    }
});

    $("#itemName").text(itemName);
    $("#itemTime").text(itemTime);
    $("#timestamp").text(timestamp);

    $("#orderModal").modal("show");
  });

 
  $("#orderModal").on("hidden.bs.modal", function() {
    
    $("#itemName").text("");
    $("#itemTime").text("");
    $("#timestamp").text("");
  });
});
<?php } ?>
</script>
</body>
</html>


