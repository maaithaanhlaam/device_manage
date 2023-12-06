<?php
$lop = danhsachlop();
?>
<section id="main-content" class="column column-offset-20">
    <div style="width: 100%; display: flex">
        <div id="login-form" style="">
            <form action="index.php?act=addaccount" method="post" >
                <h1> Thêm tài khoản</h1>
                <a class="close" href="#">&times;</a>
                <label>mssv: </label>
                <input type="text" name="ms" value="" >
                <label>Tên: </label>
                <input type="text" name="tentaikhoan" value="" >
                <label>email: </label>
                <input type="text" name="email" value="" >
                <label>password: </label>
                <input type="text" name="pass" value="" >
                <label>role: </label>
                <select name="role" >
                    <option value="nhanvienquanly">Nhân viên quản lý</option>
                    <option value="sinhvien">Sinh viên</option>
                    <option value="admin">admin</option>
                    <option value="giaovien">Giáo viên</option>
                </select>
                <label>tên lớp: </label>
                <select name="lop" >
                    <?php foreach ($lop as $option){?>
                        <option value="<?php echo $option['id_class']?>"><?php echo $option['ten_lop']?></option>
                    <?php }?>
                </select>
                <label>Hình ảnh: </label>
                <input type="file" name="img" value="" >
                <br>
                <label>trạng thái: </label>
                <input type="text" name="state" value="" >
                <label>ngày sinh: </label>
                <input type="date" name="ngaysinh" value="" >
                <br>
                <label> Giới tính: </label>
                <input type="text" name="gioitinh" value="" >
                <label>Địa chỉ: </label>
                <input type="text" name="diachi" value="" >
                <label>số điện thoại: </label>
                <input type="text" name="sdt" value="" >
                <input class="submit" type="submit"  value="Thêm tài khoản" name="themtaikhoan">
            </form>
        </div>
    </div>