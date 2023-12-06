<?php
include 'connectdb.php';
include 'sendmail.php';
$noidungemail = "<p>thư cảnh báo gửi đến anh/chị: ".$tensinhvien."</p>
                   <p>mssv: ".$mssv." </p>
                   <p>Phòng trễ hạn: ".$tenphong." </p>
                   <p>Ngày mượn: ".$ngaymuon."</p>
                   <p>Mã mượn: ".$idmuon." </p>
                   <p>Anh/chị phải trả trong ngày hôm nay, nếu không anh/chị sẽ không được cho phép mượn nữa</p>";
$mail = new Mailer();
$tieude='Alert Message';

$mail->guimailcanhbao($email,$tieude,$noidungemail);
$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "insert into danh_sach_luu_y (id_muon, id_account)
        values ('$idmuon', '$mssv')";

$result  = mysqli_query($conn, $sql);
$conn->close();