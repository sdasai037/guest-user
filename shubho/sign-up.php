<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script> -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<link href="css/bootstrap-icons.css">
<script src="js/additional-methods.min.js"></script>


<!-- <script>
    $(document).ready(function() {
        $("#registrationForm").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 2
                },
                last_name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{10,20}$/
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                first_name: {
                    required: "First name is required.",
                    minlength: "First name must be at least 2 characters long."
                },
                last_name: {
                    required: "Last name is required.",
                    minlength: "Last name must be at least 2 characters long."
                },
                email: {
                    required: "Email is required.",
                    email: "Please enter a valid email address."
                },
                mobile: {
                    required: "Mobile number is required.",
                    digits: "Only digits are allowed.",
                    minlength: "Mobile number must be exactly 10 digits.",
                    maxlength: "Mobile number must be exactly 10 digits."
                },
                password: {
                    required: "Password is required.",
                    minlength: "Password must be at least 8 characters long.",
                    maxlength: "Password cannot exceed 20 characters.",
                    pattern: "Password must contain at least one uppercase letter, one number, and one special character."
                },
                confirm_password: {
                    required: "Please confirm your password.",
                    equalTo: "Passwords do not match."
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
                $(element).removeClass("is-invalid");
            }
        });
    });
</script> -->
</head>



<div class="container py-5">
    <h2 class="text-uppercase fw-bold mb-3">Create Your Account</h2>
    <p class="text-muted">Create your account to have access to a more personalized experience.</p>
    <p>Already have a MyLV account? <a href="login.php" class="text-decoration-none">Log in here.</a></p>
    <p class="text-end text-danger">* Required fields</p>

    <form id="registrationForm" action="after-login-index.php" method="POST">
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name*</label>
            <input type="text" id="first_name" name="first_name" class="form-control form-control-sm" data-validation="required alpha">
            <div class="error" id="firstNameError"></div>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name*</label>
            <input type="text" id="last_name" name="last_name" class="form-control form-control-sm" data-validation="required alpha">
            <div class="error" id="lastNameError"></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email*</label>
            <input type="email" id="email" name="email" class="form-control form-control-sm" data-validation="required email">
            <div class="error" id="emailError"> </div>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile Number*</label>
            <input type="tel" id="mobile" name="mobile" class="form-control form-control-sm" data-validation="required numeric min max" data-min="10" data-max="10">
            <div class="error" id="mobileError"></div>
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password*</label>
            <input type="password" id="password" name="password" class="form-control form-control-sm" data-validation="required strongPassword min max" data-min="8" data-max="25">
            <div class="error" id="passwordError"></div>

        </div>
        <div class="mb-3 position-relative">
            <label for="confirm_password" class="form-label">Confirm Password*</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-sm" data-validation="required confirmPassword" data-password-id="password">
            <div class="error" id="confirmPasswordError"></div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-dark px-5">Continue</button>
            <p class="mt-2 text-muted">You will receive an activation code by email to validate your account creation.</p>
        </div>
    </form>
</div>

