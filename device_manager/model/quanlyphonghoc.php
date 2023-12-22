<?php
include 'connectdb.php';


function danhsachphonghoc($offset,$noidung){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from phong_hoc left join tang on phong_hoc.id_tang = tang.id_tang where phong_hoc.ten_phong like '%$noidung%' or tang.ten_tang like '%$noidung%'  
                                                                           order by ten_phong asc LIMIT 5 offset ".$offset."";
    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}
function demphonghoc($noidung){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from phong_hoc left join tang on phong_hoc.id_tang = tang.id_tang
    where phong_hoc.ten_phong like '%$noidung%' or tang.ten_tang like '%$noidung%'";
    $result = mysqli_query($conn,$sql);
    return $result->num_rows;
    $conn->close();
}