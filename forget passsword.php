  Bootstrap CSS

  <?php
    include_once("before-loginheader.php");
    ?>
  <div class="containerr d-flex flex-wrap justify-content-between">

      <div class="login-box col-12 col-md-6 mb-4">
          <h2>Forget Password</h2>
          <p class="text">Forgeoted your Password No needs To be Worried</p>
          <p class="required">Required fields*</p>
          <form action="forget_otp.php" method="post" id="login-form">
              <div class="mb-3">
                  <label for="email" class="form-label">Email*</label>
                  <input type="email" id="email" name="email" class="form-control" data-validation="required email">
                  <div class="error" id="emailError"></div>
              </div>

              <button type="submit" class="btn btn-secondary mt-3 ">Send OTP</button>
          </form>
          <!-- <p class="mt-3">Don't have a MyLV account? <a href="login.php">Create an Account</a></p> -->
      </div>
  </div>
  <?php
    include 'footer.php';
    ?>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


  <!-- <script>
      $(document).ready(function() {
          $("#login-form").validate({
              rules: {
                  email: {
                      required: true,
                      email: true
                  }

              },
              messages: {
                  email: {
                      required: "Email is required.",
                      email: "Please enter a valid email address."
                  }
              },
              errorElement: "div",
              errorPlacement: function(error, element) {
                  error.addClass("text-danger mt-1 small");
                  error.insertAfter(element);
              },
              highlight: function(element) {
                  $(element).addClass("is-invalid");
              },
              unhighlight: function(element) {
                  $(element).removeClass("is-invalid");
              }
          });
      });
  </script> -->