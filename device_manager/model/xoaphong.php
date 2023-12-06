<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "delete from phong_hoc where id_phong = '$ma'";
$result = mysqli_query($conn,$sql);