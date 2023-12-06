<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "insert into phong_hoc(ten_phong , mo_ta, id_tang)
values ('".$tenphong."','".$mota."','".$idtang."')";

$result = mysqli_query($conn,$sql);