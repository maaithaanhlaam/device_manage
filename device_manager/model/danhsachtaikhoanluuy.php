<?php
include 'connectdb.php';
function danhsachtaikhoanluuy($offset){
    $conn= connect();
    mysqli_set_charset($conn,'utf8');
    $sql="Select MAX(danh_sach_luu_y.id_luu_y) AS id_luu_y,
    danh_sach_muon_phong.id_phong,
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_tang,
    danh_sach_muon_phong.sang,
    danh_sach_muon_phong.ngay_muon,
    danh_sach_muon_phong.chieu,
    phong_hoc.ten_phong,
    account.ten_tai_khoan,
    account.ms,
    account.email,
    account.state,
    account.id_class,
    class.ten_lop
FROM
    danh_sach_luu_y
LEFT JOIN
    danh_sach_muon_phong ON danh_sach_luu_y.id_muon = danh_sach_muon_phong.id_muon
LEFT JOIN
    phong_hoc ON danh_sach_muon_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_luu_y.id_account = account.ms
LEFT JOIN
    class ON account.id_class = class.id_class
  GROUP BY account.ms  LIMIT 5 offset ".$offset."";

    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}
function demtaikhoanluuy(){
    $conn= connect();
    mysqli_set_charset($conn,'utf8');
    $sql="Select MAX(danh_sach_luu_y.id_luu_y) AS id_luu_y,
    danh_sach_muon_phong.id_phong,
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_tang,
    danh_sach_muon_phong.sang,
    danh_sach_muon_phong.ngay_muon,
    danh_sach_muon_phong.chieu,
    phong_hoc.ten_phong,
    account.ten_tai_khoan,
    account.ms,
    account.email,
    account.state,
    account.id_class,
    class.ten_lop
FROM
    danh_sach_luu_y
LEFT JOIN
    danh_sach_muon_phong ON danh_sach_luu_y.id_muon = danh_sach_muon_phong.id_muon
LEFT JOIN
    phong_hoc ON danh_sach_muon_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_luu_y.id_account = account.ms
LEFT JOIN
    class ON account.id_class = class.id_class
  GROUP BY account.ms";

    $result = mysqli_query($conn,$sql);
    return $result->num_rows;
    $conn->close();
}