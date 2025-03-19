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
          <form action="reset_password.php" method="post" id="login-form">

              <div class="d-flex justify-content-center mb-4" name="otp">
                  <input type=" text" class="form-control otp-input" maxlength="1" autofocus oninput="moveToNext(this, 0)" data-validation="required numeric" name="otp1">

                  <input type="text" class="form-control otp-input" maxlength="1" oninput="moveToNext(this, 1)" data-validation="required numeric" name="otp2">

                  <input type="text" class="form-control otp-input" maxlength="1" oninput="moveToNext(this, 2)" data-validation="required numeric" name="otp3">
                  <input type="text" class="form-control otp-input" maxlength="1" oninput="moveToNext(this, 3)" data-validation="required numeric" name="otp4">
                  <input type="text" class="form-control otp-input" maxlength="1" oninput="moveToNext(this, 4)" data-validation="required numeric" name="otp5">
                  <input type="text" class="form-control otp-input" maxlength="1" oninput="moveToNext(this, 5)" data-validation="required numeric" name="otp6">
              </div>
              <div class="error" id="otpError"></div>

              <button type="submit" class="btn btn-secondary mt-3 ">Update Password</button>
          </form>
          <a href="login.php"><button class="btn btn-secondary mt-3 ">Back to Login</button></a>
      </div>
  </div>
  <?php
    include 'footer.php';
    ?>
  <script>
      function moveToNext(input, index) {
          if (input.value.length === input.maxLength) {
              if (index < 5) {
                  input.parentElement.children[index + 1].focus();
              }
          }
      }
  </script>
  <script>
      let timeLeft = 120; // Default timer value
      const timerDisplay = document.getElementById('timer');
      const resendButton = document.getElementById('resend_otp');

      // Check if the user is coming from another page (not a refresh)
      if (performance.navigation.type === 1 || document.referrer === "") {
          // Page is refreshed, so use sessionStorage timer
          if (sessionStorage.getItem('otpTimer')) {
              timeLeft = parseInt(sessionStorage.getItem('otpTimer'), 20);
          }
      } else {
          // User came from another page, reset timer
          sessionStorage.setItem('otpTimer', 120);
      }

      function startCountdown() {
          resendButton.style.display = "none"; // Hide button initially
          timerDisplay.innerHTML = `Resend OTP in ${timeLeft} seconds`;

          const countdown = setInterval(() => {
              if (timeLeft <= 0) {
                  clearInterval(countdown);
                  timerDisplay.innerHTML = "You can now resend the OTP.";
                  resendButton.style.display = "inline";
                  sessionStorage.removeItem('otpTimer'); // Clear storage after timer ends
              } else {
                  timerDisplay.innerHTML = `Resend OTP in ${timeLeft} seconds`;
                  timeLeft -= 1;
                  sessionStorage.setItem('otpTimer', timeLeft); // Update sessionStorage
              }
          }, 1000);
      }

      // Start countdown if there's remaining time
      if (timeLeft > 0) {
          startCountdown();
      } else {
          resendButton.style.display = "inline";
          timerDisplay.innerHTML = "You can now resend the OTP.";
      }

      resendButton.onclick = function(event) {
          event.preventDefault();
          sessionStorage.setItem('otpTimer', 120); // Reset timer
          window.location.href = 'resend_otp_forgot_password.php';
      };
  </script>

  <button type="submit" class="btn btn-outline-danger w-100 mb-3" name="otp_btn">Verify OTP</button>
  </form>


  <div class="text-center">
      <a href="login.php" class="text-danger text-decoration-none">Back to Login</a>
  </div>

  </div>
  </div>
  </div>

  <script>
      function moveToNext(input, index) {
          if (input.value.length === input.maxLength) {
              if (index < 5) {
                  input.parentElement.children[index + 1].focus();
              }
          }
      }
  </script>

  <?php include 'footer.php';
    if (isset($_POST['otp_btn'])) {

        if (isset($_SESSION['forgot_email'])) {
            $email = $_SESSION['forgot_email'];
            $otp1 = $_POST['otp1'];
            $otp2 = $_POST['otp2'];
            $otp3 = $_POST['otp3'];
            $otp4 = $_POST['otp4'];
            $otp5 = $_POST['otp5'];
            $otp6 = $_POST['otp6'];

            $otp = $otp1 . $otp2 . $otp3 . $otp4 . $otp5 . $otp6;
            // echo $otp;

            // Fetch the OTP from the database for the given email
            $query = "SELECT otp FROM password_token WHERE email = '$email' ";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $db_otp = $row['otp'];
                if (!$db_otp) {
                    setcookie('error', 'OTP has expired. Regenerate New OTP', time() + 5, '/');
    ?>
                  <script>
                      window.location.href = 'forgot_password.php';
                  </script>
                  <?php
                }
                // Compare the OTPs
                else {
                    if ($otp == $db_otp) {
                        // Redirect to new password page
                    ?>
                      <script>
                          window.location.href = 'reset_password.php';
                      </script>
                  <?php

                    } else {
                        setcookie('error', 'Incorrect OTP', time() + 5, '/');
                    ?>

                      <script>
                          window.location.href = 'otp_form.php';
                      </script>
              <?php
                    }
                }
            } else {
                setcookie('error', 'OTP has expired. Regenerate New OTP', time() + 5, '/');
                ?>
              <script>
                  window.location.href = 'forget passsword.php';
              </script>
  <?php
            }
        }
    }
    ?>