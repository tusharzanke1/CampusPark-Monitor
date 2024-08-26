<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
// Connection parameters for MySQL
$host = "localhost"; // Your MySQL host name or IP address
$user = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "vehicle-parking-db"; // The name of your MySQL database

// Connect to MySQL server
$con = mysqli_connect($host, $user, $password, $dbname);

// Check if the connection to MySQL server was successful or not
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Get the scanned parameter from the URL
$q = $_REQUEST["q"];

// Lookup the scanned parameter in student_info table in StudentPRN column
if ($q != "") {
  $result = mysqli_query($con, "SELECT * FROM student_info WHERE StudentPRN='$q'");


  if (mysqli_num_rows($result) == 1) {
    // Get the full details of the student from the student_info table
    $row = mysqli_fetch_assoc($result);
    $parkingnumber=mt_rand(10000, 99999);
    $VehicleCategory = $row['VehicleCategory']; // Set to appropriate value based on scanned information
    $VehicleCompanyname =$row['VehicleCompanyname'] ; // Set to appropriate value based on scanned information
    $RegistrationNumber =$row['RegistrationNumber']; // Set to appropriate value based on scanned information
    $OwnerName = $row['OwnerName']; // Set to appropriate value based on scanned information
    $OwnerContactNumber =$row['OwnerContactNumber']; // Set to appropriate value based on scanned information
    $StudentPRN = $row['StudentPRN'];
    $StudentBranch = $row['StudentBranch'];

    // Insert the student's full details into the vehicle_info table
    $ret = mysqli_query($con, "INSERT INTO vehicle_info (ParkingNumber,VehicleCategory, VehicleCompanyname, RegistrationNumber, OwnerName, OwnerContactNumber, StudentPRN, StudentBranch) VALUES ('$parkingnumber','$VehicleCategory', '$VehicleCompanyname', '$RegistrationNumber', '$OwnerName', '$OwnerContactNumber', '$StudentPRN', '$StudentBranch')");

    if ($ret) {
      echo '<div class="alert alert-success"><strong>Success!</strong> Vehicle information successfully registered</div>';
    } else {
      echo '<div class="alert alert-danger"><strong>Error!</strong> Failed to register vehicle information</div>';
    }
  } else {
    echo '<div class="alert alert-danger"><strong>Error!</strong> Invalid student PRN</div>';
  }
}


// Close the connection to MySQL server
mysqli_close($con);
?>
