<?php
include 'connectdb.php';
 $conn = connect();
 mysqli_set_charset($conn,'utf8');

 $sql= "insert into danh_sach_yeu_cau_phong (id_phong,id_tang,id_account, ngay_muon, sang, chieu, trang_thai, ngay_dang_ky)
            values ('".$ma."','".$tang."','".$id_account."','".$thoigianmuon."','".$sang."','".$chieu."','".$trangthai."','".$ngaydangky."')";

 $result = mysqli_query($conn,$sql);
$conn->close();