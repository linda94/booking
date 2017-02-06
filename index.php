<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BookingTEST</title>
</head>


<body>


<?php

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $dbname = "localhost";

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL; 

//$query = mysqli_query($link, "SELECT * FROM user");

//echo "test: " . mysqli_num_rows($query);

  //  while ($obj = mysqli_fetch_object($query)) {
    //    echo ("%s %s %d\n", $obj->firstName, $obj->lastName, $obj->age);
    //}

$query = mysqli_query($link, "INSERT INTO user (firstName, lastName, age) VALUES ('Andreas', 'Semb', 23)");




mysqli_close($link);
?>

</body>

</html>