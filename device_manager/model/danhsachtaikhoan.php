<?php
include 'connectdb.php';
function danhsachtaikhoan($offset,$noidung){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select account.id_class,
       account.ms,
       account.ten_tai_khoan,
       account.role,
       account.email,
       account.password,
       account.img,
       account.ngay_sinh,
       account.gioi_tinh,
       account.dia_chi,
       account.state, 
       account.sdt,
       class.ten_lop
        from account
         left join class on account.id_class = class.id_class
        where account.ms like '%$noidung%' or account.ten_tai_khoan like '%$noidung%' or class.ten_lop like '%$noidung%'
         order by ms asc LIMIT 5 offset ".$offset." ";
    $result = mysqli_query($conn, $sql);

    return $result;
    $conn->close();
}
function demtaikhoan($noidung){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select account.id_class,
       account.ms,
       account.ten_tai_khoan,
       account.role,
       account.email,
       account.password,
       account.img,
       account.ngay_sinh,
       account.gioi_tinh,
       account.dia_chi,
       account.state, 
       account.sdt,
       class.ten_lop
        from account
         left join class on account.id_class = class.id_class
        where account.ms like '%$noidung%' or account.ten_tai_khoan like '%$noidung%' or class.ten_lop like '%$noidung%' order by ms asc  ";
    $result = mysqli_query($conn, $sql);

    return $result->num_rows;
    $conn->close();
}