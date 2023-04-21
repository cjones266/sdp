<?php
session_start();

include "header.php";

?>

<!-- Log In adapted from: https://www.youtube.com/watch?v=BaEm2Qv14oU-->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <section class ="index-login">
                <div class="wrapper">
                    <div class="index-login-signup form-block">
                        <h4>SIGN UP</h4>
                        <p>Don't have an account yet? Sign up here!</p>
                        <form action="includes/signup.inc.php" method="post">
                            <input type="text" name="uid" class="form-control mb-3" placeholder="Username">
                            <input type="password" name="pwd" class="form-control mb-3" placeholder="Password">
                            <input type="password" name="pwdRepeat" class="form-control mb-3" placeholder="Repeat Password">
                            <input type="text" name="email" class="form-control mb-3" placeholder="E-mail">
                            <button type="submit" name="submit">SIGN UP</button>
                        </form>
                    </div>
                    <div class="index-login-login form-block">
                        <h4>LOGIN</h4>
                        <p>Already have an account? Log in here!</p>
                        <form action="includes/login.inc.php" method="post">
                            <input type="text" name="uid" class="form-control mb-3" placeholder="Username">
                            <input type="password" name="pwd" class="form-control mb-3" placeholder="Password">
                            <button type="submit" name="submit">LOGIN</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-9 main-content">
            <main class="container">
                <section class="index-login">
                    <img src="static/IMG_4633.jpg" alt="Image Description">
                </section>
            </main>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</div>