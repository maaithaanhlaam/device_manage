<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "delete from tang where id_tang = '$ma'";
$result = mysqli_query($conn,$sql);