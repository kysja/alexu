<?php
    include '../inc/header.php';

    $projects = json_decode(file_get_contents('../data/projects_ru.json'));
?>


        <div class="row mb-5">
            <div class="col-md-3 text-center">
                <?php include '../inc/sidebar.php'; ?>
            </div>
            
            <div class="col-md-9">

                <div class="mt-5 mb-2">
                    <a href="/">Main Page</a> &rarr; Websites for Russian Companies
                </div>
                
                <section>
                    <h2>Websites for Russian Companies</h2>
                    <p>I have developed over a hundred websites for Russian companies, including small and medium-sized businesses. </p>
                    <p>The backend of these websites is written in PHP and MySQL, and I developed my own framework to use. Each site has its own admin page, allowing clients to easily update their websites on their own. </p>
                    <p>The HTML code is optimized for search engines, ensuring that the websites are easily discoverable through search.</p>
                    <p>Some examples of my work are provided below.</p>

                </section>

                <section>
                
                <div class="row g-4">
                    <?php foreach ($projects as $project) : ?>
                        
                        <div class="col-lg-6">
                            <div class="card text-center rounded-0">
                                <img src="/resources/images/portfolio_ru/<?= $project->img ?>" class="" alt="<?= $project->title ?>">
                                <div class="card-body">
                                    <div class="bg-body-secondary fs-5 py-2 px-1">
                                        <?= $project->title ?>
                                    </div>
                                    <div class="my-2">
                                        <a class="text-decoration-none" href="<?= $project->link ?>" target="_blank">
                                            <?= $project->link_display ?> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                </section>



            </div>      
        </div>
<?php
    include_once "../inc/footer.php";
?>