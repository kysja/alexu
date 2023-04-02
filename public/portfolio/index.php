<?php
require __DIR__ . '/../../models/Portfolio.php';
$portfolio = new Portfolio();

include_once __DIR__ . '/../../inc/header.php';   
?>

<div class="row mb-5">
    <div class="col-md-3 text-center">
        <?php include_once __DIR__ . '/../../inc/sidebar.php'; ?>
    </div>
    
    <div class="col-md-9">

        <div class="mt-5 mb-2">
            <a href="/">Main Page</a> &rarr; Portfolio
        </div>

        <section>
            <h1>Portfolio</h1>

            <?php foreach ($portfolio->get() as $project) : ?>
                <div class="row my-5 ">
                    <div class="col-xxl-5 text-center">
                        <img class="border rounded-2" src="./images/<?= $project->image ?>" alt="<?= $project->title ?>">
                    </div>
                    <div class="col-xxl-7">
                        <h2 class="k5_prtf"><?= $project->title ?></h2>
                        <div class="my-3">
                            <?= ($project->link ?? false) ?  '<a href="'.$project->link.'" class="me-3 fw-bold text-decoration-none" target="_blank">'.parse_url($project->link, PHP_URL_HOST).'</a>' : '' ?>
                            <?= ($project->github ?? false) ?  '<i class="fa-brands fa-github"></i> <a href="https://github.com/kysja/'.$project->github.'" class="me-3 text-black" target="_blank">GitHub</a>' : '' ?>
                        </div>
                        <?php if ($project->stack ?? false) : ?>
                            <div class="my-3 k5_font_inconsolata">
                                <?php foreach ($project->stack as $tech) : ?>
                                    <!-- <span class="badge bg-info me-2 mb-2 text-black"><?= $tech ?></span> -->
                                    <div class="d-inline-block bg-light rounded-2 border fw-bold px-2 py-1 me-1 mb-1"><?= $tech ?></div>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        <div class="my-3"><?= $project->description ?></div>
                        <?php if ($project->page ?? false) : ?>
                            <div class="my-3"><a href="/portfolio/<?= $project->page ?>.php" class="fw-bold text-decoration-none">Read More...</a></div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="border-bottom my-5"></div>


            <?php endforeach ?>
        
        </section>

    </div>
</div>

<?php include_once __DIR__ . '/../../inc/footer.php'; ?>