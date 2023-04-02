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

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome6.all.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">
    
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    
    <title>Alex Ulogov - Full Stack Web Developer</title>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N165LBJ1YZ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-N165LBJ1YZ');
    </script>


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
