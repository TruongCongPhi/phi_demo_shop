<?php require_once('./includes/header_sidebar.php'); ?>
<!-- nội dung bắt đầu từ đây nha -->
<div class="container-fluid px-4">
    <h1 class="mt-4">Hóa đơn đã duyệt</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Danh sách</a></li>
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
                        <th>Mã hóa đơn</th>
                        <th>Danh sách mặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Người đặt</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tác vụ</th>
                </thead>
                <tbody>
                    <?php $i = 1; if(is_null($order_list)){ echo '<tr><td>Chưa có hóa đơn nào !</td></tr>';
                            } else {
                            while($hd = $order_list->fetch_assoc()){ ?>
                    <tr>
                        <td>#<?php echo $hd['id']; ?></td>
                        <td><?php $sanphams = $this->model->getArray('orders_products','order_id='.$hd['id']);
                                    while($sp = $sanphams->fetch_assoc()){ ?>
                            <p>- <?php echo $this->model->get('products','id='.$sp['product_id'])['name'].'<b> ('.$this->model->get('colors','id='.$sp['color_id'])['name'].')'.' ('.$this->model->get('memories','id='.$sp['memory_id'])['name'].')</b> x '.$sp['quantity']; ?>
                            </p>
                            <?php } ?>
                        </td>
                        <td><?php echo number_format($hd['total'], 0, '.', ',');?>đ</td>
                        <td>
                            <?php if($hd['user_id']!=0){ ?>
                            <a
                                href="user.php?id=<?php echo $hd['user_id'] ?>"><?php echo $this->model->get('users','id='.$hd['user_id'])['fullname'] ?></a>
                            <?php } else { ?>
                            <?php echo $hd['fullname'] ?>
                            <?php } ?>
                        </td>
                        <td><?php echo date_format(date_create($hd['created_at']),"d-m-Y"); ?></td>
                        <td>
                            <a href="admin.php?task=detailorder&id=<?php echo $hd['id'] ?>" class="btn btn-warning">Xem
                                chi tiết</a>
                            <a href="admin.php?task=deleteorder&id=<?php echo $hd['id'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end nội dung -->
<?php require_once './includes/footer.php' ?>