<?php
include("nevbar.php");


$q = "SELECT id, name, price, image, description FROM products1 WHERE statas = 'Active' AND category = 'man_cloth'";
$result = mysqli_query($con, $q);
?>

<div class="container py-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col">
                <div class="product-card color">
                    <a href="m_cloth.php">
                        <img src="<?= ($row['image']) ?>"  class="product-img">
                    </a>
                    <div class="product-info">
                        <h5 class="product-name"><?= ($row['name']) ?></h5>
                        <p class="product-price">₹ <?= ($row['price']) ?></p>
                        <div style="display: flex;">
                            <button class="btn btn-outline-secondary order-btn" style="margin-right: 20px;">
                                <a href="login.php" style="text-decoration: none; color:#555">Add to cart</a>
                            </button>
                            <button class="btn btn-outline-secondary order-btn">
                                <a href="login.php" style="text-decoration: none; color:#555">Order</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php mysqli_close($con);
?>