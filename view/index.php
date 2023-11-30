<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for color and size options -->
    <style>
    .color-option-label {
        align-items: center;
        cursor: pointer;
    }

    .color-option {
        cursor: pointer;
        margin-right: 5px;
        display: none;
    }

    .color-checkmark {
        border: 3px solid #fff;
        box-shadow: 0 0 0 1px gray;
        width: 28px;
        height: 28px;
        border-radius: 100px;
    }

    .color-option:checked+.color-checkmark {
        box-shadow: 0 0 0 2px #000;
    }

    .size-option-label {
        align-items: center;
        cursor: pointer;
    }

    .size-option {
        cursor: pointer;
        margin-right: 5px;
        display: none;
        width: 30px;
        height: 30px;
    }

    .size-option:checked+.size-checkmark {
        border: 2px solid gray;
    }

    .size-checkmark {
        border: 2px solid #fff;
        /* Border to provide contrast */
        width: 30px;
        height: 30px;
    }
    </style>
</head>

<body>
    <?php require_once('./includes/navbar.php');
    include('giohang.php')
    ?>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center p-5">
        <?php if (is_null($product_list)) : ?>
        <b>Chưa có sản phẩm nào !</b>
        <?php else : ?>
        <?php while ($data = $product_list->fetch_assoc()) { ?>
        <div class="col mb-5">
            <div class="card">
                <!-- Product image-->
                <a href='chi_tiet_san_pham.php?id_san_pham=<?php echo $data['id'] ?>'>
                    <img class="card-img-top" src="<?php echo $data['thumbnail'] ?>" alt="..." />
                </a>
                <!-- Product details-->
                <div class="card-body">
                    <div class="color-options">
                        <?php
                                $color_product_list = $this->model->getArray('colors_products', 'product_id=' . $data['id']);
                                $color_array = array();
                                $firstColor = true;
                                while ($colorItem = $color_product_list->fetch_assoc()) {
                                    $cl = $colorItem['color_id'];
                                    $color_array[] = $cl;
                                ?>
                        <label class="color-option-label">
                            <input type="radio" name="color_<?php echo $data['id'] ?>" class="color-option"
                                <?php echo ($firstColor == 1) ? 'checked' : '' ?> value="<?php echo $cl ?>">
                            <div class="color-checkmark"
                                style="background-color: <?php echo $this->model->get('colors', 'id=' . $cl)['value'] ?>">
                            </div>
                        </label>
                        <?php $firstColor = false;
                                } ?>
                    </div>

                    <div class="size-options">
                        <?php
                                $size_product_list = $this->model->getArray('sizes_products', 'product_id=' . $data['id']);
                                while ($sizeItem = $size_product_list->fetch_assoc()) {
                                    $size = $sizeItem['size_id'];
                                ?>
                        <label class="size-option-label">
                            <input type="radio" name="size_<?php echo $data['id'] ?>" class="size-option"
                                value="<?php echo $size ?>">
                            <div class="size-checkmark text-center">
                                <?php echo $this->model->get('sizes', 'id=' . $size)['name'] ?></div>
                        </label>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="fs-5"><a href="product.php?id=<?php echo $data['id'] ?>"><?php echo $data['name'] ?></a>
                    </div>
                    <div class="fs-5"><?php echo number_format($data['price'], 0, '', ',') ?>đ còn
                        <?php echo number_format($data['sale_price'], 0, '', ',') ?> đ</div>
                </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer border-top-0 bg-transparent d-flex justify-content-center">
                <button onclick="addtocart(this)" data-product="<?php echo $data['id'] ?>" class=" btn
                            btn-outline-dark">Thêm vào giỏ hàng</button>

            </div>
        </div>
        <?php } ?>
        <?php endif ?>



    </div>
    <script>
    $(document).ready(function() {
        addtocart = function(product) {
            var id_product = product.dataset.product;
            var selectedColor = $("input[name='color_" + id_product + "']:checked").val();
            var selectedSize = $("input[name='size_" + id_product + "']:checked").val();

            $.ajax({
                url: "ajax.php?task=addtocart",
                type: "post",
                dataType: "text",
                data: {
                    id: id_product,
                    color: selectedColor,
                    size: selectedSize,
                },
                success: function(result) {
                    alert(result);
                }
            });
        }
    });
    </script>
</body>

</html>