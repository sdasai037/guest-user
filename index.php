<?php
include("nevbar.php");

// Check database connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Correct SQL query syntax
$sql = "SELECT * FROM home_1 WHERE status = 'active' AND id = 1";
$result = $con->query($sql);
?>

<div class="">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <section class="collection">
            <div class="row g-0">
                <div class="col-12 bg-dark ">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?> Collection" class="img-fluid w-100">
                </div>
                <div class="col-12 text-center py-3">
                    <p class="section-title text-uppercase"><?php echo $row['name']; ?></p>
                    <h1 class="section-heading fw-bold"><?php echo $row['heading']; ?></h1>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<?php
// Function to fetch active categories
function getCategories($con, $gender)
{
    $sql = "SELECT category_name, category_image, category_link FROM home WHERE gender = ? AND status = 'active'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gender);
    $stmt->execute();
    return $stmt->get_result();
}
?>
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
<?php
// Check database connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Correct SQL query syntax
$sql = "SELECT * FROM home_1 WHERE status = 'active' AND id = 2";
$result = $con->query($sql);
?>

<div class="">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <section class="collection">
            <div class="row g-0">
                <div class="col-12 bg-dark">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?> Collection" class="img-fluid w-100">
                </div>
                <div class="col-12 text-center py-3">
                    <p class="section-title text-uppercase"><?php echo $row['name']; ?></p>
                    <h1 class="section-heading fw-bold"><?php echo $row['heading']; ?></h1>
                </div>
            </div>
        </section>
    <?php } ?>
</div>

<!-- Women's Section -->
<!-- <div class="row g-0">
    <div class="col-12 bg-dark">
        <img src="images/womes.webp" alt="Women's Collection" class="img-fluid" style="width: 100%;">
    </div>
    <p class="section-title">WOMEN'S</p>
    <h1 class="section-heading">Women's Spring-Summer 2025</h1>
</div> -->
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