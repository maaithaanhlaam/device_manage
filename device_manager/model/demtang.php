<?php
include 'connectdb.php';

function demtang($id_tang,$ngay){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');
    $sql = " SELECT COUNT(distinct id_phong) AS so_phong_trong
    FROM danh_sach_muon_phong 
     where danh_sach_muon_phong.id_tang = '$id_tang' 
                          and  (sang = 0 AND chieu = 0 AND  danh_sach_muon_phong.id_phong NOT IN (
                            SELECT id_phong
                            FROM danh_sach_muon_phong
                            WHERE (sang = 1 AND chieu = 0 and ngay_muon = '$ngay')or(sang = 0 AND chieu = 1 and ngay_muon = '$ngay')or(sang = 1 AND chieu = 1 and ngay_muon = '$ngay')
                          )
                            OR sang = 1 AND chieu = 0  and ngay_muon = '$ngay' and danh_sach_muon_phong.id_phong NOT IN (
                            SELECT id_phong
                            FROM danh_sach_muon_phong
                            WHERE (sang = 0 AND chieu = 1 and ngay_muon = '$ngay')or(sang = 1 AND chieu = 1 and ngay_muon = '$ngay')
                          ) 
                            OR sang = 0 AND chieu = 1  and ngay_muon = '$ngay' and danh_sach_muon_phong.id_phong NOT IN (
                            SELECT id_phong
                            FROM danh_sach_muon_phong
                            WHERE (sang = 1 AND chieu = 0 and ngay_muon = '$ngay')or(sang = 1 AND chieu = 1 and ngay_muon = '$ngay')
                        )
                            OR sang = 1 AND chieu = 1 and ngay_muon <> '$ngay'
                        )
   ";
    $truyvan = mysqli_query($conn, $sql);
    $phong_dang_muon = mysqli_fetch_assoc($truyvan);


    return  $phong_dang_muon ['so_phong_trong'] ;
    $conn->close();
}