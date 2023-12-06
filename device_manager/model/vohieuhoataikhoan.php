<?php
include 'connectdb.php';
include 'sendmail.php';


$noidungemail = "<p>thư thông báo vô hiệu hóa tài khoản gửi đến anh/chị: ".$tensinhvien."</p>
                   <p>mssv: ".$mssv." </p>
                   <p>Phòng trễ hạn: ".$tenphong." </p>
                   <p>Ngày mượn: ".$ngaymuon."</p>
                   <p>Mã mượn: ".$idmuon." </p>
                   <p>thông báo này đã được gửi kèm cho giáo viên chủ nhiệm của anh/chị, anh/chị vui lòng liên hệ sớm nhất cho nhân viên quản lý để giải quyết</p>";
$mail = new Mailer();
$tieude='Alert Message';

$mail->guimailcanhbao($email,$tieude,$noidungemail);

$conn = connect();
mysqli_set_charset($conn,'utf8');

$sql = "select email from account where id_class = '$idclass' and role = 'giaovien'";
$result = mysqli_query($conn,$sql);
while ($row = $result->fetch_assoc()) {
    $emailgiaovien = $row['email'];
    $mailgiaovien = new Mailer();
    $noidungemailgiaovien = "<p>thư thông báo vô hiệu hóa tài khoản sinh viên thuộc lớp quản lý của anh/chị </p>
                    <p>Tên sinh viên: ".$tensinhvien."</p>
                     <p>Email sinh viên: ".$email."</p>
                   <p>mssv: ".$mssv." </p>
                   <p>Phòng trễ hạn: ".$tenphong." </p>
                   <p>Ngày mượn: ".$ngaymuon."</p>
                   <p>Mã mượn: ".$idmuon." </p>
                   <p>Anh/chị có trách nhiệm nhắc nhở sinh viên ".$tensinhvien." đến làm việc với nhân viên quản lý sớm nhất</p>";
    $mailgiaovien->guimailcanhbao($emailgiaovien,$tieude,$noidungemailgiaovien);
}


$vohieutaikhoan = "UPDATE account
            SET state = 'vô hiệu hóa'
            where ms ='$mssv'";
$vohieu = mysqli_query($conn,$vohieutaikhoan);
$conn->close();