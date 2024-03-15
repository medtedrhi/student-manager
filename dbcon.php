<?php 

$servername = "localhost";
$username = "root";
$password = "2004";
$database = "students";

try{

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo"Connected succesfully";

}catch(PDOException $e){
    echo 'Connection failed : '. $e->getMessage();
}



?>