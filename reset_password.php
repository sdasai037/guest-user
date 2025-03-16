<?php include 'before-loginheader.php'; ?>

<style>

</style>

<div class="container py-5">
    <div class="card reset-card">
        <div class="card-body p-4">
            <h2 class="text-center mb-4">Reset Password</h2>
            <p class="text-muted text-center mb-4">Please enter your new password below.</p>

            <form action="login.php">
                <div class="mb-3">
                    <label for="newpassword" class="form-label">Enter New Password*</label>
                    <input type="password" id="newPassword" name="password" class="form-control" placeholder="Enter new password">
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password*</label>
                    <input type="password" id="confirmPassword" name="c_password" class="form-control" placeholder="Confirm new password">
                </div>

                <button type="submit" class="btn btn-outline-danger w-100 mb-3">Update Password</button>

                <div class="text-center">
                    <a href="login.php" class="text-danger text-decoration-none">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>