<?php require_once('./includes/header_sidebar.php'); ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Bảng danh sách sản phẩm</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item active"><a href="#">Thêm mới sản phẩm</a></li>
        <li class="breadcrumb-item active"><a href="#">Thuộc tính sản phẩm</a></li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh sách sản phẩm
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Chi tiết</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                        <th>Chi tiết</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php if (is_null($product_list)) : ?>
                    <b>Chưa có sản phẩm nào !</b>
                    <?php else : ?>
                    <?php $i = 1;
                        while ($sanpham = $product_list->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $sanpham['id'] ?></td>
                        <td><?php echo $sanpham['name'] ?></td>
                        <td><img src="<?php echo $sanpham['thumbnail'] ?>" class="img-md" alt=""></td>
                        <td><?php echo $sanpham['amount'] ?></td>
                        <td>
                            <a href="admin.php?task=editproduct&id=<?php echo $sanpham['id'] ?>"
                                class="btn btn-warning">Sửa</a>
                            <a href="admin.php?task=deleteproduct&id=<?php echo $sanpham['id'] ?>"
                                class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>

                    </tr>
                    <?php } ?>
                    <?php endif ?>




                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end nội dung -->

<?php require_once './includes/footer.php' ?>