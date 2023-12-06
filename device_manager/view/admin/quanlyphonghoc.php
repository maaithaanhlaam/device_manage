<?php
    $tongkq = demphonghoc();
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = danhsachphonghoc($offset);
    $tang = danhsachtang();
?>

<section id="main-content" class="column column-offset-20">
    <h2>
       DANH SÁCH PHÒNG
    </h2>
    <a class="button" href="index.php?act=themphong" >Thêm phòng học</a>
    <table  class="table" width="100%" >
        <thead class="thead-primary" style="background-color: #4e555b">
        <tr>
            <th class="column-10">Mã</th>
            <th class="column-70">Phòng</th>
            <th class="column-10">Mô Tả</th>
            <th class="column-10">Tầng</th>
            <th class="column-10">Sửa</th>
            <th class="column-10">Xóa</th>
        </tr>
        </thead>
        <?php foreach ($result as $each){?>
            <tr class="">
                <td ><?php echo $each['id_phong'] ?></td>
                <td ><?php echo $each['ten_phong'] ?></td>
                <td ><?php echo $each['mo_ta'] ?></td>
                <td ><?php echo $each['ten_tang'] ?></td>
                <td ><div class="box">
                        <a class="button" href="#popup1&maphong=<?php echo $each['id_phong'] ?>" style="background-color: #0d6efd">Sửa</a>
                    </div>
                    <div id="popup1&maphong=<?php echo $each['id_phong']?>" class="overlay">
                        <div class="popup">
                            <form action="index.php?act=capnhatthongtinphong&maphong=<?php echo $each['id_phong']?>" method="post" >
                                <h1> Sửa phòng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Phòng: </label>
                                <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" >
                                <label>Mô Tả: </label>
                                <input type="text" name="mota" value="<?php echo $each['mo_ta']?>" >
                                <label>Tầng: </label>
                                <select name="tang" >
                                    <?php foreach ($tang as $option){?>
                                        <option value="<?php echo $option['id_tang']?>"><?php echo $option['ten_tang']?></option>
                                    <?php }?>
                                </select>
                                <br>
                                <hr>
                                <input class="submit" type="submit"  value="Cập nhật thông tin" name="capnhat">
                            </form>
                        </div>
                    </div>
                </td>
                <td ><div class="box">
                        <a class="button" href="#popup1&xoaphong=<?php echo $each['id_phong'] ?>" style="background-color: #bd2130">xóa</a>
                    </div>
                    <div id="popup1&xoaphong=<?php echo $each['id_phong']?>" class="overlay">
                        <div class="popup">
                            <form action="index.php?act=xoaphong&maphong=<?php echo $each['id_phong']?>" method="post" >
                                <h1> Xác nhận xóa phòng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Phòng: </label>
                                <input type="text" name="tenphong" value="<?php echo $each['ten_phong']?>" readonly>
                                <label>Mô Tả: </label>
                                <input type="text" name="mota" value="<?php echo $each['mo_ta']?>" readonly>
                                <label>Tầng: </label>
                                <input type="text" name="tang" value="<?php echo $each['ten_tang']?>" readonly>
                                <br>
                                <hr>
                                <input class="submit" type="submit"  value="Xác nhận xóa" name="capnhat">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </table>
    <?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachphong&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachphong&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>

