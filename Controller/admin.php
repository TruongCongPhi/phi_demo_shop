<?php
class Controller
{
    protected $model;
    protected $cart;
    public function __construct()
    {
        require_once('./model/model.php');
        require_once('./library/class.Cart.php');
        $this->cart = new Cart();
        $this->model = new Model();
    }

    public function index()
    {
        $order_list = $this->model->getArray('orders', '');
        require_once('./view/admin.php');
    }

    public function error()
    {
        require_once('./view/error.php');
    }


    //mau sac
    public function listcolor()
    {
        $color_list = $this->model->getArray('colors', '');
        require_once('./view/danh_sach_mau_sac.php');
    }

    public function addcolor()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->insert('colors', $_POST)) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        require_once('./view/addcolor.php');
    }

    public function editcolor()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->update('colors', $_POST, 'id=' . $_GET['id'])) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        $color = $this->model->get('colors', 'id=' . $_GET['id']);
        require_once('./view/editcolor.php');
    }

    public function deletecolor()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('colors', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listcolor');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }

    //memory
    public function listmemory()
    {
        $memory_list = $this->model->getArray('memories', '');
        require_once('./view/listmemory.php');
    }

    public function addmemory()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->insert('memories', $_POST)) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        require_once('./view/addmemory.php');
    }

    public function editmemory()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->update('memories', $_POST, 'id=' . $_GET['id'])) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        $memory = $this->model->get('memories', 'id=' . $_GET['id']);
        require_once('./view/editmemory.php');
    }

    public function deletememory()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('memories', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listmemory');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }

    //ram
    public function listsize()
    {
        $ram_list = $this->model->getArray('sizes', '');
        require_once('./view/danh_sach_kich_thuoc.php');
    }

    public function addsize()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->insert('rams', $_POST)) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        require_once('./view/them_kich_thuoc.php');
    }

    public function editsize()
    {
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $ketqua = false;
            } else {
                if ($this->model->update('rams', $_POST, 'id=' . $_GET['id'])) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        $ram = $this->model->get('rams', 'id=' . $_GET['id']);
        require_once('./view/chinh_sua_kich_thuoc.php');
    }

    public function deletesize()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('rams', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listsize');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }


    //config
    public function listconfig()
    {
        $config_list = $this->model->getArray('configs', '');
        require_once('./view/listconfig.php');
    }

    public function addconfig()
    {
        if (!empty($_POST['config_key']) && !empty($_POST['config_value']) && !empty($_POST['config_desc'])) {
            if ($this->model->insert('configs', $_POST)) {
                $ketqua = true;
            } else {
                $ketqua = false;
            }
        }
        require_once('./view/addconfig.php');
    }

    public function editconfig()
    {
        $config = $this->model->get('configs', 'id=' . $_GET['id']);
        if (!empty($_POST)) {
            if (!empty($_POST['config_value']) && !empty($_POST['config_desc'])) {
                if ($this->model->update('configs', $_POST, 'id=' . $_GET['id'])) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        require_once('./view/editconfig.php');
    }


    //category
    public function listcategory()
    {
        $category_list = $this->model->getArray('categories', '');
        require_once('./view/listcategory.php');
    }

    public function addcategory()
    {
        $error_empty = false;
        $error_add = false;
        $success = false;
        if (!empty($_POST)) { //send request post
            if (in_array('', $_POST)) {
                $error_empty = false;
            } else {
                if ($this->model->insert('categories', $_POST)) {
                    $success = true;
                } else {
                    $error_add = true;
                }
            }
        }
        require_once('./view/addcategory.php');
    }

    public function editcategory()
    {
        if (isset($_GET['id'])) {
            $category = $this->model->get('categories', 'id=' . $_GET['id']);
            $error_empty = false;
            $error_edit = false;
            $success = false;
            if (!empty($_POST)) { //user send request
                if (!is_null($category)) {
                    //check empty input
                    if (in_array('', $_POST)) {
                        $error_empty = true;
                    }
                    //update
                    if ($this->model->update('categories', $_POST, 'id=' . $_GET['id'])) {
                        $success = true;
                    } else {
                        $error_edit = true;
                    }
                } else {
                    header('location:admin.php?task=listcategory');
                }
            }
            require_once('./view/editcategory.php');
        } else {
            header('location:admin.php?task=listcategory');
        }
    }

    public function deletecategory()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('categories', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listcategory');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }

    //hoadon


    public function deleteproduct()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('products', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listproduct');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }


    //product
    public function listproduct()
    {
        $product_list = $this->model->getArray('products', '');
        require_once('./view/danh_sach_san_pham.php');
    }

    public function addproduct()
    {
        //lấy ra dữ liệu để đổ ra view
        $category_list = $this->model->getArray('categories', '');
        $color_list = $this->model->getArray('colors', '');
        $memory_list = $this->model->getArray('memories', '');
        $ram_list = $this->model->getArray('rams', '');
        //init alert
        $success_insert = false;
        $success = false;
        $error_empty = false;
        $error_colors = false;
        $error_memories = false;
        $error_rams = false;
        $error_typefile = false;
        $error_insertimages = false;
        if (!empty($_POST)) { //user send request 
            //check xem trường dữ liệu nào trống !
            if (in_array('', $_POST))
                $error_empty = true;
            //thêm sản phẩm vào database
            if (!$error_empty) {
                //insert data
                //var_dump($_POST);
                $colors = $_POST['colors'];
                $memories = $_POST['memories'];
                $rams = $_POST['rams'];
                $data_insert = array_diff_key($_POST, array('colors' => 1, 'memories' => 2, 'rams' => 3));
                // var_dump($data_insert);
                // var_dump($colors);
                if ($this->model->insert('products', $data_insert)) {
                    $success_insert = true;
                }
                if ($success_insert) {
                    //get lastest product
                    $id_lastproduct = $this->model->get('products', 'sold = 0 ORDER BY id DESC')['id'];
                    //insert colors, memories, rams to DB
                    foreach ($colors as $color) {
                        $error_rams = !$this->model->insert('colors_products', array('color_id' => $color, 'product_id' => $id_lastproduct));
                    }

                    foreach ($memories as $memory) {
                        $error_memories = !$this->model->insert('memories_products', array('memory_id' => $memory, 'product_id' => $id_lastproduct));
                    }

                    foreach ($rams as $ram) {
                        $error_rams = !$this->model->insert('rams_products', array('ram_id' => $ram, 'product_id' => $id_lastproduct));
                    }
                    // upload images gallery
                    // Config tệp tin upload
                    $targetDir = "assets/uploads/"; //thư mục upload
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif'); //đuôi file hợp lệ

                    foreach ($_FILES['images']['name'] as $key => $val) {
                        $image_name = $_FILES['images']['name'][$key];
                        $tmp_name   = $_FILES['images']['tmp_name'][$key];
                        $size       = $_FILES['images']['size'][$key];
                        $type       = $_FILES['images']['type'][$key];
                        $error      = $_FILES['images']['error'][$key];

                        // Đường dẫn file upload
                        $fileName = basename($_FILES['images']['name'][$key]);
                        $targetFilePath = $targetDir . $fileName;

                        // Kiểm tra đuôi file hợp lệ không ?
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                        $filenameNew = mt_rand(1000000000, 9999999999) . '.' . $fileType;
                        $targetFilePathNew = $targetDir . $filenameNew;
                        if (in_array($fileType, $allowTypes)) {
                            // nếu hợp lệ thì lưu ảnh vào thư mục upload
                            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePathNew)) {
                                //trường hợp upload thành công
                                //thêm dữ liệu vào table hình ảnh
                                if ($this->model->insert('images_product', array('name' => $image_name, 'link' => $targetFilePathNew, 'product_id' => $id_lastproduct))) {
                                    //nếu thêm dữ liệu thành công;
                                    $success = true;
                                } else {
                                    $error_insertimages = true;
                                }
                            } else {
                                $error_upload = true;
                            }
                        } else {
                            $error_typefile = true;
                        }
                    }
                }
            }
        }
        require_once('./view/addproduct.php');
    }

    public function editproduct()
    {
        //lấy ra dữ liệu để đổ ra view
        $category_list = $this->model->getArray('categories', '');
        $color_list = $this->model->getArray('colors', '');
        $memory_list = $this->model->getArray('memories', '');
        $ram_list = $this->model->getArray('rams', '');
        //
        $product = $this->model->get('products', 'id=' . $_GET['id']);
        $color_product_list = $this->model->getArray('colors_products', 'product_id=' . $_GET['id']);
        $memory_product_list = $this->model->getArray('memories_products', 'product_id=' . $_GET['id']);
        $ram_product_list = $this->model->getArray('rams_products', 'product_id=' . $_GET['id']);
        $image_product_list = $this->model->getArray('images_product', 'product_id=' . $_GET['id']);
        //
        $old_colors = array(); //mảng màu sắc sản phẩm ban đầu
        while ($cp = $color_product_list->fetch_assoc()) {
            $old_colors[] = $cp['color_id'];
        }
        $old_memories = array();
        while ($mp = $memory_product_list->fetch_assoc()) {
            $old_memories[] = $mp['memory_id'];
        }
        $old_rams = array();
        while ($rp = $ram_product_list->fetch_assoc()) {
            $old_rams[] = $rp['ram_id'];
        }
        //init alert
        $success_insert = false;
        $success = false;
        $error_empty = false;
        $error_colors = false;
        $error_memories = false;
        $error_rams = false;
        $error_typefile = false;
        $error_insertimages = false;
        //nếu người dùng gửi request post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //check xem trường dữ liệu nào trống !
            if (in_array('', $_POST))
                $error_empty = true;
            //thêm sản phẩm vào database
            if (!$error_empty) {
                $new_colors = $_POST['colors']; //mảng màu sắc sản phẩm mới
                $new_memories = $_POST['memories'];
                $new_rams = $_POST['rams'];
                $data_update = array_diff_key($_POST, array('colors' => 1, 'memories' => 2, 'rams' => 3));
                //update data
                if ($this->model->update('products', $data_update, 'id=' . $_GET['id'])) {
                    //mảng màu sắc trùng nhau -> giữ nguyên k thay đổi
                    $same_colors = array_intersect($old_colors, $new_colors);
                    //mảng màu sắc cần xóa
                    $del_colors = array_diff($old_colors, $same_colors);
                    //mảng màu sắc cần thêm
                    $add_colors = array_diff($new_colors, $same_colors);
                    //xóa màu thừa
                    foreach ($del_colors as $idcolor) {
                        $this->model->delete('colors_products', 'color_id=' . $idcolor . ' AND product_id=' . $_GET['id']);
                    }
                    //thêm màu mới
                    foreach ($add_colors as $idcolor) {
                        $this->model->insert('colors_products', array('color_id' => $idcolor, 'product_id' => $_GET['id']));
                    }
                    //mảng bộ nhớ trùng nhau -> giữ nguyên k thay đổi
                    $same_memories = array_intersect($old_memories, $new_memories);
                    //mảng bộ nhớ cần xóa
                    $del_memories = array_diff($old_memories, $same_memories);
                    //mảng bộ nhớ cần thêm
                    $add_memories = array_diff($new_memories, $same_memories);
                    //xóa bộ nhớ thừa
                    foreach ($del_memories as $idmemory) {
                        $this->model->delete('memories_products', 'memory_id=' . $idmemory . ' AND product_id=' . $_GET['id']);
                    }
                    //thêm bộ nhớ mới
                    foreach ($add_memories as $idmemory) {
                        $this->model->insert('memories_products', array('memory_id' => $idmemory, 'product_id' => $_GET['id']));
                    }
                    //mảng ram trùng nhau -> giữ nguyên k thay đổi
                    $same_rams = array_intersect($old_rams, $new_rams);
                    //mảng ram cần xóa
                    $del_rams = array_diff($old_rams, $same_rams);
                    //mảng ram cần thêm
                    $add_rams = array_diff($new_rams, $same_rams);
                    //xóa ram thừa
                    foreach ($del_rams as $idram) {
                        $this->model->delete('rams_products', 'ram_id=' . $idram . ' AND product_id=' . $_GET['id']);
                    }
                    //thêm ram mới
                    foreach ($add_rams as $idram) {
                        $this->model->insert('rams_products', array('ram_id' => $idram, 'product_id' => $_GET['id']));
                    }
                    //upload ảnh mô tả
                    // Config tệp tin upload
                    $targetDir = "assets/uploads/"; //thư mục upload
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif'); //đuôi file hợp lệ
                    if (!empty($_FILES['images'])) {
                        foreach ($_FILES['images']['name'] as $key => $val) {
                            $image_name = $_FILES['images']['name'][$key];
                            $tmp_name   = $_FILES['images']['tmp_name'][$key];
                            $size       = $_FILES['images']['size'][$key];
                            $type       = $_FILES['images']['type'][$key];
                            $error      = $_FILES['images']['error'][$key];

                            // Đường dẫn file upload
                            $fileName = basename($_FILES['images']['name'][$key]);
                            $targetFilePath = $targetDir . $fileName;

                            // Kiểm tra đuôi file hợp lệ không ?
                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                            $filenameNew = mt_rand(1000000000, 9999999999) . '.' . $fileType;
                            $targetFilePathNew = $targetDir . $filenameNew;
                            if (in_array($fileType, $allowTypes)) {
                                // nếu hợp lệ thì lưu ảnh vào thư mục upload
                                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePathNew)) {
                                    //trường hợp upload thành công
                                    //thêm dữ liệu vào table hình ảnh
                                    if ($this->model->insert('images_product', array('name' => $fileName, 'link' => $targetFilePathNew, 'product_id' => $_GET['id']))) {
                                        //nếu thêm dữ liệu thành công;
                                        $success = true;
                                    } else {
                                        $error_insertimages = true;
                                    }
                                } else {
                                    $error_upload = true;
                                }
                            } else {
                                $error_typefile = true;
                            }
                        }
                    }
                }
            }
        }
        require_once('./view/editproduct.php');
    }

    //order
    public function detailorder()
    {
        $order = $this->model->get('orders', 'id=' . $_GET['id']);
        $order_list = $this->model->getArray('orders', 'active=1 OR active=0 ORDER BY active ASC');
        require_once('./view/hoa_don_chi_tiet.php');
    }

    public function listorder()
    {
        $order_list = $this->model->getArray('orders', 'active=1 OR active=0 ORDER BY active ASC');
        require_once('./view/danh_sach_hoa_don.php');
    }

    public function neworder()
    {
        $order_list = $this->model->getArray('orders', 'active = 0');
        require_once('./view/hoa_don_moi.php');
    }

    public function oldorder()
    {
        $order_list = $this->model->getArray('orders', 'active = 1');
        require_once('./view/hoa_don_da_duyet.php');
    }

    public function activeorder()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            $id = $_GET['id'];
            if ($this->model->update('orders', array('active' => 1), 'id=' . $id)) {
                $list_product = $this->model->getArray('orders_products', 'order_id=' . $id);
                while ($product = $list_product->fetch_assoc()) {
                    $productItem = $this->model->get('products', 'id=' . $product['product_id']);
                    $this->model->update('products', array('amount' => $productItem['amount'] - 1, 'sold' => $productItem['sold'] + 1), 'id=' . $productItem['id']);
                }
                header('location:admin.php?task=oldorder');
            } else {
                echo 'Duyệt đơn không thành công !';
            }
        } else {
            echo 'Bạn không đủ quyền hạn thực hiện hành động này !';
        }
    }

    public function deleteorder()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('orders', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listorder');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }

    //user
    public function listuser()
    {
        $user_list = $this->model->getArray('users', '');
        require_once('./view/danh_sach_nguoi_dung.php');
    }


    public function adduser()
    {
        if (!empty($_POST)) {
            // gán các trường lỗi vào biến
            $tendangnhap_error = empty($_POST['username']) ? 'true' : null;
            $matkhau_error = empty($_POST['password']) ? 'true' : null;
            $hoten_error = empty($_POST['fullname']) ? 'true' : null;
            $email_error = empty($_POST['email']) ? 'true' : null;
            $sodienthoai_error = empty($_POST['phone']) ? 'true' : null;
            $diachi_error = empty($_POST['address']) ? 'true' : null;
            if (!empty($_POST['re_password'])) {
                $re_matkhau_error = null;
                $md5pass = md5($_POST['password']);
                $md5repass = md5($_POST['re_password']);
                if ($md5pass == $md5repass) {
                    $re_matkhau_error = null;
                } else {
                    $re_matkhau_error = true;
                }
            } else {
                $re_matkhau_error = true;
            }

            // check xem có trường nào lỗi không
            if ($tendangnhap_error || $matkhau_error || $hoten_error || $email_error || $sodienthoai_error || $diachi_error || $re_matkhau_error) {
                $ketqua = false;
                //echo 'loi o day';
            } else {
                unset($_POST['re_password']);
                $_POST['password'] = md5($_POST['password']);
                if ($this->model->insert('users', $_POST)) {
                    $ketqua = true;
                } else {
                    $ketqua = true;
                }
            }
        }
        require_once('./view/adduser.php');
    }

    public function edituser()
    {
        $error_empty_re_password = false;
        $error_same_pass = false;
        if (!empty($_POST)) {
            //check set newpass
            if (!empty($_POST['password'])) {
                //thay đổi mật khẩu
                if (empty($_POST['re_password']))
                    $error_empty_re_password = true;
                if ($_POST['password'] != $_POST['re_password']) {
                    $error_same_pass = true;
                } else {
                    unset($_POST['re_password']);
                    $_POST['password'] = md5($_POST['password']);
                    if ($this->model->update('users', $_POST, 'id=' . $_GET['id'])) {
                        $ketqua = true;
                    } else {
                        $ketqua = false;
                    }
                }
            } else {
                unset($_POST['password']);
                unset($_POST['re_password']);
                if ($this->model->update('users', $_POST, 'id=' . $_GET['id'])) {
                    $ketqua = true;
                } else {
                    $ketqua = false;
                }
            }
        }
        $user = $this->model->get('users', 'id=' . $_GET['id']);
        require_once('./view/edituser.php');
    }

    public function deleteuser()
    {
        if ($_SESSION['nmb_userdata']['role'] == 1) {
            if ($this->model->delete('users', 'id=' . $_GET['id'])) {
                header('location:admin.php?task=listuser');
            } else {
                echo "Xóa không thành công !";
            }
        } else {
            echo "Bạn không đủ quyền thực hiện thao tác này";
        }
    }
}
