<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql= "insert into account (ms, ten_tai_khoan,password,email, role, id_class,img, state, ngay_sinh, gioi_tinh, dia_chi, sdt)
values ('".$ma."','".$tentaikhoan."','".$pass."','".$email."','".$role."','".$idlop."','".$img."','".$state."','".$ngaysinh."','".$gioitin."','".$diachi."','".$sdt."')";

$result = mysqli_query($conn,$sql);
$conn->close();