<?php
include 'connectdb.php';

    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "SELECT 
    danh_sach_muon_phong.id_phong, 
    phong_hoc.ten_phong, 
    phong_hoc.mo_ta, 
    danh_sach_muon_phong.sang, 
    danh_sach_muon_phong.chieu
    FROM danh_sach_muon_phong left join phong_hoc on danh_sach_muon_phong.id_phong = phong_hoc.id_phong
                where danh_sach_muon_phong.id_tang = '$ma' 
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
    group by danh_sach_muon_phong.id_phong
      ORDER BY phong_hoc.ten_phong ASC ";
    $kqtracuulop = mysqli_query($conn, $sql);
    $conn->close();


