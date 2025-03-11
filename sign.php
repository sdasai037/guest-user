  
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
</head>

<body>
    <?php
    include_once("before-loginheader.php");
    ?>
    <div class="containerr d-flex flex-wrap justify-content-between">

        <div class="login-box col-12 col-md-6 mb-4">
            <h2>Welcome Back</h2>
            <p class="text">Sign in with your email address and your password.</p>
            <p class="required">Required fields*</p>
            <form action="login.php" method="post" id="login-form">
                <div class="mb-3">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password*</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <a href="forget passsword.php" class="forget_text">Forgot your password?</a>
                <div class="text1 mt-3">Or use a one-time login link to sign in.</div>
                <button type="submit" class="btn btn-secondary mt-3 ">Sign In</button>
                <!-- <button class="btn btn-outline-secondary order-btn">Order</button> -->
            </form>
            <p class="mt-3">Don't have a MyLV account? <a href="login.php">Create an Account</a></p>
        </div>

        <div class="info-box col-12 col-md-5">
            <h7 class="tital">WHAT YOU WILL FIND IN YOUR MYLV ACCOUNT</h7>
            <ul class="mt-4">
                <li class="itam"><span>★</span> Track your orders, repairs, and access your invoices</li>
                <li class="itam"><span>★</span> Manage your personal information</li>
                <li class="itam"><span>★</span> Receive newsletters from Louis Vuitton</li>
                <li class="itam"><span>★</span> Create, view, and share your wishlist</li>
            </ul>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#login-form").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        
                    },
                    password: {
                        required: true
                        
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please enter your password."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.addClass("text-danger");
                    error.insertAfter(element);
                },
                submitHandler: function(form) {
                    alert("Form submitted successfully!");
                    form.submit();
                }
            });
        });
    </script>
