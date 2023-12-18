<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "select *
       from phong left join tang on phong.id_tang = tang.id_tang where ten_phong like '%$noidung%' or ten_tang like '%$noidung%' ";
$result = mysqli_query($conn,$sql);
$conn->close();



function tracuuycmuonphongsv($ms, $offset)
{
    $conn = connect();
    mysqli_set_charset($conn, 'utf8');
    $sql = "SELECT
    MAX(danh_sach_yeu_cau_phong.id_yeu_cau) AS id_yeu_cau,
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.id_tang,
    danh_sach_yeu_cau_phong.trang_thai,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.chieu,
    account.ten_tai_khoan,
    danh_sach_yeu_cau_phong.id_account
FROM
    danh_sach_yeu_cau_phong
LEFT JOIN
    phong_hoc ON danh_sach_yeu_cau_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_yeu_cau_phong.id_account = account.ms
WHERE
    danh_sach_yeu_cau_phong.id_account= '$ms' AND 
    ((trang_thai = 'hủy yêu cầu mượn'
    AND NOT EXISTS (
        SELECT 1
        FROM danh_sach_yeu_cau_phong AS subquery
        WHERE subquery.id_phong = danh_sach_yeu_cau_phong.id_phong
          AND subquery.trang_thai = 'đã xác nhận mượn'
          AND subquery.ngay_muon = danh_sach_yeu_cau_phong.ngay_muon
          AND subquery.sang = danh_sach_yeu_cau_phong.sang
          AND subquery.chieu = danh_sach_yeu_cau_phong.chieu
          AND subquery.id_account = danh_sach_yeu_cau_phong.id_account
          AND subquery.id_yeu_cau <> danh_sach_yeu_cau_phong.id_yeu_cau
    ))
    OR trang_thai = 'đang chờ xác nhận trả'
    OR trang_thai = 'đã xác nhận trả'
    OR trang_thai = 'đã xác nhận mượn'
    OR trang_thai = 'đang chờ xác nhận mượn'
    )
GROUP BY
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.id_account,
    danh_sach_yeu_cau_phong.trang_thai
ORDER BY danh_sach_yeu_cau_phong.ngay_muon DESC LIMIT 5 offset " . $offset . " ";

    $kqtracuulop = mysqli_query($conn, $sql);
    return $kqtracuulop;
    $conn->close();
}

function demkqtracuumuon($ms)
{
    $conn = connect();
    mysqli_set_charset($conn, 'utf8');
    $sql = "SELECT
    MAX(danh_sach_yeu_cau_phong.id_yeu_cau) AS id_yeu_cau,
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.id_tang,
    danh_sach_yeu_cau_phong.trang_thai,
    phong_hoc.ten_phong,
    phong_hoc.mo_ta,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.chieu,
    account.ten_tai_khoan,
    danh_sach_yeu_cau_phong.id_account
FROM
    danh_sach_yeu_cau_phong
LEFT JOIN
    phong_hoc ON danh_sach_yeu_cau_phong.id_phong = phong_hoc.id_phong
LEFT JOIN
    account ON danh_sach_yeu_cau_phong.id_account = account.ms
WHERE
    danh_sach_yeu_cau_phong.id_account= '$ms' AND 
    ((trang_thai = 'hủy yêu cầu mượn'
    AND NOT EXISTS (
        SELECT 1
        FROM danh_sach_yeu_cau_phong AS subquery
        WHERE subquery.id_phong = danh_sach_yeu_cau_phong.id_phong
          AND subquery.trang_thai = 'đã xác nhận mượn'
          AND subquery.ngay_muon = danh_sach_yeu_cau_phong.ngay_muon
          AND subquery.sang = danh_sach_yeu_cau_phong.sang
          AND subquery.chieu = danh_sach_yeu_cau_phong.chieu
          AND subquery.id_account = danh_sach_yeu_cau_phong.id_account
          AND subquery.id_yeu_cau <> danh_sach_yeu_cau_phong.id_yeu_cau
    ))
    OR trang_thai = 'đang chờ xác nhận trả'
    OR trang_thai = 'đã xác nhận trả'
    OR trang_thai = 'đã xác nhận mượn'
    OR trang_thai = 'đang chờ xác nhận mượn'
    )
GROUP BY
    danh_sach_yeu_cau_phong.id_phong,
    danh_sach_yeu_cau_phong.ngay_muon,
    danh_sach_yeu_cau_phong.sang,
    danh_sach_yeu_cau_phong.chieu,
    danh_sach_yeu_cau_phong.id_account,
    danh_sach_yeu_cau_phong.trang_thai
ORDER BY danh_sach_yeu_cau_phong.ngay_muon DESC ";

    $kqtracuulop = mysqli_query($conn, $sql);
    return $kqtracuulop->num_rows;
    $conn->close();
}