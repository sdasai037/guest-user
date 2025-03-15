<?php
include("nevbar.php");

// Function to fetch active categories
function getCategories($con, $gender) {
    $sql = "SELECT category_name, category_image, category_link FROM home WHERE gender = ? AND status = 'active'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gender);
    $stmt->execute();
    return $stmt->get_result();
}
?>

<!-- Men's Section -->
<div class="row g-0">
    <div class="col-12 bg-dark">
        <img src="images/mens.webp" alt="Men's Collection" class="img-fluid" style="width: 100%;">
    </div>
    <p class="section-title">MEN'S</p>
    <h1 class="section-heading">Men's Spring-Summer 2025</h1>
</div>
<br>
<div class="container">
    <div class="row">
        <?php
        $menCategories = getCategories($con, "men");
        while ($row = $menCategories->fetch_assoc()) {
            echo '<div class="col-md-3 col-sm-6" style="margin-top: 5%;">';
            echo '<a href="' . $row['category_link'] . '"><img src="images/' . $row['category_image'] . '" class="images" alt="' . $row['category_name'] . '"></a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<br>
<!-- Women's Section -->
<div class="row g-0">
    <div class="col-12 bg-dark">
        <img src="images/womes.webp" alt="Women's Collection" class="img-fluid" style="width: 100%;">
    </div>
    <p class="section-title">WOMEN'S</p>
    <h1 class="section-heading">Women's Spring-Summer 2025</h1>
</div>
<br>
<div class="container">
    <div class="row">
        <?php
        $womenCategories = getCategories($con, "women");
        while ($row = $womenCategories->fetch_assoc()) {
            echo '<div class="col-md-3 col-sm-6" style="margin-top: 5%;">';
            echo '<a href="' . $row['category_link'] . '"><img src="images/' . $row['category_image'] . '" class="images" alt="' . $row['category_name'] . '"></a>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<br><br><br><br>
<?php include("footer.php"); ?>