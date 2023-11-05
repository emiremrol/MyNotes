<?php /**@var \App\Data\Note\NoteDTO $data*/?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Note</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/summernote.css">

</head>
<body>

<div class="container border-bottom">
    <header class="d-flex justify-content-between">
        <div>
            <h6 class="me-3">Hello, <?= $_SESSION['first_name'];?></h6>
            <!--            <a href="" class="navbar-brand ms-4 fs-3">MyNote</a>-->
        </div>
        <div class="me-4 d-flex align-items-center">

            <a class="btn btn-primary active rounded-pill" href="allNotes.php?page=1">All Notes</a>
            <a class="btn text-danger" href="logout.php">Log out</a>
        </div>
    </header>
</div>
<section class="container p-3 d-flex justify-content-center">
    <form action="" class="form" method="POST">
        <div class="row mb-2">
            <div class="col">
                <input type="text" name="title" class="form-control" value="<?= $data->getTitle();?>">
            </div>
            <div class="col">
                <input type="submit" name="update" class="btn btn-primary" value="Save">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <textarea id="summernote" name="content"><?= $data->getContent();?></textarea>
            </div>
        </div>
        <br><br>
    </form>

</section>

<script src="assets/js/summernoteConfig.js"></script>

</body>
</html>