<?php
    $tongkq = demkqtang();
    $item_per_page = 5;
    $currentpage = !empty($_GET['page'])?$_GET['page']:1;
    $offset = ($currentpage-1)*$item_per_page;
    $sotrang = ceil($tongkq/$item_per_page);
    $result = phantrangdanhsachtang($offset);
?>

<section id="main-content" class="column column-offset-20">
    <h2>
        DANH SÁCH PHÒNG
    </h2>
    <a class="button" href="index.php?act=themtang" >Thêm tầng</a>
    <table  class="table" width="100%" >
        <thead class="thead-primary" style="background-color: #4e555b">
        <tr>
            <th class="column-10">id tầng</th>
            <th class="column-70">Tầng</th>
            <th class="column-10">Sửa</th>
            <th class="column-10">Xóa</th>
        </tr>
        </thead>
        <?php foreach ($result as $each){?>
            <tr class="">
                <td ><?php echo $each['id_tang'] ?></td>
                <td ><?php echo $each['ten_tang'] ?></td>
                <td ><div class="box">
                        <a class="button" href="#popup1&matang=<?php echo $each['id_tang'] ?>" style="background-color: #0d6efd">Sửa</a>
                    </div>
                    <div id="popup1&matang=<?php echo $each['id_tang']?>" class="overlay">
                        <div class="popup">
                            <form action="index.php?act=capnhatthongtintang&matang=<?php echo $each['id_tang']?>" method="post" >
                                <h1> Sửa tầng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Tầng: </label>
                                <input type="text" name="tentang" value="<?php echo $each['ten_tang']?>" >
                                <br>
                                <hr>
                                <input class="submit" type="submit"  value="Cập nhật thông tin" name="capnhat">
                            </form>
                        </div>
                    </div>
                </td>
                <td ><div class="box">
                        <a class="button" href="#popup1&xoatang=<?php echo $each['id_tang'] ?>" style="background-color: #bd2130">xóa</a>
                    </div>
                    <div id="popup1&xoatang=<?php echo $each['id_tang']?>" class="overlay">
                        <div class="popup">
                            <form action="index.php?act=xoatang&matang=<?php echo $each['id_tang']?>" method="post" >
                                <h1> Sửa tầng</h1>
                                <a class="close" href="#">&times;</a>
                                <label>Tầng: </label>
                                <input type="text" name="tentang" value="<?php echo $each['ten_tang']?>" readonly>
                                <br>
                                <hr>
                                <input class="submit" type="submit"  value="Xác nhận xóa tầng" name="capnhat">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>

    </table>
    <?php for($num = 1;$num <= $sotrang;$num++){
        if($currentpage == $num){?>
            <a class="button" href="index.php?act=danhsachtang&page=<?php echo $num?>" style="background-color: #1e7e34"><?php echo $num?></a>
        <?php }
        else{?>
            <a class="button" href="index.php?act=danhsachtang&page=<?php echo $num?>"><?php echo $num?></a>
        <?php }?>
    <?php }?>

