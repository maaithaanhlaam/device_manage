<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "delete from account where ms = '$ms'";
$result = mysqli_query($conn,$sql);