<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "insert into phong_hoc(ten_phong , mo_ta, id_tang)
values ('".$tenphong."','".$mota."','".$idtang."')";

$result = mysqli_query($conn,$sql);
$ngaymuon = date('Y-m-d');
$layidphong = "SELECT * FROM phong_hoc ORDER BY id_phong DESC LIMIT 1";
$kqlayidphong = mysqli_query($conn,$layidphong);
foreach ( $kqlayidphong as $row){
    $themdanhsachcho = "insert into danh_sach_muon_phong(id_phong , id_account, id_tang, ngay_muon, sang, chieu)
    values ('".$row['id_phong']."','1111','".$row['id_tang']."','".$ngaymuon."',0,0)";
    $kqthemdanhsachcho = mysqli_query($conn,$themdanhsachcho);
}

