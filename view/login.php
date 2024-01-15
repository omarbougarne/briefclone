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
<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php';?>