<?php
/**@var \App\Data\Note\NoteDTO[] $data*/

$numberOfRows = $_SESSION['row_counts'];
$colsPerPage = 4;
$pages = ceil($numberOfRows / $colsPerPage);
$currentPage = 1;
isset($_GET['page']) ? $currentPage = $_GET['page'] : null;
?>


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
    <title>Profile</title>
</head>
<body id="<?= $currentPage?>">
<div class="container border-bottom">
    <header class="d-flex justify-content-between">
        <div>
            <h6 class="me-3">Hello, <?= $_SESSION['first_name'];?></h6>
            <!--            <a href="" class="navbar-brand ms-4 fs-3">MyNote</a>-->
        </div>
        <div class="me-4 d-flex align-items-center">

            <a class="btn btn-primary active rounded-pill" href="profile.php">Back to profile</a>
            <a class="btn text-danger" href="logout.php">Log out</a>
        </div>
    </header>
</div>

<section class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-2 align-items-center">
    <?php foreach ($data as $note):?>
        <div class="col">
            <div class="note mx-2">
                <div class="title border-bottom mb-2"><?= $note->getTitle();?></div>
                <div class="content">
                    <?=$note->getContent();?>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="viewNote.php?noteid=<?= $note->getNoteId()?>" class="btn text-primary">View</a>
                    </div>
                    <div class="col">
                        <a href="deleteNote.php?deleteid=<?= $note->getNoteId()?>" class="btn text-primary">Delete</a>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach;?>
    </div>
    <div class="row mt-3 justify-content-center">
        <?php if($pages > 1): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--   previous button  -->
                    <?php if($currentPage >= $pages):?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage - 1?>">Previous</a></li>
                    <?php else:?>
                        <li class="page-item"><a class="page-link" href="">Previous</a></li>
                    <?php endif;?>

                    <?php for($i = 1; $i <= $pages; $i++):?>
                        <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                    <?php endfor;?>

                    <!--   next buttton  -->
                    <?php if($currentPage < $pages):?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage + 1?>">Next</a></li>
                    <?php else:?>
                        <li class="page-item"><a class="page-link" href="">Next</a></li>
                    <?php endif;?>

                </ul>
            </nav>
        <?php endif; ?>
    </div>
</section>

<script src="assets/js/app.js"></script>
</body>
</html>

<!--back to <a href="profile.php">profile</a>-->

