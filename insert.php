<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "muneeb";

$conn = new mysqli($servername, $username, $password, $database);
/*// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/
 
  // include_once("common/header.php");
  // include_once("common/footer.php");

if (isset($_POST['insertcash'])) {
   $cash_date = $_POST['insertcash'];
   $cash_acc_name = isset($_POST['cash_acc_name']) ? preg_replace('/[^!<>@&.\/\sA-Za-z0-9_-]/', '', $_POST['cash_acc_name']) : "" ;
    $cash_desc = isset($_POST['cash_desc']) ? preg_replace('/[^!<>@&.\/\sA-Za-z0-9_-]/', '', $_POST['cash_desc']) : "" ;
    $cash_amt = $_POST['cash_amt'];
     $cash_type = $_POST['cash_type'];
     if ($cash_type == "Income") {
  $cash_amt_ex = abs($cash_amt);
} else if ($cash_type == "Expense") {
  $cash_amt_ex = -abs($cash_amt);
}

   $insert_cash = "INSERT INTO `cashier` (`cash_date`, `cash_acc_name`, `cash_desc`, `cash_amt`, `cash_type`, `status`, `close`) VALUES ('".$cash_date."', '".$cash_acc_name."', '".$cash_desc."', '".$cash_amt_ex."', '".$cash_type."', '1', '1')";
  $result = mysqli_query($conn, $insert_cash);
if ($result) {
header('Location: index.php');

}
}

// if (isset($_POST["submitcash"])) {
// 	$cash_date = $_POST['cash_date'];
//     $cash_acc_name = $_POST['cash_acc_name'];
//     $cash_desc = $_POST['cash_desc'];
//     $cash_amt = $_POST['cash_amt'];
//      $cash_type = $_POST['cash_type'];
//      if ($cash_type == "Income") {
//   $cash_amt_ex = abs($cash_amt);
// } else if ($cash_type == "Expense") {
//   $cash_amt_ex = -abs($cash_amt);
// }

//    $insert_cash = "INSERT INTO `cashier` (`cash_date`, `cash_acc_name`, `cash_desc`, `cash_amt`, `cash_type`, `status`, `close`) VALUES ('".$cash_date."', '".$cash_acc_name."', '".$cash_desc."', '".$cash_amt_ex."', '".$cash_type."', '1', '1')";
// $result = mysqli_query($conn, $insert_cash);
// if ($result) {
// header('Location: index.php');

// }

// }



if (isset($_POST["delete_cash"])) {
    $cash_id = $_POST['delete_cash'];
   $sql = "UPDATE cashier SET close = 0 WHERE cash_id = '" . $cash_id . "'";
    $result = mysqli_query($conn, $sql);

}



if (isset($_POST["updatecash"])) {
  $cash_id = $_POST['cash_id'];
  $cash_date = $_POST['cash_date'];
    $cash_acc_name = $_POST['cash_acc_name'];
    $cash_desc = $_POST['cash_desc'];
    $cash_amt = $_POST['cash_amt'];
     $cash_type = $_POST['cash_type'];
     if ($cash_type == "Income") {
  $cash_amt_ex = abs($cash_amt);
} else if ($cash_type == "Expense") {
  $cash_amt_ex = -abs($cash_amt);
}

    $update_cash = "UPDATE `cashier` SET `cash_date` = '".$cash_date."', `cash_acc_name` = '".$cash_acc_name."', `cash_desc` = '".$cash_desc."', `cash_amt` = '".$cash_amt_ex."', `cash_type` = '".$cash_type."' WHERE cash_id = '".$cash_id."'";
$result = mysqli_query($conn, $update_cash);
if ($result) {
header('Location: index.php');

}

}

 ?>