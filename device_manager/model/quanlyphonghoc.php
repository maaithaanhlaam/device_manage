<?php
include 'connectdb.php';


function danhsachphonghoc($offset){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from phong_hoc left join tang on phong_hoc.id_tang = tang.id_tang order by ten_phong asc LIMIT 5 offset ".$offset."";
    $result = mysqli_query($conn,$sql);
    return $result;
    $conn->close();
}
function demphonghoc(){
    $conn = connect();
    mysqli_set_charset($conn,'utf8');

    $sql = "select * from phong_hoc left join tang on phong_hoc.id_tang = tang.id_tang";
    $result = mysqli_query($conn,$sql);
    return $result->num_rows;
    $conn->close();
}