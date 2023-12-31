<style>
    .products-container {
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    thead {
        font-weight: bold;
    }

    #product-image {
        display: inline-block;
        width: 55px;
        height: 55px;
    }

    #product-image:hover {
        border: 1px solid #ff0000;
        border-radius: 5px;
    }
</style>

<section class="products-container mt-4">
    <div class="container h-100">
        <!-- Note -->
        <div class="alert alert-warning text-center fs-5 d-flex aligns-item-center justify-content-center gap-3">
            <span>This page only displays products in your cart</span>
            <a href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=checkout"
                class="btn btn-warning">Checkout</a>
        </div>

        <!-- Products -->
        <div class='row w-100'>
            <table class="rounded-xl">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($products == null) {
                        echo "<tr><td colspan='4' class='text-center'>No products in cart</td></tr>";
                    } else {

                        foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <a <?php if (!isset($product->image)) {
                                        $product->image = "assets/uploads/default.jpg";
                                    }
                                    ?>
                                        href="<?php echo WEB_ROOT ?>/index.php?controller=product&action=show&id=<?php echo $product->id ?>">
                                        <img id="product-image" src="<?php echo $product->image ?>" alt="image">
                                    </a>
                                    <span class="ms-2">
                                        <?php echo $product->name; ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo $product->description; ?>
                                </td>
                                <td>
                                    <?php echo $product->price; ?>
                                </td>
                                <td>
                                    <?php if ($_SESSION['user']['id'] != $product->seller) {
                                        $url = WEB_ROOT . '/index.php?controller=user&action=removeItem&id=' . $product->id;
                                        echo '<a href="' . $url . '" class="btn btn-danger">' . 'Remove' . '</a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>