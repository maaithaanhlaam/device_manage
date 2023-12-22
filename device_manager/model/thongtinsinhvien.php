<?php
include 'connectdb.php';
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
        where danh_sach_muon_phong.id_account= '$mssv' and danh_sach_muon_phong.ngay_muon < '$ngaymuon' and (danh_sach_muon_phong.sang = 1 or danh_sach_muon_phong.chieu = 1) 
order by ms, ten_phong, ngay_muon desc
";
$danhsachtrehan = mysqli_query($conn, $sql);
$truyvan = "Select danh_sach_muon_phong.id_phong,
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_tang,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    danh_sach_muon_phong.sang,
    danh_sach_muon_phong.ngay_muon,
    danh_sach_muon_phong.chieu,
    account.ten_tai_khoan,
    account.ms,
    account.email,
    tang.ten_tang
FROM
    danh_sach_muon_phong
LEFT JOIN
    phong_hoc ON danh_sach_muon_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_muon_phong.id_account = account.ms
left join  
        tang on danh_sach_muon_phong.id_tang = tang.id_tang
        where danh_sach_muon_phong.id_account= '$mssv' and (danh_sach_muon_phong.sang = 1 or danh_sach_muon_phong.chieu = 1) 
order by ms, ten_phong, ngay_muon desc
";
$danhsachphongdamuon = mysqli_query($conn,$truyvan);
$conn->close();