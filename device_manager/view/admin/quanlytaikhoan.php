<?php
$tongkq = demtaikhoan($noidung);
$item_per_page = 5;
$currentpage = !empty($_GET['page'])?$_GET['page']:1;
$offset = ($currentpage-1)*$item_per_page;
$sotrang = ceil($tongkq/$item_per_page);
$result = danhsachtaikhoan($offset,$noidung);
$lop = danhsachlop();
?>

    <section id="main-content" class="column column-offset-20">
    <h2>
        DANH SÁCH PHÒNG
    </h2>
        <form action="index.php?act=danhsachtaikhoan" method="post">
            <input  class="fa-search " type="text" name="noidungtimkiemtaikhoanadmin" placeholder="nhập nội dung tìm kiếm" >
            <input class="ui-icon-search" type="submit" value="Tìm" name="tim">
        </form>    <a class="button" href="index.php?act=themtaikhoan" >Thêm tài khoản</a>
    <table  class="table" width="100%" >
        <thead class="thead-primary" style="background-color: #4e555b">
        <tr>
            <th class="column-10">Mã</th>
            <th class="column-10">tên</th>
            <th class="column-10">email</th>
            <th class="column-10">pass</th>
            <th class="column-10">role</th>
            <th class="column-10">lớp</th>
            <th class="column-10">trạng thái</th>
            <th class="column-10">sửa</th>
            <th class="column-10">vô hiệu hóa</th>
            <th class="column-10">xóa</th>
        </tr>
        </thead>
        <?php foreach ($result as $each){?>
            <tr class="">
                <td ><a href="index.php?act=xemprofile&mssv=<?php echo $each['ms'] ?>"><?php echo $each['ms'] ?></a></td>
                <td ><?php echo $each['ten_tai_khoan'] ?></td>
                <td ><?php echo $each['email'] ?></td>
                <td ><?php echo $each['password'] ?></td>
                <td ><?php echo $each['role'] ?></td>
                <td ><?php echo $each['ten_lop'] ?></td>
                <td ><?php echo $each['state'] ?></td>
                <td ><div class="box">
                        <a class="button" href="#popup1&mataikhoan=<?php echo $each['ms']?>" style="background-color: #0d6efd">Sửa</a>
                    </div>
                    <div id="popup1&mataikhoan=<?php echo $each['ms']?>" class="overlay" style="top: -150px">
                        <div class="popup">
                            <form action="index.php?act=capnhatthongtintaikhoan&mataikhoan=<?php echo $each['ms'] ?>" method="post" enctype="multipart/form-data" >
                                <h1> Sửa phòng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Tên: </label>
                                <input type="text" name="tentaikhoan" value="<?php echo $each['ten_tai_khoan']?>" >
                                <label>email: </label>
                                <input type="text" name="email" value="<?php echo $each['email']?>" >
                                <label>password: </label>
                                <input type="text" name="pass" value="<?php echo $each['password']?>" >
                                <label>role: </label>
                                <select name="role" >
                                    <option value="">*Chọn role</option>
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
                                <input type="file" name="img" value="<?php echo $each['img']?>" >
                                <br>
                                <label>trạng thái: </label>
                                <input type="text" name="state" value="<?php echo $each['state']?>" >
                                <label>ngày sinh: </label>
                                <input type="date" name="ngaysinh" value="<?php echo $each['ngay_sinh']?>" >
                                <label> Giới tính: </label>
                                <input type="text" name="gioitinh" value="<?php echo $each['gioi_tinh']?>" >
                                <label>Địa chỉ: </label>
                                <input type="text" name="diachi" value="<?php echo $each['dia_chi']?>" >
                                <label>số điện thoại: </label>
                                <input type="text" name="sdt" value="<?php echo $each['sdt']?>" >
                                <input class="submit" type="submit"  value="Cập nhật thông tin" name="capnhat">
                            </form>
                        </div>
                    </div>
                </td>
                <?php if($each['state'] == 'kích hoạt'){?>
                    <td ><div class="box">
                            <a class="button" href="#popup2&mataikhoan=<?php echo $each['ms']?>" style="background-color: #ba8b00 ">Vô Hiệu Hóa</a>
                        </div>
                        <div id="popup2&mataikhoan=<?php echo $each['ms']?>" class="overlay" style="top: -150px">
                            <div class="popup">
                                <form action="index.php?act=vohieuhoa&mataikhoan=<?php echo $each['ms'] ?>" method="post" >
                                    <h1> Sửa phòng</h1>
                                    <a class="close" href="#">&times;</a>
                                    <label>Tên: </label>
                                    <input type="text" name="tentaikhoan" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                                    <label>email: </label>
                                    <input type="text" name="email" value="<?php echo $each['email']?>" readonly>
                                    <label>password: </label>
                                    <input type="text" name="pass" value="<?php echo $each['password']?>" readonly>
                                    <label>role: </label>
                                    <input type="text" name="role" value="<?php echo $each['role']?>" readonly>
                                    <label>tên lớp: </label>
                                    <input type="text" name="lop" value="<?php echo $each['ten_lop']?>" readonly>
                                    <input type="hidden" name="idclass" value="<?php echo $each['id_class']?>" >
                                    <label>Hình ảnh: </label>
                                    <input type="file" name="img" value="<?php echo $each['img']?>" readonly>
                                    <br>
                                    <label>trạng thái: </label>
                                    <input type="text" name="state" value="<?php echo $each['state']?>" readonly>
                                    <label>ngày sinh: </label>
                                    <input type="text" name="ngaysinh" value="<?php echo $each['ngay_sinh']?>" readonly>
                                    <label> Giới tính: </label>
                                    <input type="text" name="gioitinh" value="<?php echo $each['gioi_tinh']?>" readonly>
                                    <label>Địa chỉ: </label>
                                    <input type="text" name="diachi" value="<?php echo $each['dia_chi']?>" readonly>
                                    <label>số điện thoại: </label>
                                    <input type="text" name="sdt" value="<?php echo $each['sdt']?>" readonly>
                                    <input class="submit" type="submit"  value="Vô Hiệu hóa tài khoản" name="vohieuhoa" style="background-color: #ba8b00">
                                </form>
                            </div>
                        </div>
                    </td>
                <?php } ?>
                <?php if($each['state'] == 'vô hiệu hóa'){?>
                    <td ><div class="box">
                            <a class="button" href="#popup3&mataikhoan=<?php echo $each['ms']?>" style="background-color: #1e7e34  ">Kích Hoạt lại</a>
                        </div>
                        <div id="popup3&mataikhoan=<?php echo $each['ms']?>" class="overlay" style="top: -150px">
                            <div class="popup">
                                <form action="index.php?act=kichhoatlai&mataikhoan=<?php echo $each['ms'] ?>" method="post" >
                                    <h1> Sửa phòng</h1>
                                    <a class="close" href="#">&times;</a>
                                    <label>Tên: </label>
                                    <input type="text" name="tentaikhoan" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                                    <label>email: </label>
                                    <input type="text" name="email" value="<?php echo $each['email']?>" readonly>
                                    <label>password: </label>
                                    <input type="text" name="pass" value="<?php echo $each['password']?>" readonly>
                                    <label>role: </label>
                                    <input type="text" name="role" value="<?php echo $each['role']?>" readonly>
                                    <label>tên lớp: </label>
                                    <input type="text" name="lop" value="<?php echo $each['ten_lop']?>" readonly>
                                    <input type="hidden" name="idlop" value="<?php echo $each['id_class']?>" >
                                    <label>Hình ảnh: </label>
                                    <input type="file" name="img" value="<?php echo $each['img']?>" readonly>
                                    <br>
                                    <label>trạng thái: </label>
                                    <input type="text" name="state" value="<?php echo $each['state']?>" readonly>
                                    <label>ngày sinh: </label>
                                    <input type="text" name="ngaysinh" value="<?php echo $each['ngay_sinh']?>" readonly>
                                    <label> Giới tính: </label>
                                    <input type="text" name="gioitinh" value="<?php echo $each['gioi_tinh']?>" readonly>
                                    <label>Địa chỉ: </label>
                                    <input type="text" name="diachi" value="<?php echo $each['dia_chi']?>" readonly>
                                    <label>số điện thoại: </label>
                                    <input type="text" name="sdt" value="<?php echo $each['sdt']?>" readonly>
                                    <input class="submit" type="submit"  value=" Kích hoạt lại tài khoản" name="kichhoatlai" style="background-color: #1e7e34">
                                </form>
                            </div>
                        </div>
                    </td>
                <?php } ?>
                <td ><div class="box">
                        <a class="button" href="#popup4&mataikhoan=<?php echo $each['ms']?>" style="background-color: #bd2130">Xóa</a>
                    </div>
                    <div id="popup4&mataikhoan=<?php echo $each['ms']?>" class="overlay" style="top: -150px">
                        <div class="popup">
                            <form action="index.php?act=xoataikhoan&mataikhoan=<?php echo $each['ms'] ?>" method="post" enctype="multipart/form-data" >
                                <h1> Sửa phòng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Tên: </label>
                                <input type="text" name="tentaikhoan" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                                <label>email: </label>
                                <input type="text" name="email" value="<?php echo $each['email']?>" readonly>
                                <label>password: </label>
                                <input type="text" name="pass" value="<?php echo $each['password']?>" readonly>
                                <label>role: </label>
                                <input type="text" name="role" value="<?php echo $each['role']?>" readonly>
                                <label>tên lớp: </label>
                                <select name="lop" readonly="">
                                    <?php foreach ($lop as $option){?>
                                        <option value="<?php echo $option['id_class']?>"><?php echo $option['ten_lop']?></option>
                                    <?php }?>
                                </select>
                                <label>Hình ảnh: </label>
                                <input type="text" name="img" value="<?php echo $each['img']?>"readonly >
                                <br>
                                <label>trạng thái: </label>
                                <input type="text" name="state" value="<?php echo $each['state']?>" readonly>
                                <label>ngày sinh: </label>
                                <input type="date" name="ngaysinh" value="<?php echo $each['ngay_sinh']?>" readonly>
                                <label> Giới tính: </label>
                                <input type="text" name="gioitinh" value="<?php echo $each['gioi_tinh']?>" readonly>
                                <label>Địa chỉ: </label>
                                <input type="text" name="diachi" value="<?php echo $each['dia_chi']?>" readonly>
                                <label>số điện thoại: </label>
                                <input type="text" name="sdt" value="<?php echo $each['sdt']?>" readonly>
                                <input class="submit" type="submit"  value="Xóa tài khoản" name="xoataikhoan" style="background-color: #bd2130">
                            </form>
                        </div>
                    </div>
                </td>
        <?php } ?>
    </table>
<?php for($num = 1;$num <= $sotrang;$num++){
    if($currentpage == $num){?>
        <a class="button" href="index.php?act=danhsachtaikhoan&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
    <?php }
    else{?>
        <a class="button" href="index.php?act=danhsachtaikhoan&page=<?php echo $num?>"><?php echo $num?></a>
    <?php }?>
<?php }?>

