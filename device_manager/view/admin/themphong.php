<?php
    $tang = danhsachtang();
?>
<section id="main-content" class="column column-offset-20">

        <div style="width: 100%; display: flex">
            <div id="login-form" style="">
                <form id="changePasswordForm" action="index.php?act=themphonghoc" method="post">
                    <h1> Thêm phòng học</h1>

                    <br>
                    <label>Tên phòng </label>
                    <input type="text" name="tenphong" value="" required>
                    <br>
                    <label>Mô tả: </label>
                    <textarea name="mota" rows="4" cols="50"></textarea>
                    <br>
                    <label>Chọn tầng: </label>
                    <select name="tang" >
                        <?php foreach ($tang as $option){?>
                            <option value="<?php echo $option['id_tang']?>"><?php echo $option['ten_tang']?></option>
                        <?php }?>
                    </select>
                    <hr>
                    <br>
                    <input class="submit" type="submit" value="thêm phòng học" name="themphonghoc">
                </form>
            </div>
        </div>

