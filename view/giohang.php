<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- MDB -->

    <style>
        #color {
            width: 20px;
            height: 20px;
            border-radius: 1000px;
        }

        #offcanvasWithBothOptions {
            max-height: 100vh;
            overflow-y: auto;
        }

        .card.mt-auto {
            position: sticky;
            bottom: 0;
            margin-top: auto;
        }

        .row.d-flex {
            margin-bottom: 10px;
        }

        .btn-close {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">
                    Giỏ hàng
                </h5>
                <button type="submit" name="close_update" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <?php if ($this->cart->isEmpty()) : ?>
                <div class="card-body">
                    Chưa có sản phẩm nào trong giỏ hàng
                </div>
            <?php else : ?>
                <?php $allProducts = $this->cart->getItems(); ?>
                <?php foreach ($allProducts as $product_carts) : ?>
                    <?php foreach ($product_carts as $product_cart) : ?>
                        <div class="card rounded-0 border-dark-subtle border-top border-end-0 border-bottom-0 border-start-0">
                            <div class="card-body rounded-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="product.php?id=<?php echo $product_cart['id'] ?>">
                                            <img class="img-fluid rounded-0" src="<?php echo $product_cart['attributes']['thumbnail'] ?>" alt="<?php echo $product_cart['attributes']['name'] ?>" />
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="fw-normal fs-5 mb-2"><?php echo $product_cart['attributes']['name']; ?>
                                                </p>
                                                <a href="product.php?id=<?php echo $product_cart['id'] ?>">
                                                    <?php echo $product_cart['attributes']['name']; ?>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div id="color" class="me-1" style="background-color: <?php echo $product_cart['attributes']['color']; ?>">
                                                    </div>
                                                    <div class="text-muted me-2 ">
                                                        <?php echo $this->model->get('colors', 'id=' . $product_cart['attributes']['color'])['name']; ?>
                                                    </div>
                                                    <div class="border me-2"></div>
                                                    <div class="text-muted ">
                                                        <?php echo $this->model->get('sizes', 'id=' . $product_cart['attributes']['size'])['name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-5 align-self-center">
                                                        <h6 class="mb-0">
                                                            <?php echo number_format($product_cart['attributes']['price']); ?> đ
                                                        </h6>
                                                    </div>
                                                    <div class="d-flex col-md-7">
                                                        <button class="btn btn-link px-2" onclick="event.preventDefault(); this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input id="form1" min="0" name="quantity[<?php echo $product_cart['id']; ?>]" value="<?php echo $product_cart['quantity']; ?>" type="number" class="form-control form-control-sm" />
                                                        <button class="btn btn-link px-2" onclick="event.preventDefault(); this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" style="width: 2px;" name="xoa_sp" class="btn-close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="mt-auto card border-0 ">
                <div class="d-flex justify-content-between">
                    <div class=" ms-2 fs-4 fw-1">Tạm tính:</div>
                    <div class=" fs-4 fw-1">
                        100,000d
                    </div>
                </div>
                <div class="card-body m-auto">
                    <a href="" class="btn btn-warning btn-block btn-lg">Thanh toán</a>
                </div>
            </div>
        </div>
    </form>

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>