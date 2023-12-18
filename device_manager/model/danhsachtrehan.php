<?php
include 'connectdb.php';
function danhsachtrehan($ngaymuon,$offset, $noidung){
    $conn= connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "Select danh_sach_muon_phong.id_phong,
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_tang,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
   danh_sach_muon_phong.sang,
    danh_sach_muon_phong.ngay_muon,
    danh_sach_muon_phong.chieu,
    account.ten_tai_khoan,
    account.ms,
    account.email
FROM
    danh_sach_muon_phong
LEFT JOIN
    phong_hoc ON danh_sach_muon_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_muon_phong.id_account = account.ms
        where danh_sach_muon_phong.ngay_muon < '$ngaymuon' and (danh_sach_muon_phong.sang = 1 or danh_sach_muon_phong.chieu = 1) and danh_sach_muon_phong.ngay_muon like '%$noidung%'
order by ms, ten_phong, ngay_muon desc  LIMIT 5 offset ".$offset."
";
    $result = mysqli_query($conn, $sql);
    return $result;
    $conn->close();
}
function demkqtracuutrehan($ngaymuon,$noidung){
    $conn= connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "Select danh_sach_muon_phong.id_phong,
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_tang,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
   danh_sach_muon_phong.sang,
    danh_sach_muon_phong.ngay_muon,
    danh_sach_muon_phong.chieu,
    account.ten_tai_khoan,
    account.ms,
    account.email
FROM
    danh_sach_muon_phong
LEFT JOIN
    phong_hoc ON danh_sach_muon_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_muon_phong.id_account = account.ms
        where danh_sach_muon_phong.ngay_muon < '$ngaymuon' and (danh_sach_muon_phong.sang = 1 or danh_sach_muon_phong.chieu = 1) and danh_sach_muon_phong.ngay_muon like '%$noidung%'
order by ms, ten_phong, ngay_muon desc 
";
    $result = mysqli_query($conn, $sql);
    return $result->num_rows;
    $conn->close();
}
