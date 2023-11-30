<?php
class Controller
{
	protected $model;
	public function __construct()
	{
		require_once('./model/model.php');
		require_once('./library/class.Cart.php');
		$this->cart = new Cart();
		$this->model = new Model();
	}

	public function uploadimage()
	{
		if (isset($_POST) && !empty($_FILES['file'])) {
			$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
			$duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
			// Kiểm tra xem có phải file ảnh không
			if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
				$filenameNew = mt_rand(1000000000, 9999999999) . '.' . $duoi;
				// tiến hành upload
				if (move_uploaded_file($_FILES['file']['tmp_name'], 'assets/uploads/' . $filenameNew)) {
					// Nếu thành công
					//echo('Upload thành công file: ' . $_FILES['file']['name']); //in ra thông báo + tên file
					//var_dump($_FILES);
					$link = 'assets/uploads/' . $filenameNew;

					$kq1 = '<img src="' . $link . '" width="300px" height="250px" class="mw-100 img-thumbnail" />';

					$kq = array();
					array_push($kq, $kq1);
					array_push($kq, $link);

					echo json_encode($kq);
				} else { // nếu không thành công
					echo ('Có lỗi!'); // in ra thông báo
				}
			} else { // nếu không phải file ảnh
				echo ('Chỉ được upload ảnh'); // in ra thông báo
			}
		} else {
			echo ('Lock'); // nếu không phải post method
		}
	}

	public function removeimage()
	{
		if (!empty($_GET['id'])) {
			if ($this->model->delete('images_product', 'id=' . $_GET['id'])) {
				echo 'xóa thành công';
			} else {
				echo 'xóa thất bại';
			}
		}
	}

	public function addtocart()
	{
		if (!empty($_POST)) {
			$data = $_POST;

			// Lấy thông tin sản phẩm từ bảng products
			$product = $this->model->get('products', 'id=' . $data['id']);

			if ($product) {
				// Tạo một mảng chứa thông tin sản phẩm để thêm vào giỏ hàng
				$cartItem = [
					'name' => $product['name'],
					'thumbnail' => $product['thumbnail'],
					'price' => $product['price'],
					'sale_price' => $product['sale_price'],
					'category_id' => $product['category_id'],
					'color' => $data['color'], // Thêm thông tin màu sắc
					'size' => $data['size'],
					// Bạn có thể thêm các thông tin khác nếu cần
				];

				// Thêm sản phẩm vào giỏ hàng
				$this->cart->add(
					$data['id'],
					1, // Số lượng (có thể thay đổi theo ý bạn)
					$cartItem
				);

				echo 'Thêm sản phẩm ' . $product['name'] . ' vào giỏ hàng thành công !';
			} else {
				echo 'Sản phẩm không tồn tại';
			}
		} else {
			echo 'Thêm thất bại';
		}
	}


	// public function checksoluong($id,$slm){
	// 	if(!empty($_GET['id'])){
	// 		$id = $_GET['id'];
	// 	}
	// 	if(!empty($_GET['slm'])){
	// 		$slm = $_GET['slm'];
	// 	}
	// 	$sltk = $this->model->getSoLuongSanPham($id);
	// 	if($sltk<$slm)
	// 		echo 'false';
	// 	else
	// 		echo 'true';
	// }

	public function error()
	{
		require_once('./view/error.php');
	}
}
