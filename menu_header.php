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

      .filter-container {
  margin-bottom: 10px;
}

.filter-container label {
  margin-right: 5px;
}

.filter-container select {
  padding: 5px;
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
<body>
<?php
require_once 'user-registration/lib/DataSource.php';
session_start();
$database = new \Phppot\DataSource();
$items = "SELECT * from `menu`";
$result = $database->select1($items);

?>

</body>
</html>