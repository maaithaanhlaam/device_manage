<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "select *
       from phong left join tang on phong.id_tang = tang.id_tang where ten_phong like '%$noidung%' or ten_tang like '%$noidung%' ";
$result = mysqli_query($conn,$sql);
$conn->close();