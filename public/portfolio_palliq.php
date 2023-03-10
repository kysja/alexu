<?php
    include_once __DIR__ . '/../inc/header.php';

    $projects = json_decode(file_get_contents('../data/projects_ru.json'));
?>

        <div class="row mb-5">
            <div class="col-md-3 text-center">
                <?php include_once __DIR__ . '/../inc/sidebar.php'; ?>
            </div>
            
            <div class="col-md-9">

                <div class="mt-5 mb-2">
                    <a href="/">Main Page</a> &rarr; Websites for pallet liquidation company in Florida
                </div>
                
                <section>
                    <h2>Website for pallet liquidation company in Florida</h2>
                    
                    <p>The goal of the website was to provide a platform for a pallet liquidation company to sell its merchandise to customers online. There are three types of selling options available on the website: auction, buy now, and warehouse sale. Each of these options has its own separate functionality.</p>
                    <p>The website was developed using the following technologies:</p>
                    <ul>
                        <li>Backend: Python, Flask, MySQL, SQLAlchemy</li>
                        <li>Frontend: HTML, CSS, Bootstrap, JavaScript, jQuery, AJAX, JSON, Jinja2, WebSockets</li>
                    </ul>
                    <p>Below are the screenshots of the demo version of the website, which has been filled with dummy data:</p>

                    <div class="my-3 border"><img src="/images/portfolio_palliq/01.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/02.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/03.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/04.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/05.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/06.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/07.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/08.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/09.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/10.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/11.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_01.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_02.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_03.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_04.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_05.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_06.png" class="img-fluid"></div>
                    <div class="my-3 border"><img src="/images/portfolio_palliq/a_07.png" class="img-fluid"></div>

                </section>

            </div>      
        </div>
<?php
    include_once __DIR__ . '/../inc/footer.php';
?>