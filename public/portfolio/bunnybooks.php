<?php 
require_once __DIR__ . '/../../models/helpers.php';
include_once base_path('inc/header.php'); 
?>

<div class="row mb-5">
    <div class="col-md-3 text-center">
        <?php include_once base_path('inc/sidebar.php'); ?>
    </div>
    
    <div class="col-md-9">

        <div class="mt-5 mb-2">
            <a href="/">Main Page</a> &rarr; <a href="/portfolio/">Portfolio</a> &rarr; Income Statement Generator
        </div>
        
        <section>
            <h2>Income Statement Generator</h2>
            
            <p>A single-page application (SPA) that allows you to generate an income statement for your business.</p>

            <p>The application is built using Vue3 (Composition API, Pinia), PHP, MySQL, and Bootstrap.</p>

            <div class="my-5">
                <p><b>Categories Page:</b> This page allows you to enter all the categories of Income, Expenses, and Cost of sale that you use in your business.</p>
                <div class="my-3 border"><img src="./images/bunnybooks/01.png" class="img-fluid"></div>
            </div>

            <div class="my-5">
                <p><b>Transactions Page:</b> This page is where you enter your transaction details—date, description, amount, and category (matching with the categories in your "Categories" page).</p>
                <div class="my-3 border"><img src="./images/bunnybooks/02.png" class="img-fluid"></div>
            </div>

            <div class="my-5">
                <p><b>Income Statement Page:</b> This page is where you see your income statement. It is generated automatically based on the transactions you enter in the "Transactions" page.</p>
                <div class="my-3 border"><img src="./images/bunnybooks/03.png" class="img-fluid"></div>
            </div>
        
        </section>

    </div>      
</div>

<?php include_once base_path('inc/footer.php'); ?>