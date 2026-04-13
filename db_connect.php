<?php
$conn = mysqli_connect("localhost","root","","hotel_db") or die("error to connect database");

// $create_db = mysqli_query($conn,"CREATE DATABASE hotel_db");
// if ($create_db) {
//     $success =  "data created well";
// }
// else{
//     $error = "data not created".mysqli.error($con);
// }



// $create_ordered = mysqli_query($conn,"CREATE TABLE ordered(id int primary key AUTO_INCREMENT,full_name varchar(250),
// email varchar(250),phone int,menu varchar(250),address varchar(250),dates date)");
// if($create_table){
//     $success = "table created well";

// }
// else{
//     $error = "there is any error occured during creattion of table orders".mysqli_error($conn);
    
// }

// $create_contact = mysqli_query($conn,"CREATE TABLE contact(id int primary key AUTO_INCREMENT, 
// full_name varchar(250),email varchar(250),phone int,subjects varchar(250),messages varchar(250))");

// if ($create_contact) {
//     $message = "table of contacts is created well";
// }
// else{
//     $error = "table not created well".mysqli_error($conn);
// }

// Set charset to utf-8
$conn->set_charset("utf8");
?>
