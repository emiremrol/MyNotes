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
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
</head>
<body>
<div class="container border-bottom">
    <header class="d-flex justify-content-between ">
        <div>
            <a href="index.php" class="navbar-brand ms-4 fs-3">MyNote</a>
        </div>

        <div class="me-4">
            <a class="btn btn-primary" href="login.php">Login</a>
            <a class="btn btn-outline-primary" href="register.php">Sign-up</a>
        </div>
    </header>
</div>

<section class="container d-flex justify-content-center align-items-center">
    <div class="login-form me-4">
        <h2 class="my-3">Sign in</h2>
        <form action="" method="post" class="w-100 p-2">
            <div class="input-group mb-3 position-relative">
                <input type="text" name="username" class="form-control rounded"
                       value="<?= isset($_POST['username']) ? $_POST['username']:null;?>" placeholder="Username" required>
                <span class="position-absolute top-50 end-0 translate-middle pe-1">
                    <i class="fa-solid fa-user"></i>
                </span>
            </div>
            <div class="input-group mb-3 position-relative">
                <input type="password" name="password" class="form-control rounded" placeholder="Password" required>
                <span class="position-absolute top-50 end-0 translate-middle pe-1">
                    <i class="fa-solid fa-lock"></i>
                </span>
            </div>
            <?php if($error):?>
                <div class="mb-3">
                    <p class='text-danger'><?=$error->getMessage()?></p>
                </div>
            <?php endif;?>
            <div class="mb-3">
                <input type="submit" name="login" class="btn btn-primary w-100" value="Sign in">
            </div>
        </form>
        <div class="mb-3">
            <p class="fs-6">Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>
    <div class="img-box">
        <img src="assets/images/signin.jpg" alt="">
    </div>
</section>



</body>
</html>