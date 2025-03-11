  <!-- Bootstrap CSS -->
  <style>
      body {
          margin: 0;
          padding: 0;
          /* background: url('images/w2.webp') no-repeat center center/cover; */
      }

      .containerr {
          margin: 64px 9.3vw 92px;
          min-height: calc(100vh - 236px);
      }

      h2 {
          font-size: 35px;
          font-weight: 500;
          color: #000;
          margin-bottom: 16px;
          font-family: system-ui;
      }

      .text,
      .info-box ul li {
          font-size: 15px;
          font-family: system-ui;
          line-height: 1.8;
          padding-bottom: 13%;
      }

      .required {
          font-size: 15px;
          font-family: system-ui;
          text-align: right;
      }

      .forget_text {
          cursor: pointer;
          color: #19110b;
          text-decoration: underline;
      }

      .btn-custom {
          border: 1px solid #19110b;
          font-size: 16px;
          font-weight: 400;
          line-height: 20px;
          text-align: center;
          color: #fff;
          background-color: #000;
          padding: 14px 122px;
          border-radius: 24px;
      }

      .btn-custom:hover {
          background-color: #fff;
          color: #000;
          font-size: larger;
      }

      .info-box {
          background-color: #f6f5f3;
          padding: 32px;
      }

      .tital {
          text-transform: uppercase;
          font-family: system-ui;
          color: #19110b;
      }

      .itam {
          display: flex;
          align-items: center;
          gap: 10px;
      }

      .itam span {
          font-size: 24px;
          color: black;
      }

      .text-danger {
          font-size: 14px;
      }
  </style>

  <?php
    include_once("before-loginheader.php");
    ?>
  <div class="containerr d-flex flex-wrap justify-content-between">

      <div class="login-box col-12 col-md-6 mb-4">
          <h2>Created new Password</h2>
          <!-- <p class="text">Forgeoted your Password No needs To be Worried</p> -->
          <p class="required">Required fields*</p>
          <form action="profile.php" method="post" id="login-form">

              <div class="mb-3">
                  <label for="OTP" class="form-label">OTP*</label>
                  <input type="password" id="OTP" name="OTP" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Enter New Password*</label>
                  <input type="password" id="password" name="password" class="form-control" required>
              </div>
              <div class="c_mb-3">
                  <label for="password" class="form-label">Confirm New Password*</label>
                  <input type="password" id="c_password" name="c_password" class="form-control" required>
              </div>


              <button type="submit" class="btn btn-secondary mt-3 ">Save</button>
              <!-- <button class="btn btn-outline-secondary order-btn">Order</button> -->
          </form>
          <!-- <p class="mt-3">Don't have a MyLV account? <a href="login.php">Create an Account</a></p> -->
      </div>
  </div>
  <?php
    include 'footer.php';
    ?>


  <script>
      $(document).ready(function() {
          $("#login-form").validate({
              rules: {
                  OTP: {
                      required: true,
                      digits: true,
                      minlength: 6,
                      maxlength: 6
                  },
                  password: {
                      required: true,
                      minlength: 8,
                      maxlength: 20,
                      pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}$/
                  },
                  c_password: {
                      required: true,
                      equalTo: "#password"
                  }
              },
              messages: {
                  OTP: {
                      required: "Please enter the OTP sent to your email.",
                      digits: "OTP should contain only numbers.",
                      minlength: "OTP must be exactly 6 digits.",
                      maxlength: "OTP must be exactly 6 digits."
                  },
                  password: {
                      required: "Please enter your password.",
                      minlength: "Minimum length is 8 characters.",
                      maxlength: "Maximum length is 20 characters.",
                      pattern: "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character."
                  },
                  c_password: {
                      required: "Please confirm your password.",
                      equalTo: "Your entered password does not match."
                  }
              },
              errorElement: "div",
              errorPlacement: function(error, element) {
                  error.addClass("text-danger");
                  error.insertAfter(element);
              },
              highlight: function(element) {
                  $(element).addClass("is-invalid");
              },
              unhighlight: function(element) {
                  $(element).removeClass("is-invalid").addClass("is-valid");
              },
              submitHandler: function(form) {
                  alert("Form submitted successfully!");
                  form.submit();
              }
          });
      });
  </script>