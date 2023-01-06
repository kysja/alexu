<?php
    include 'sendform.php';
    
    include './inc/header.php';
?>

        
        

        <div class="row mb-5">
            <div class="col-md-3 text-center">
                <?php include './inc/sidebar.php'; ?>
            </div>
            
            <div class="col-md-9">
                
                <section>
                    <h2>About Me</h2>
                    <p>I am a full stack web developer with more than fifteen years of hands-on experience.
                        I have a strong background in web development and have worked on a wide range of projects from simple websites to complex web applications.</p>
                    <p>I am a self-motivated, hard-working, and goal-oriented person. I am able to work independently and as part of a team.</p>

                </section>

                <section>
                    <h2>Skills</h2>
                    <div class="k5_skills">
                        <div class="border-bottom py-2">
                            <i class="fa-regular fa-square-check"></i>
                            <span class="text-black-50">Main stack:</span> PHP, MySQL, HTML, CSS, Javascript
                        </div>
                        <div class="border-bottom py-2">
                            <i class="fa-regular fa-square-check"></i>
                            <span class="text-black-50">Frameworks:</span> Laravel (PHP), Flask (Python), jQuery, Bootstrap
                        </div>
                        <div class="border-bottom py-2">
                            <i class="fa-regular fa-square-check"></i>
                            <span class="text-black-50">Other:</span> SEO, MVC, JSON, Rest API, Git
                        </div>
                        <div class="border-bottom py-2">
                            <i class="fa-regular fa-square-check"></i>
                            <span class="text-black-50">Deploy:</span> Digital Ocean, Linode, Ubuntu, Nginx, Apache
                        </div>
                    </div>
                </section>

                <section>
                    <h2>Experience</h2>
                    
                    <div class="mt-4">
                        <div class="my-1 fw-bold">2003 &ndash; 2022 &middot; Freelance</div>
                        <div class="mb-3">Full Stack Web Developer</div>
                        <div>
                            Worked with clients to understand their business needs and developed custom web solutions to meet those needs.<br>
                            Implemented user feedback to improve the usability of the web products.<br>
                            Maintained and updated existing websites.<br>
                            I have worked with numerous companies over the years.<br>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="my-1 fw-bold">2007 &ndash; 2016 &middot; Online Plumbing Store Mirsanteh</div>
                        <div class="mb-3">Full Stack Web Developer &middot; Part-Time</div>
                        <div>
                            In 2007, I joined a small brick and mortar plumbing store that had only three employees. <br>
                            We were able to grow the business and become one of the top three Russian online plumbing stores within four years. <br>
                            I played a crucial role in this growth by building the online store from scratch, without relying on any frameworks.
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="my-1 fw-bold">2003 &ndash; 2006 &middot; Online Toy Store Neopod</div>
                        <div class="mb-3">Full Stack Web Developer</div>
                        <div>
                            I have worked as a web developer in a small family business. I was responsible for our company website and played a significant role in its growth. As a result of my efforts, the business was successfully sold in 2006.
                        </div>
                    </div>

                </section>

                <section>
                    <h2>Portfolio</h2>
                    <ul class="mt-4">
                        <li class="my-3"><a href="portfolio_palliq.php">Website for pallet liquidation company in Florida</a> &middot; Python, Flask, MySQL, Bootstrap</li>
                        <li class="my-3"><a href="#" data-bs-toggle="modal" data-bs-target="#bitfifoModal">Tool for the accountant department of a crypto company</a> &middot; Python, Flask, SQLite</li>
                        <li class="my-3"><a href="https://github.com/kysja/k5calc#k5calc---simple-windows-keyboard-calculator" target="_blank">K5Calc - Simple Windows Keyboard Calculator. Github</a> &middot; Python, Tkinter</li>
                        <li class="my-3"><a href="portfolio_ru.php">Over 100 websites for Russian companies and organizations</a> &middot; PHP, MySQL</li>

                    </ul>
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
                    <div class="col-md-7">
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
                    <div class="col-md-5">
                        <section>
                            <h2>Interests</h2>
                            <div class="w-75">
                                <div class="py-2"><i class="me-2 fa-solid fa-futbol"></i>Playing soccer</div>
                                <div class="py-2"><i class="me-2 fa-sharp fa-solid fa-hammer"></i>Woodworking</div>
                                <div class="py-2"><i class="me-2 fa-solid fa-chess"></i>Chess</div>
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
                                    <input type="text" class="form-control" id="flName" name="name" placeholder="" value="<?= $_SESSION['form']['name'] ?? "" ?>">
                                    <label for="flName">Your Name</label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="flEmail" name="email" placeholder="" value="<?= $_SESSION['form']['email'] ?? "" ?>">
                                    <label for="flEmail">Your Email</label>
                                    <div class="text-danger"><?= $error['email'] ?? "" ?></div>
                                </div>
                            </div>
                
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="message" id="flMessage" rows="5" style="height: 180px;"><?= $_SESSION['form']['message'] ?? "" ?></textarea>
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
<?php
    include_once "./inc/modal.php";
    include_once "./inc/footer.php";
?>