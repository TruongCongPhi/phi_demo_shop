<?php require_once('./includes/header_sidebar.php'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Quản lí / kích thước</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Kích thước</a></li>
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
                        <th>Tên</th>
                        <th>Kích thước</th>
                        <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php if (!is_null($ram_list)) : ?>
                    <?php $i = 1;
                        while ($ram = $ram_list->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $ram['name'] ?></td>
                        <td><?php echo $ram['value'] ?></td>
                        <td>
                            <a href="admin.php?task=editram&id=<?php echo $ram['id'] ?>" class="btn btn-warning">Sửa</a>
                            <a onclick="return confirm('bạn có chắc muốn xóa thông số ram này ?')"
                                href="admin.php?task=deleteram&id=<?php echo $ram['id'] ?>"
                                class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php else : ?>
                    <b>Chưa có thông số ram nào ! Bạn cần thêm thông số ram mới</b>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
<?php require_once './includes/footer.php' ?>