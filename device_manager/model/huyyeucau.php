<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$update = "delete from danh_sach_yeu_cau_phong 
       where id_yeu_cau='$id_yeu_cau'";
$kq = mysqli_query($conn,$update);
$conn->close();