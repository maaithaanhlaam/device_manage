<?php
include 'connectdb.php';
function danhsachphongdamuon($ms, $offset,$noidung, $ngayTimKiem){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select 
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_phong, 
    danh_sach_muon_phong.ngay_muon, 
    danh_sach_muon_phong.sang, 
    danh_sach_muon_phong.chieu, 
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    tang.id_tang,
    tang.ten_tang
    from danh_sach_muon_phong left join phong_hoc on danh_sach_muon_phong.id_phong = phong_hoc.id_phong
    left join tang on danh_sach_muon_phong.id_tang = tang.id_tang
    where id_account= '$ms' and (sang = 1 or chieu = 1) AND (phong_hoc.ten_phong like '%$noidung%' AND danh_sach_muon_phong.ngay_muon like '%$ngayTimKiem%')
    LIMIT 5 offset ".$offset."
";
    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}
function demphongdamuon($ms,$noidung, $ngayTimKiem){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select 
    danh_sach_muon_phong.id_muon,
    danh_sach_muon_phong.id_phong, 
    danh_sach_muon_phong.ngay_muon, 
    danh_sach_muon_phong.sang, 
    danh_sach_muon_phong.chieu, 
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    tang.id_tang,
    tang.ten_tang
    from danh_sach_muon_phong left join phong_hoc on danh_sach_muon_phong.id_phong = phong_hoc.id_phong
    left join tang on danh_sach_muon_phong.id_tang = tang.id_tang
    where id_account= '$ms' and (sang = 1 or chieu = 1) AND (phong_hoc.ten_phong like '%$noidung%' AND danh_sach_muon_phong.ngay_muon like '%$ngayTimKiem%')
";
    $result = mysqli_query($conn,$sql);
    return $result->num_rows;
    $conn->close();
}
