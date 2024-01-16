<?php
ob_start();
?>
<section id="hero" class="position-relative py-4" style="background: url('../background.jpg') no-repeat; background-size: cover;">
<div class="container py-5 mt-5">
    <div class="row align-items-center py-5 mt-5">
        <div class=" col-md-5 offset-md-1">
            <form class="hero-form p-5" method="post" action="index.php?action=login">
                <div class="mb-4">
                    <label  for="exampleInputEmail1" class="form-label mb-0">Email</label>
                    <input name ="email" type="email" class="form-control border-0" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label mb-0">Password</label>
                    <input name ="passwrd" type="passwrd" class="form-control border-0" id="exampleInputEmail2">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg mb-3">Login</button>
                    <a href="reg.php" class="btn btn-primary btn-lg">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("form").submit(function (event) {
            var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

            var email = $("#exampleInputEmail1").val();
            var password = $("#exampleInputEmail2").val();

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address");
                event.preventDefault();
            }

            if (!passwordRegex.test(password)) {
                alert("Password must be at least 8 characters long and include at least one lowercase letter, one uppercase letter, and one digit");
                event.preventDefault();
            }
        });
    });
</script>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>