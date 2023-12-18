<?php
include 'connectdb.php';

function tracuuyctraphong($offset,$noidung,$ngayTimKiem){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
$sql="SELECT
    MAX(danh_sach_yeu_cau_phong.id_yeu_cau) AS id_yeu_cau,
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.id_muon,
    danh_sach_yeu_cau_phong.id_tang,
    danh_sach_yeu_cau_phong.trang_thai,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.ngay_dang_ky,
    account.ten_tai_khoan,
    account.ms,
    class.ten_lop
FROM
    danh_sach_yeu_cau_phong
LEFT JOIN
    phong_hoc ON danh_sach_yeu_cau_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_yeu_cau_phong.id_account = account.ms
LEFT JOIN
    class ON account.id_class = class.id_class
WHERE
    trang_thai = 'đang chờ xác nhận trả' AND ((phong_hoc.ten_phong like '%$noidung%' OR account.ten_tai_khoan like '%$noidung%' OR account.ms like '%$noidung%') AND danh_sach_yeu_cau_phong.ngay_muon like '%$ngayTimKiem%')
GROUP BY
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.id_account,
    danh_sach_yeu_cau_phong.trang_thai
ORDER BY ngay_dang_ky, ten_phong, ngay_muon desc LIMIT 5 offset ".$offset."
";
    $kqtracuulop = mysqli_query($conn, $sql);
    return $kqtracuulop;
    $conn->close();
}
function demkqtracuutra($noidung,$ngayTimKiem){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql="SELECT
    MAX(danh_sach_yeu_cau_phong.id_yeu_cau) AS id_yeu_cau,
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.id_muon,
    danh_sach_yeu_cau_phong.id_tang,
    danh_sach_yeu_cau_phong.trang_thai,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.ngay_dang_ky,
    account.ten_tai_khoan,
    account.ms,
    class.ten_lop
FROM
    danh_sach_yeu_cau_phong
LEFT JOIN
    phong_hoc ON danh_sach_yeu_cau_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_yeu_cau_phong.id_account = account.ms
LEFT JOIN
    class ON account.id_class = class.id_class
WHERE
    trang_thai = 'đang chờ xác nhận trả'AND ((phong_hoc.ten_phong like '%$noidung%' OR account.ten_tai_khoan like '%$noidung%' OR account.ms like '%$noidung%') AND danh_sach_yeu_cau_phong.ngay_muon like '%$ngayTimKiem%')
GROUP BY
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.id_account,
    danh_sach_yeu_cau_phong.trang_thai
ORDER BY ngay_dang_ky, ten_phong, ngay_muon desc
";
    $kqtracuulop = mysqli_query($conn, $sql);
    return $kqtracuulop->num_rows;
    $conn->close();
}