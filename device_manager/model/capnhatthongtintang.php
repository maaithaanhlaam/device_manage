<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "UPDATE tang
                SET ten_tang = '$tentang'
                where id_tang = '$ma'
                ";
$result = mysqli_query($conn,$sql);
$conn->close();