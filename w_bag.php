<?php
include_once("nevbar.php");

// Fetch product details from database
$product_id = 1; // Change this dynamically as needed (e.g., from URL parameter)
$query = "SELECT * FROM women_bag WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>

<div class="">
    <div class="row g-0">
        <div class="col-lg-6 col-12 product-image">
            <img src="<?php echo $product['image']; ?>" alt="Product Image" class="w-100">
        </div>
        <div class="col-lg-6 col-12 product-details text-center text-lg-start">
            <p class="text-muted"><?php echo $product['sku']; ?></p>
            <h2><?php echo $product['product_name']; ?></h2>
            <h4>₹<?php echo number_format($product['price'], 2); ?></h4>
            <p class="text-muted">(M.R.P. incl. of all taxes)</p>

            <p><strong>Colours</strong>: <?php echo $product['color']; ?></p>

            <p class="text-muted">Our Digital Concierge is available if you have any question on this product.
                <a href="login.php" style="color: black;">Contact us</a>
            </p>

            <p><?php echo nl2br($product['description']); ?></p>
        </div>
    </div>
</div>

<?php include_once("footer.php"); ?>