<?php 

$dbuser='root';

$dbpassword='';

$servername='localhost';

$dbname="gestionhopitale";

//create connection

$conn=mysqli_connect($servername,$dbuser,$dbpassword,$dbname);
//check connection

if(!$conn){
    die("connection failed:" . mysqli_connect_error());
}

//echo "connected successfully";

?>