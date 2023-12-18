<?php
    $tensinhvien = $_SESSION['name'];
    $tongkq = demphongdamuon($ms,$noidung,$ngayTimKiem);
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = danhsachphongdamuon($ms, $offset, $noidung,$ngayTimKiem);
?>
<section id="main-content" class="column column-offset-20">
<h1>
    Danh sách các thiết bị đang mượn:
</h1>
    <form action="index.php?act=danhsachmuon" method="post">
        <input  class="fa-search " type="text" name="noidungtimkiemphongdamuon" placeholder="nhập nội dung tìm kiếm" >
        <input type="date" name="ngaytimkiem" >
        <input class="ui-icon-search" type="submit" value="Tìm" name="tim">
    </form>
<h2>
    Danh sách Phòng:
</h2>

<table  class="table" width="100%">
    <thead class="thead-primary">
    <tr>
        <th class="column-10">Mã</th>
        <th class="column-70">Tên Phòng</th>
        <th class="column-10">Tầng</th>
        <th class="column-10">Mô Tả</th>
        <th class="column-10">Thời Gian</th>
        <th class="column-10">Sáng</th>
        <th class="column-10">Chiều</th>
        <th class="column-10">Trả</th>
    </tr>
    </thead>
    <?php foreach ($result as $each){ ?>
        <tr class="">
            <td ><?php echo $each['id_muon'] ?></td>
            <td ><?php echo $each['ten_phong'] ?></td>
            <td ><?php echo $each['ten_tang'] ?></td>
            <td ><?php echo $each['mo_ta'] ?></td>
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
            <td ><div class="box">
                    <a class="button" href="#popup1&ma=<?php echo $each['id_muon'] ?>">Trả</a>
                </div>
                <div id="popup1&ma=<?php echo $each['id_muon'] ?>" class="overlay">
                    <div class="popup">
                        <form action="index.php?act=dktraphong&mamuon=<?php echo $each['id_muon'] ?>" method="post">
                            <h1> Đăng ký trả phòng</h1>
                            <?php $ngaydangky = date("Y-m-d");
                            $gio = date("H:i:s");
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $ngaygiodangky = $ngaydangky."T".$gio;?>
                            <a class="close" href="#">&times;</a>
                            <label>Phòng: </label>
                            <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                            <label>Mô Tả: </label>
                            <input type="text" name="mota" value="<?php echo $each['mo_ta']?>" readonly>
                            <label>người mượn: </label>
                            <input type="text" name="tensinhvien" value="<?php echo $tensinhvien?>" readonly>
                            <label>MSSV: </label>
                            <input type="text" name="mssv" value="<?php echo $ms ?>" readonly>
                            <input type="hidden" name="idtang" value="<?php echo $each['id_tang']?>" >
                            <input type="hidden" name="idphong" value="<?php echo $each['id_phong']?>" >
                            <input type="hidden" name="ngaydangky" value="<?php echo $ngaygiodangky ?>" >
                            <br>
                            <label>Ngày Mượn: </label>
                            <input type="date" id="thoigianmuon" name="thoigianmuon"  value="<?php echo $ngaytra = date("Y-m-d"); ?>" readonly>
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
                            <input class="submit" type="submit" value="Trả" name="tra">
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>
    <?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachmuon&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachmuon&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>
