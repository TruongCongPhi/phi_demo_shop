<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Khung mẫu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Trang quản trị</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Cài đặt</a></li>
                    <li><a class="dropdown-item" href="#!">Tài khoản</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Đăng xuất</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- sidebar và nội dung -->
    <div id="layoutSidenav">
        <!-- sidebar-right -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Chính </div>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i>
                            </div>
                            Tổng quan
                        </a>

                        <div class="sb-sidenav-menu-heading">Quản lý</div>
                        <!-- Đơn hàng -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice"></i></div>
                            Đơn hàng
                            <span
                                class="badge bg-light text-black ms-1 rounded-pill"><?php echo $this->model->count('orders', ''); ?></span>

                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="admin.php?task=listorder">Danh sách đơn hàng</a>
                                <a class="nav-link" href="admin.php?task=neworder">Đơn hàng mới</a>
                                <a class="nav-link" href="admin.php?task=oldorder">Đơn hàng đã duyệt</a>


                            </nav>
                        </div>

                        <!-- danh mục -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></i></div>
                            Danh mục sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseCategory" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionCategory">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#CategoryCollapseMale" aria-expanded="false"
                                    aria-controls="CategoryCollapseMale">
                                    Nam
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="CategoryCollapseMale" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionCategory">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Trẻ em</a>
                                        <a class="nav-link" href="register.html">Người lớn</a>

                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#CategoryCollapseFemale" aria-expanded="false"
                                    aria-controls="CategoryCollapseFemale">
                                    Nữ
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="CategoryCollapseFemale" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionCategory">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">Trẻ em</a>
                                        <a class="nav-link" href="404.html">Người lớn</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>

                        <!-- quản lí sản phẩm -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-shirt"></i></i></i></div>
                            Sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="admin.php?task=listproduct">Danh sách sản phẩm</a>
                                <a class="nav-link" href="admin.php?task=addproduct">Thêm mới sản phẩm</a>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#CategoryCollapseProducts" aria-expanded="false"
                                    aria-controls="CategoryCollapseProducts">
                                    Thuộc tính sản phẩm
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="CategoryCollapseProducts" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionCategory">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="admin.php?task=listcolor">Màu sắc</a>
                                        <a class="nav-link" href="admin.php?task=listsize">Kích thước</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAuths"
                            aria-expanded="false" aria-controls="collapseAuths">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            Người dùng
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAuths" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="admin.php?task=listuser">Danh sách người
                                    dùng</a>
                                <a class="nav-link" href="admin.php?task=adduser">Thêm mới người dùng</a>
                            </nav>
                        </div>


                        <div class="sb-sidenav-menu-heading">Vận chuyển</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-truck"></i></div>
                            Theo dõi đơn hàng
                        </a>
                    </div>

                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Đăng nhập với tư cách:</div>
                    Admin
                </div>
            </nav>
        </div>
        <!--nội dung -->
        <div id="layoutSidenav_content">
            <main>
                <!-- bắt đầu nội dung -->