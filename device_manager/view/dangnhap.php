<?php
session_start();
include_once '../model/connectdb.php';
include_once '../model/login.php';
if((isset($_POST['dangnhap'])&&($_POST['dangnhap']))){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $row=checklogin($email,$pass);
    if($row){
        if($row['state'] == 'kích hoạt'){
            $mindate = date("Y-m-d");
            $maxdate = date("Y-m-d", strtotime("+3 Days"));
            $role = $row['role'];
            $_SESSION['mindate']=$mindate;
            $_SESSION['maxdate']=$maxdate;
            $_SESSION['name']= $row['ten_tai_khoan'];
            $_SESSION['account']= $row['ms'];
            $_SESSION['email']= $email;
            $_SESSION['pass']= $pass;
            $_SESSION['img']= $row['img'];
            switch ($role){
                case 'admin':
                    header('location: admin/index.php');
                    break;
                case 'sinhvien':
                    header('location: sinhvien/index.php');
                    break;
                case 'nhanvienquanly':
                    header('location:  nhanvienquanly/index.php');
                    break;
            }
        }
        else{
            $loi = 'Tài khoản bạn đã bị vô hiệu, vui lòng liên hệ Nhân Viên Quản lý để kích hoạt lại tài khoản';
        }
    }
    else{
       $loi = 'Nhập sai toàn khoản hoặc mật khẩu rồi';
    }
    connect()->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #3498db, #8e44ad);
        }

        #login-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 600px;
            text-align: center;
            box-sizing: border-box;
        }

        h2 {
            color: #333;
        }

        .nhap {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        .nhap:focus {
            border-color: #3498db;
        }

        select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        select:focus {
            border-color: #3498db;
        }

        .submit {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
            transition: 0.3s;
        }

        .submit:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<div id="login-form">
    <h2>Đăng Nhập</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
            if( isset($loi)&& $loi != ""){
                echo $loi;
                $loi='';
            }
        ?>
        <input class="nhap"  type="text" id="username" name="email" placeholder="email" required>
        <input class="nhap" type="password" id="password" name="password" placeholder="Mật khẩu" required>
        <hr>
        <input type="checkbox" name="" id="hienthimatkhau" value="" onchange="">hiển thị mật khẩu
        <br>
        <input class="submit" type="submit" value="Đăng Nhập" name="dangnhap">
    </form>
</div>
</body>
<script>
    document.getElementById('hienthimatkhau').addEventListener('change', function() {
        var matkhau = document.getElementsByName('password')[0];
        if (this.checked) {
            matkhau.type = 'text';
        } else {
            matkhau.type = 'password';
        }
    });

</script>
</html>