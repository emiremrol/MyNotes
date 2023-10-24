<?php /**@var \App\Data\ErrorDTO\ErrorDTO $error*/?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />-->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container border-bottom">
    <header class="d-flex justify-content-between">
        <div>
            <a href="" class="navbar-brand ms-4 fs-3">MyNote</a>
        </div>

        <div class="me-4">
            <a class="btn btn-outline-primary" href="login.php">Login</a>
            <a class="btn btn-primary" href="register.php">Sign-up</a>
        </div>
    </header>
</div>

<section class="container d-flex justify-content-center align-items-center">
    <div class="img-box me-4">
        <img src="assets/images/signup.jpg" alt="">
    </div>
    <div class="register-form">
        <h2 class="mt-2">Sign up</h2>

        <form action="" method="post" class="w-100 p-2" name="register_form">
            <div class="input-group mt-3">
                <input type="text" name="first_name" class="form-control rounded me-2" placeholder="First Name" required>
                <input type="text" name="last_name" class="form-control rounded" placeholder="Last Name" required>
            </div>
            <?php if($error):?>
                <div class="mb-3">
                    <p class='text-danger'><?=$error->getMessage()?></p>
                </div>
            <?php endif;?>
            <div class="mt-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mt-3">
                <input type="text" name="email" class="form-control rounded" placeholder="Email" required>
            </div>

            <div class="input-group mt-3">
                <input type="password" name="password" class="form-control border border-end-0" placeholder="Password" required>
                <button class="input-group-text visiblePass" style="cursor: pointer">
                    <i class="bi bi-eye-fill"></i>
                </button>
            </div>

            <div class="input-group mt-3">
                <input type="password" name="confirm_password" class="form-control border border-end-0"
                       placeholder="Confirm password" required>
                <button class="input-group-text visiblePass" style="cursor: pointer">
                    <i class="bi bi-eye-fill"></i>
                </button>
            </div>


            <div class="mt-3">
                <input type="submit" name="register" class="btn btn-primary w-100" id="register" value="Sign up">
            </div>
        </form>
    </div>
</section>

<script src="assets/js/app.js"></script>
</body>
</html>


<?php /*if($error):?>
    <div class="mb-3">
        <p class='text-danger'><?=$error->getMessage()?></p>
    </div>
<?php endif;?>

 */