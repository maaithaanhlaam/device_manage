<?php
include 'connectdb.php';
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "UPDATE account
                SET ten_tai_khoan = '$tentaikhoan', 
                    password = '$pass', 
                    email = '$email',
                    role = '$role',
                    id_class = '$idlop',
                    img = '$img',
                    state = '$state',
                    ngay_sinh = '$ngaysinh',
                    gioi_tinh = '$gioitinh',
                    dia_chi = '$diachi',
                    sdt = '$sdt'
                where ms = '$ma'
                ";
$result = mysqli_query($conn,$sql);
$conn->close();