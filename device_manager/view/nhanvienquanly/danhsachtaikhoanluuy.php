<?php
$tensinhvien = $_SESSION['name'];
$ma = $_SESSION['account'];
    $tongkq = demtaikhoanluuy($noidung);
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = danhsachtaikhoanluuy($offset, $noidung);
?>
<section id="main-content" class="column column-offset-20">
    <h1>
        Danh Sách Tài Khoản Lưu ý:
    </h1>
    <form action="index.php?act=danhsachtaikhoanluuy" method="post">
        <input  class="fa-search " type="text" name="noidungtimkiemtaikhoanluuy" placeholder="nhập tên tài khoản hoặc mssv" >
        <input class="ui-icon-search" type="submit" value="Tìm" name="tim">
    </form>
    <h2>
        Danh sách Phòng:
    </h2>

    <table  class="table" width="100%">
        <thead class="thead-primary">
        <tr>
            <th class="column-10">Mã</th>
            <th class="column-10">Tên Phòng Mượn Trễ</th>
            <th class="column-10">Ngày Mượn</th>
            <th class="column-10">Sáng</th>
            <th class="column-10">Chiều</th>
            <th class="column-10">Họ Và Tên</th>
            <th class="column-10">Trạng Thái Tài Khoản</th>
            <th class="column-10">Vô Hiệu Hóa</th>
        </tr>
        </thead>
        <?php foreach ($result as $each){ ?>
            <tr class="">
                <td ><?php echo $each['id_luu_y'] ?></td>
                <td ><?php echo $each['ten_phong'] ?></td>
                <td ><?php $ngay_muon_timestamp = strtotime($each['ngay_muon']);
                    echo date("d/m/Y",$ngay_muon_timestamp) ?></td>
                <td ><?php if($each['sang'] == 1){
                        echo 'x';
                    }
                    else{
                        echo '';
                    }?></td>
                <td ><?php if($each['chieu'] == 1){
                        echo 'x';
                    }
                    else{
                        echo '';
                    }?></td>
                <td ><a href="index.php?act=xemprofile&mssv=<?php echo $each['ms'] ?>"><?php echo $each['ten_tai_khoan'] .'['.$each['ms'].']'.'['.$each['ten_lop'].']' ?></a></td>
                <td ><?php echo $each['state']  ?></td>
                <td ><?php if($each['state'] == 'kích hoạt'){?>
                        <div class="box">
                            <a class="button" href="#popup1&maluuy=<?php echo $each['id_luu_y'] ?>" style="background-color: #bd2130">Vô Hiệu Hóa</a>
                        </div>
                        <div id="popup1&maluuy=<?php echo $each['id_luu_y'] ?>" class="overlay">
                            <div class="popup">
                                <form action="index.php?act=vohieuhoataikhoan&maluuy=<?php echo $each['id_luu_y'] ?>" method="post">
                                    <h1> Vô Hiệu Hóa Tài Khoản Trễ Hạn</h1>
                                    <a class="close" href="#">&times;</a>
                                    <label>Phòng đã trễ: </label>
                                    <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                                    <label>người mượn: </label>
                                    <input type="text" name="tensinhvien" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                                    <label>MSSV: </label>
                                    <input type="text" name="mssv" value="<?php echo $each['ms']?>" readonly>
                                    <input type="hidden" name="email" value="<?php echo $each['email']?>" >
                                    <input type="hidden" name="mamuon" value="<?php echo $each['id_muon']?>">
                                    <input type="hidden" name="idclass" value="<?php echo $each['id_class']?>">
                                    <br>
                                    <label>Ngày Mượn: </label>
                                    <input type="date" id="thoigianmuon" name="thoigianmuon"  value="<?php echo $each['ngay_muon'] ?>" readonly>
                                    <br>
                                    <?php if ($each['sang'] ==1){?>
                                        <input type="checkbox" name="sang" value="1" disabled checked>buổi sáng
                                        <input type="hidden" name="sang" value=1 >
                                    <?php }
                                    else{?>
                                        <input type="checkbox"  name="sang" value="1" disabled>buổi sáng
                                        <input type="hidden" name="sang" value=0 >
                                    <?php }
                                    ?>
                                    <?php if ($each['chieu'] == 1){?>
                                        <input type="checkbox" name="chieu" value="1"disabled checked>buổi chiều
                                        <input type="hidden" name="chieu" value="1" >
                                    <?php }
                                    else{?>
                                        <input type="checkbox" name="chieu" value="1" disabled >buổi chiều
                                        <input type="hidden" name="chieu" value="0" >
                                    <?php }
                                    ?>
                                    <input class="submit" type="submit" value="Vô Hiệu Hóa" name="vohieu" style="background-color: #bd2130">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if($each['state'] == 'vô hiệu hóa'){?>
                        <div class="box">
                            <a class="button" href="#popup2&maluuy=<?php echo $each['id_luu_y'] ?>" style="background-color: #1e7e34">Kích Hoạt</a>
                        </div>
                        <div id="popup2&maluuy=<?php echo $each['id_luu_y'] ?>" class="overlay">
                            <div class="popup">
                                <form action="index.php?act=kichhoattaikhoan&maluuy=<?php echo $each['id_luu_y'] ?>" method="post">
                                    <h1> Kích Hoạt Lại Tài Khoản</h1>
                                    <a class="close" href="#">&times;</a>
                                    <label>Phòng đã trễ: </label>
                                    <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                                    <label>người mượn: </label>
                                    <input type="text" name="tensinhvien" value="<?php echo $each['ten_tai_khoan']?>" readonly>
                                    <label>MSSV: </label>
                                    <input type="text" name="mssv" value="<?php echo $each['ms']?>" readonly>
                                    <input type="hidden" name="email" value="<?php echo $each['email']?>" >
                                    <input type="hidden" name="mamuon" value="<?php echo $each['id_muon']?>">
                                    <input type="hidden" name="idclass" value="<?php echo $each['id_class']?>">
                                    <br>
                                    <label>Ngày Mượn: </label>
                                    <input type="date" id="thoigianmuon" name="thoigianmuon"  value="<?php echo $each['ngay_muon'] ?>" readonly>
                                    <br>
                                    <?php if ($each['sang'] ==1){?>
                                        <input type="checkbox" name="sang" value="1" disabled checked>buổi sáng
                                        <input type="hidden" name="sang" value=1 >
                                    <?php }
                                    else{?>
                                        <input type="checkbox"  name="sang" value="1" disabled>buổi sáng
                                        <input type="hidden" name="sang" value=0 >
                                    <?php }
                                    ?>
                                    <?php if ($each['chieu'] == 1){?>
                                        <input type="checkbox" name="chieu" value="1"disabled checked>buổi chiều
                                        <input type="hidden" name="chieu" value="1" >
                                    <?php }
                                    else{?>
                                        <input type="checkbox" name="chieu" value="1" disabled >buổi chiều
                                        <input type="hidden" name="chieu" value="0" >
                                    <?php }
                                    ?>
                                    <input class="submit" type="submit" value="Kích Hoạt Lại" name="kichhoat" style="background-color: #1e7e34">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachyeucaumuonphong&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachyeucaumuonphong&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>