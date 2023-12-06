<?php
if(isset($_POST['doimatkhau'])){
    require '../../model/checkpass.php';
    $email = $_POST['email'];
    $matkhaucu = md5($_POST['matkhaucu']);
    $matkhaumoi = md5($_POST['matkhaumoi']);
    $matkhaumoi2 = md5($_POST['matkhaumoi2']);
    $check = checkpass($email,$matkhaucu);
    if ($check){
        if($matkhaumoi == $matkhaumoi2){
            $loixacnhan = 'bạn đã đổi mật khẩu thành công';
            require '../../model/changepass.php';
        }
        else {
            $loixacnhan = 'xác nhận lại mật khẩu mới không trùng khớp';
        }
    }
    else{
        $loixacnhan = 'bạn đã nhập sai mật khẩu';
    }
}
?>
<section id="main-content" class="column column-offset-20">
    <div style="width: 100%; display: flex">
        <img src="<?php echo $img?>"style="width: 500px; border-radius: 10px 0px 0px 10px">
        <div id="login-form" style="">
            <form id="changePasswordForm" action="" method="post">
                <h1> Đổi mật khẩu</h1>
                <label>Email: </label>
                <input type="text" name="email" value="<?php echo $email ?>" readonly>
                <br>
                <label>Mật khẩu cũ </label>
                <input type="password" name="matkhaucu" value="" required>
                <br>
                <label>Mật khẩu mới: </label>
                <input type="password" name="matkhaumoi" value="" required>
                <br>
                <label>Xác nhận lại mật khẩu mới: </label>
                <input type="password" name="matkhaumoi2" value="" required>
                <hr>
                <?php
                if(isset($loixacnhan)&& $loixacnhan !=''){
                    if ($loixacnhan =='bạn đã đổi mật khẩu thành công'){
                        echo '<div class="alert alert-success">'.$loixacnhan.'</div>';
                        $loixacnhan = '';
                    }
                    echo '<div class="alert alert-warning">'.$loixacnhan.'</div>';
                    $loixacnhan = '';
                }
                ?>
                <br>
                <input type="checkbox" name="" id="hienthimatkhau" value="" onchange="">hiển thị mật khẩu
                <input class="submit" type="submit" value="Đổi mật khẩu" name="doimatkhau">
            </form>
        </div>
    </div>

