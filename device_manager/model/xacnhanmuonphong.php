<?php
include 'connectdb.php';
 $conn = connect();
 mysqli_set_charset($conn,'utf8');

 $sql= "insert into danh_sach_muon_phong (id_phong,id_tang,id_account, ngay_muon, sang, chieu)
            values ('".$ma."','".$tang."','".$id_account."','".$thoigianmuon."','".$sang."','".$chieu."')";
 $result = mysqli_query($conn,$sql);

$update = "UPDATE danh_sach_yeu_cau_phong
            SET trang_thai = 'đã xác nhận mượn'
            where id_yeu_cau='$id_yeu_cau'";
$kq = mysqli_query($conn,$update);

$sethuyyeucau = "UPDATE danh_sach_yeu_cau_phong
                SET trang_thai = 'hủy yêu cầu mượn'
                where id_phong = '$ma'
                and id_tang = '$tang'
                and ngay_muon = '$thoigianmuon'
                 and trang_thai = 'đang chờ xác nhận mượn'";
$huyyeucau = mysqli_query($conn,$sethuyyeucau);

$conn->close();