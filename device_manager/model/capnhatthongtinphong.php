<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "UPDATE phong_hoc
                SET ten_phong = '$tenphong', mo_ta = '$mota', id_tang = '$idtang'
                where id_phong = '$ma'
                ";
$result = mysqli_query($conn,$sql);
$conn->close();