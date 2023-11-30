<?php require_once('./includes/header_sidebar.php'); ?>
<!-- nội dung bắt đầu từ đây nha -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Hóa đơn mới</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="admin.php">Người dùng</a></li>
        <li class="breadcrumb-item active"><a href="#">Trở lại</a></li>

    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh sách
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>
                        <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($tv = $user_list->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $tv['id'] ?></td>
                            <td><?php echo $tv['username'] ?></td>
                            <td><?php echo $tv['fullname'] ?></td>
                            <td><?php echo $tv['email'] ?></td>
                            <td><?php echo $tv['phone'] ?></td>
                            <td><?php if ($tv['role'] == 1) {
                                    echo "Admin";
                                } else {
                                    echo "Thành viên";
                                } ?></td>
                            <td>
                                <a href="admin.php?task=edituser&id=<?php echo $tv['id'] ?>" class="btn btn-warning">Sửa</a>
                                <a href="admin.php?task=deleteuser&id=<?php echo $tv['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end nội dung -->
<?php require_once './includes/footer.php' ?>