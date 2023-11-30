<?php require_once('./includes/header_sidebar.php'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Quản lí / Màu sắc</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Màu sắc</a></li>
        <li class="breadcrumb-item active"><a href="#">Danh sách thành viên</a></li>
        <li class="breadcrumb-item active"><a href="#">Danh sách sản phẩm</a></li>

    </ol>

    <div class="card mb-4">
        <div class="card-header" style="display: flex; justify-content: space-between;">
            <div>
                <i class="fas fa-table me-1"></i>
                <a>Danh sách sản phẩm</a>
            </div>
            <button type="button" class="btn btn-primary">Thêm màu</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá trị</th>
                        <th>Hiển thị</th>
                        <th>Tác vụ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá trị</th>
                        <th>Hiển thị</th>
                        <th>Tác vụ</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if (!is_null($color_list)) : ?>
                        <?php $i = 1;
                        while ($mausac = $color_list->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $mausac['id'] ?></td>
                                <td><?php echo $mausac['name'] ?></td>
                                <td><?php echo $mausac['value'] ?></td>
                                <td><button class="btn btn-default" style="color:#fff;background-color: <?php echo $mausac['value'] ?>"><?php echo $mausac['name'] ?></button>
                                </td>
                                <td>
                                    <a href="admin.php?task=editcolor&id=<?php echo $mausac['id'] ?>" class="btn btn-warning">Sửa</a>
                                    <a onclick="return confirm('bạn có chắc muốn xóa màu sản phẩm này ?')" href="admin.php?task=deletecolor&id=<?php echo $mausac['id'] ?>" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php else : ?>
                        <b>Chưa có màu sản phẩm nào ! Bạn cần tạo màu mới</b>
                    <?php endif; ?>



                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<?php require_once './includes/footer.php' ?>