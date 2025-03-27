  <?php
    include_once("before-loginheader.php");
    ?>
  <script src="js/velidaction.js"></script>

  <div class="containerr d-flex flex-wrap justify-content-between">

      <div class="login-box col-12 col-md-6 mb-4">
          <h2>Forget Password</h2>
          <p class="text">Forgeoted your Password No needs To be Worried</p>
          <p class="required">Required fields*</p>
          <form action="forget_otp.php" method="post" id="login-form">
              <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" data-validation="required email">
                  <div class="error" id="emailError"></div>
              </div>

              <button type="submit" class="btn btn-secondary mt-3 ">Send OTP</button>

          </form>
          <a href="login.php"><button class="btn btn-secondary mt-3 ">Back to Login</button></a>

      </div>
  </div>

      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);


            if (!empty($email)) {

                echo "<script>alert('A reset password link has been sent to $email');</script>";
                echo "<script>window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Please provide a valid email address.');</script>";
            }
        }
        ?>

  <?php
    include 'footer.php';
    ?>

