<?php
include 'connectdb.php';
$conn= connect();
mysqli_set_charset($conn,'utf8');

$sql = "select 
     account.ms,
     account.ten_tai_khoan,
     account.email,
     account.ngay_sinh,
     account.gioi_tinh,
     account.state,
     account.role,
     account.img,
     account.dia_chi,
     account.sdt,
     class.ten_lop,
     khoa.ten_khoa
    from account 
    left join class on account.id_class = class.id_class
    left join khoa on class.id_khoa = khoa.id_khoa
    where ms= '$mssv'";

$result = mysqli_query($conn,$sql);
$conn->close();