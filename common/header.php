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
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Muneeb</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert2.all.min.js"></script>

</head>
<body>