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
            <a href="/">Main Page</a> &rarr; <a href="/portfolio/">Portfolio</a> &rarr; Web-based Data Management System for a Company in the Construction Sector.
        </div>
        
        <section>
            <h2>Web-based Data Management System for a Company in the Construction Sector</h2>
            
            <p>The system has the ability to bring in data from numerous CSV files, clean the data, and eliminate any duplicates. It can also gather extra data by utilizing third-party API services.</p>

            <h3>Features</h3>
            <ul>
                <li>Import data from CSV and ZIP files. You can upload thousands of files simultaneously. The system will parse the data and save it to different tables in the database. It will also check for any duplicate entries.</li>
                <li>Once the data is imported, you can view it in the system and take advantage of the various sorting and filtering options available.</li>
                <li>The system can also gather extra information from third-party APIs.</li>
                <li>You can export all the data or a portion of it to a CSV file. This makes it easy to share your data with others or use it in other applications. </li>
            </ul>

            <div class="my-3 border"><img src="./images/dbac/01.png" class="img-fluid"></div>
            <div class="my-3 border"><img src="./images/dbac/02.png" class="img-fluid"></div>
        
        </section>

    </div>      
</div>

<?php include_once base_path('inc/footer.php'); ?>