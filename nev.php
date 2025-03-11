<?php
$host = "localhost"; // or 127.0.0.1
$user = "root"; // Default for XAMPP
$pass = ""; // Default is empty
$dbname = "lv";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch main categories
$categories = $conn->query("SELECT * FROM categories ORDER BY id ASC");

// Fetch subcategories
$subcategories = [];
$result = $conn->query("SELECT * FROM subcategories");
while ($row = $result->fetch_assoc()) {
    $subcategories[$row['category_id']][] = $row;
}
?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0f0f0">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/Louis_Vuitton-Logo.wine.png" alt="Logo" style="width: 50px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <?php while ($category = $categories->fetch_assoc()) : ?>
          <?php if ($category['is_dropdown'] == 1) : ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown<?= $category['id'] ?>" role="button" data-bs-toggle="dropdown">
                <?= $category['name'] ?>
              </a>
              <ul class="dropdown-menu">
                <?php if (isset($subcategories[$category['id']])) : ?>
                  <?php foreach ($subcategories[$category['id']] as $subcategory) : ?>
                    <li><a class="dropdown-item" href="<?= $subcategory['slug'] ?>"><?= $subcategory['name'] ?></a></li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= $category['slug'] ?>"><?= $category['name'] ?></a>
            </li>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</nav>

<?php $conn->close(); ?>
