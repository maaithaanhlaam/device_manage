<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "insert into tang(ten_tang)
values ('".$tentang."')";

$result = mysqli_query($conn,$sql);