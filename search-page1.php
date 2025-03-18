<?php
include("nevbar.php");
?>

<br>
<center>
    <input type="search" placeholder="Search Your Favorite LV Item">
</center>

<div class="container py-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php
        $query = "SELECT * FROM search WHERE status = 'active'";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col">
                <div class="product-card color">
                    <a href="<?php echo $row['link']; ?>">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="product-img">
                    </a>
                    <div class="product-info">
                        <h5 class="product-name"><?php echo $row['name']; ?></h5>
                        <p class="product-price">₹ <?php echo number_format($row['price'], 0); ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php include_once("footer.php"); ?>