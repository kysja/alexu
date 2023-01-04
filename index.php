<?php
    include 'sendform.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/css/main.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    
    <script src="/resources/js/bootstrap.bundle.min.js"></script>
    <title>Alex U</title>

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
        

        <div class="row mb-5">
            <div class="col-md-3 text-center">
                <aside>
                    <div class="mt-5"><img class="img-fluid rounded rounded-2" src="/resources/images/me.jpg" alt="Alex"></div>
                    <div class="mt-2 fw-normal fs-4">Hello, I'm Alex</div>
                    <div class="mt-2 mb-4 fw-bold fs-5">Full Stack Web Developer</div>
                    
                    <div class="mt-5 text-start ps-4">
                        <div class="my-3">
                            <span class="material-symbols-rounded align-bottom">location_on</span>
                            Jacksonvile, Florida, US
                        </div>
                        <div class="my-3">
                            <span class="material-symbols-rounded align-bottom">language</span>
                            <a class="text-decoration-none text-black" href="https://alexu.dev">alexu.dev</a>
                        </div>
                        <div class="my-3">
                            <span class="material-symbols-rounded align-bottom">mail</span>
                            <a class="text-decoration-none text-black" href="mailto:alulogov@gmail.com">alulogov@gmail.com</a>
                        </div>
                        <div class="my-3">
                            <img src="/resources/images/linkedin-48.png" alt="Linkedin" width="24">
                            <a class="text-decoration-none text-black" href="https://www.linkedin.com/in/aulogov">Linkedin</a>
                        </div>
                    </div>

                </aside>
            </div>
            
            <div class="col-md-9">
                
                <section>
                    <h2>About Me</h2>
                    <p>I am a full stack web developer with more than fifteen years of hands-on experience. Focused and efficient learner with practical expertise. </p>
                </section>

                <section>
                    <h2>Skills</h2>
                    <div class="w-75">
                        <div class="border-bottom py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span><span class="text-black-50">Main stack:</span> PHP, MySQL, HTML, CSS, Javascript, jQuery, Bootstrap</div>
                        <div class="border-bottom py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span><span class="text-black-50">Frameworks:</span> Laravel (PHP), Flask (Python)</div>
                        <div class="border-bottom py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span><span class="text-black-50">Other:</span> SEO, MVC, JSON, Rest API, Git</div>
                        <div class="border-bottom py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span>Digital Ocean, Linode</div>
                    </div>
                </section>

                <section>
                    <h2>Experience</h2>
                    
                    <div class="mt-4">
                        <div class="my-1 fw-bold">2003 &ndash; 2022 &middot; Freelance</div>
                        <div class="mb-3">Full Stack Web Developer</div>
                        <div>
                            Backend (PHP, MySQL) and frontend (HTML, CSS, Javascript, jQuery, Bootstrap) development, website deployment, search engine optimization, and running advertising campaigns. Monthly technical maintenance. <br>
                            I have worked with numerous companies over the years. <br>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="my-1 fw-bold">2007 &ndash; 2016 &middot; Online Plumbing Store Mirsanteh</div>
                        <div class="mb-3">Full Stack Web Developer</div>
                        <div>
                            I joined a small brick and mortar plumbing store with only three employees.<br>
                            Within about five years, we became one of the top-3 Russian online plumbing stores.<br>
                            I built the online store from scratch, without using any frameworks.
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="my-1 fw-bold">2003 &ndash; 2006 &middot; Online Toy Store Neopod</div>
                        <div class="mb-3">Full Stack Web Developer</div>
                        <div>
                            I was a part of a small family business and was responsible for our website.<br>
                            The business grew and was successfully sold in 2006.
                        </div>
                    </div>

                </section>

                <section>
                    <h2>Portfolio</h2>
                    <div class="k5_portfolio mt-2 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                        <div class="col">
                            <!-- <a href="/portfolio/palliq.html" class="text-decoration-none text-dark"> -->
                                <div class="card">
                                        <img src="/resources/images/portfolio/thumb_palliq.png" alt="Pallet Liquidation" class="card-img-top">
                                    <div class="card-body">
                                    <p class="card-text">Website for pallet liquidation company in Florida</p>
                                    <div class="my2">
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Python</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Flask</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">MySQL</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Bootstrap</span>
                                    </div>
                                    </div>
                                </div>
                            <!-- </a> -->
                        </div>

                        <div class="col">
                            <!-- <a href="/portfolio/irimex.html" class="text-decoration-none text-dark"> -->
                                <div class="card">
                                    <img src="/resources/images/portfolio/thumb_irimex.png" alt="Engineering Company" class="card-img-top">
                                    <div class="card-body">
                                    <p class="card-text">Website with over 5 000 pages for a Russian technical equipment supplier</p>
                                    <div class="my2">
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">PHP</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">MySQL</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">jQuery</span>
                                    </div>
                                    </div>
                                </div>
                            <!-- </a> -->
                        </div>

                        <!-- <div class="col">
                            <a href="/portfolio/irimex.html" class="text-decoration-none text-dark">
                                <div class="card">
                                    <img src="/resources/images/portfolio/thumb_mirsanteh.png" alt="Online Plumbing Store" class="card-img-top">
                                    <div class="card-body">
                                    <p class="card-text">One of the top-3 Russian online plumbing stores in 2010-2014</p>
                                    <div class="my2">
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">PHP</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">MySQL</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Javascript</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">jQuery</span>
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </div> -->

                        <div class="col">
                            <!-- <a href="/portfolio/bitfifo.html" class="text-decoration-none text-dark"> -->
                                <div class="card">
                                    <img src="/resources/images/portfolio/thumb_bitfifo.png" alt="Tool for accountant department" class="card-img-top">
                                    <div class="card-body">
                                    <p class="card-text">Tool for accountant department of a crypto company</p>
                                    <div class="my2">
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Python</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">Flask</span>
                                        <span class="badge bg-secondary me-1 px-1 fw-normal">SQLite</span>
                                    </div>
                                    </div>
                                </div>
                            <!-- </a> -->
                        </div>

                    </div>
                </section>


                <section>
                    <h2>Education</h2>
                    <div class="row">
                        <div class="col-3">
                            <div class="fw-bold">1996 &ndash; 2001</div>
                            <div>Moscow, Russia</div>
                        </div>
                        <div class="col-9">
                            <div>State University of Management</div>
                            <div>Bachelor's degree, Financial Management</div>
                        </div>
                    </div>
                </section>

                <div class="row">
                    <div class="col-md-6">
                        <section> 
                            <h2>Languages</h2>
                            <ul class="list-group list-group-horizontal my-3">
                                <li class="list-group-item">English</li>
                                <li class="list-group-item w-75">
                                    <div class="progress">
                                        <div class="progress-bar w-75" role="progressbar" aria-label="English" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-group list-group-horizontal my-3">
                                <li class="list-group-item">Russian</li>
                                <li class="list-group-item w-75">
                                    <div class="progress">
                                        <div class="progress-bar w-100" role="progressbar" aria-label="English" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section>
                            <h2>Interests</h2>
                            <div class="w-75">
                                <div class="py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span>Playing soccer</div>
                                <div class="py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span>Woodworking</div>
                                <div class="py-2"><span class="material-symbols-rounded me-2 align-bottom">check</span>Chess</div>
                            </div>
                        </section>
                    </div>
                </div>



                <section>
                    <a name="contact"></a>
                    <h2>Contact Me</h2>
                    <form method="post" action="/">
                        <div class="row g-3">

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="flName" name="name" placeholder="" value="">
                                    <label for="flName">Your Name</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="flEmail" name="email" placeholder="" value="">
                                    <label for="flEmail">Your Email</label>
                                    <div class="text-danger"><?= $error['email'] ?? "" ?></div>
                                </div>
                            </div>
                
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="flMessage" rows="5" style="height: 180px;"></textarea>
                                    <label for="flMessage">Message</label>
                                    <div class="text-danger"><?= $error['message'] ?? "" ?></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>

                        </div>
                    </form>
                </section>


            </div>      
        </div>
    </div>
</body>
</html>