<?php

//connect to database
$dbuser="root";
$dbpass="";
$dbhost="localhost";
$dbname="futsal";


//create a connection
$conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);


//check connection
if ($conn->connect_error){
    echo("Connection error!!");
}
?>