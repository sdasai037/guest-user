<?php include_once("After-login-header.php"); ?>
<!-- <img src="images/my_lv_welcome_page_desktop.webp" class="img-fluid"> -->
<div class="text-center mt-4">
    <h3>SHIHANS PATEL</h3>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2>My Profile</h2>
                <hr>
                <p>Title:- Mr.</p>
                <p>Country:- India</p>
                <p>E-mail: shihanspatel07@gmail.com</p>
                <p>Date Of Birth:- 03-04-2008</p>
                <h5>Contact Preferences</h5>
                <div class="d-flex gap-3">
                    <a href="#"><img src="images/envelope-paper.svg" class="icon" title="Secondary Email"></a>
                    <a href="#"> <img src="images/phone.svg" class="icon" title="Phone"></a>
                    <a href="#"><img src="images/chat-left-text.svg" class="icon" title="Chat"></a>
                    <a href="#"><img src="images/envelope-heart.svg" class="icon" title="Primary Email"></a>
                </div>
                <a href="edit-profile.php"><button class="btn btn-outline-dark mt-3 btn-block">Edit My Profile</button></a>


            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card p-4">
                <h2>My Orders</h2>
                <hr>
                <p class="text-center">There are no current orders</p>
                <button type="button" class="btn  mx-auto" style="border: 1px solid black;"><a href="after-login-man_cloth.php" style="text-decoration: none; color:black;" class="a">Start Shopping</a></button>
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-4">
    <button type="button" class="btn btn-outline-danger" style="border-radius:50px"><a href="login.php" style="text-decoration: none; color:black;">Logout</a></button>
</div>
<br>
<?php include_once("footer.php"); ?>