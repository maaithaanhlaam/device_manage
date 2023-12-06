<?php
include 'connectdb.php';
 $conn = connect();
 mysqli_set_charset($conn,'utf8');

 $sql= "UPDATE danh_sach_muon_phong
            SET sang = 0 , chieu = 0
            where id_muon='$idmuon'";
 $result = mysqli_query($conn,$sql);

$update = "UPDATE danh_sach_yeu_cau_phong
            SET trang_thai = 'đã xác nhận trả'
            where id_yeu_cau='$id_yeu_cau'";
$kq = mysqli_query($conn,$update);

/*$xoangaycu = "delete from danh_sach_muon_phong
            where id_phong='$idphong'
            and ngay_muon < '$thoigianmuon'";
$truyvanxoangaycu = mysqli_query($conn,$xoangaycu);*/

$conn->close();