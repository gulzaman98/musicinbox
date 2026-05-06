<?php include "header.php"; ?>

<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb1.jpg); height: 350px;">
    <div class="brcumbContent text-center">
        <p>We value your opinion</p>
        <h2>User Feedback</h2>
    </div>
</section>

<section class="contact-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="contact-form-area">
                    <form action="feedback_logic.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Your E-mail" required>
                            </div>
                            <div class="col-12 mb-4">
                                <input type="text" name="contact" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12 mb-4">
                                <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary mt-30" type="submit" name="feedback">Send Feedback</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>