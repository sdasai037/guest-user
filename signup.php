<?php
include_once("before-loginheader.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO signup (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($con->query($sql) === TRUE) {
        echo "<script>
    alert('Registration successful.');
    window.location.href = 'login.php';
</script>";
    } else {
        echo "<script>
    alert('Error: Email already registered.');
</script>";
    }
}
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Sign Up</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required> 
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-dark px-5">Continue</button>
                <p class="mt-2 text-muted">You will receive an activation code by email to validate your account creation.</p>
        </form>
    </div>
    <?php
    include('footer.php');
    ?>