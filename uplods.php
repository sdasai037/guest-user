<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'lv';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

-- Create Table for Products --
<?php
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    description text NOT NULL,
    category VARCHAR(50) NOT NULL
);";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error: " . $conn->error;
}
?>

-- Fetch Products Dynamically --
<?php
$query = "SELECT * FROM products WHERE category='Men'";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    echo "<div class='col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-xs-12' style='margin-top: 5%;'>
        <a href='" . $row['link'] . "'><img src='images/" . $row['image'] . "' class='images' alt='" . $row['name'] . "'></a>
    </div>";
}
?>