<?php
if(isset($_POST['tukhoa'])){
    $tukhoa = $_POST['tukhoa'];
    $sql_pro = "SELECT * FROM tbl_sanpham 
                 INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc 
                 WHERE tbl_sanpham.tensanpham LIKE '%".$tukhoa."%' 
                 OR tbl_danhmuc.tendanhmuc LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli, $sql_pro);

    if(mysqli_num_rows($query_pro) == 0){
        echo "<script>alert('Không tìm thấy sản phẩm'); window.location.href='../index.php';</script>";
        exit;
    } else {
        ?>
        <h3>Từ khóa: <?php echo $_POST['tukhoa'] ?></h3>
        <ul class="product">
            <?php
            while($row = mysqli_fetch_array($query_pro)){
                ?>
                <li>
                    <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                        <img src="trangquantri/tinhnangquantri/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                        <p class="title_product"><?php echo $row['tensanpham'] ?></p>
                        <p class="price_product">Giá: <?php echo number_format($row['giasp']).'vnđ' ?></p>
                        <p style="text-align: center; font-size: 12px; color: black">Hãng: <?php echo $row['tendanhmuc'] ?></p>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
}
?>
