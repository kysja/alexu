<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Open+Sans:wght@400;500&family=Rubik:wght@600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/fontawesome6/css/all.min.css">

    <link rel="stylesheet" href="/resources/css/main.css">
    
    <script src="/resources/js/bootstrap.bundle.min.js"></script>
    
    <title>Alex U - Full Stack Web Developer</title>
</head>
<body>
    
    <div class="container border bg-white shadow">

        <!-- flash message -->
        <?php if (isset($flash)) : ?>
            <div class="my-3 alert alert-<?= $flash['type'] ?> alert-dismissible fade show text-center" role="alert">
                <strong><?= $flash['message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(() => {
                    document.querySelector('.alert').classList.remove('show');
                    setTimeout(() => {
                        document.querySelector('.alert').classList.add('d-none');
                    }, 500);
                }, 4000);
            </script>
        <?php endif; ?>
        <!-- end of flash message -->