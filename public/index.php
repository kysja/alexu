<?php
require __DIR__ . '/../models/Data.php';
require __DIR__ . '/../models/Csrf.php';
$data = new Data();
$csrf = new Csrf();

include_once __DIR__ . '/../inc/sendform.php';
include_once __DIR__ . '/../inc/header.php';   
?>

<div class="row mb-5">
    <div class="col-md-3 text-center">
        <?php include_once __DIR__ . '/../inc/sidebar.php'; ?>
    </div>
    
    <div class="col-md-9">
        
        <section>
            <h2>About Me</h2>
            <p>I am a full stack web developer with more than fifteen years of hands-on experience. I have a strong background in web development and have worked on a wide range of projects from simple websites to complex web applications.</p>
            <p>I am a self-motivated, hard-working, and goal-oriented person. I am able to work independently and as part of a team.</p>

        </section>

        <section>
            <h2>Skills</h2>
            <div class="k5_skills">
                <?php foreach ($data->get('skills') as $skill) : ?>
                    <div class="border-bottom py-2">
                        <i class="fa-regular fa-square-check"></i>
                        <span class="text-black-50"><?= $skill->title ?></span> <?= implode(", ", $skill->list); ?>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

        <section>
            <h2>Experience</h2>                    
            <?php foreach ($data->get('experience') as $exper) : ?>
                <div class="mt-4">
                <div class="my-1"><b><?= $exper->start ?> &ndash; <?= $exper->end ?></b> &middot; <?= $exper->company ?></div>
                <div class="mb-2 fst-italic"><?= $exper->title ?></div>
                <div>
                    <ul>
                        <?php foreach ($exper->list as $item) : ?>
                            <li><?= $item ?></li>
                        <?php endforeach ?>

                    </ul>
                </div>
            </div>
            <?php endforeach ?>
        </section>

        <section>
            <h2>Portfolio</h2>
            <ul class="mt-4">
                <?php foreach ($data->get('portfolio') as $por) : ?>
                    <li class="my-3">
                        <?php if ($por->link->type == "url") : ?>
                            <a href="<?= $por->link->url ?>" target="<?= $por->link->target ?? '' ?>">
                        <?php elseif ($por->link->type == "modal") : ?>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?= $por->link->id ?>">
                        <?php endif ?>
                            <?= $por->title ?></a> &middot; <?= implode(", ", $por->stack) ?>
                        </a>
                    </li>
                <?php endforeach ?>
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
                <?= $csrf->csrfField(); ?>
                
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

    include_once __DIR__ . '/../inc/modal.php';
    include_once __DIR__ . '/../inc/footer.php';
?>