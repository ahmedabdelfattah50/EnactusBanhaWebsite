    <!-- ============== Start footer =============== -->
    <?php if(!isset($pageFooter)){?>
    <footer> 
        <div class="container">
            <div class="footerSections d-flex">
                <div class="footerSocialMedia  col-sm-6 col-lg-4">
                    <a href="index.php">
                        <img src="images/encatus_logo.png" alt="Encatus Logo">
                    </a>
                    <div class="contactMediaSec d-flex flex-column justify-content-end">
                        <p>Follow Us On Social Media</p>
                        <div class="listOfIcons d-flex justify-content-between col-4">
                            <a href="https://www.facebook.com/EnactusBanhaUniversity" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" target="_blank"> 
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footerContact col-sm-6 col-lg-4">
                    <h2>Contact</h2>
                    <div class="listOfLinks d-flex flex-column">
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                    </div>
                </div>
                <div class="footerContact col-sm-6 col-lg-4">
                    <h2>Workshops</h2>
                    <div class="listOfLinks d-flex flex-column">
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                        <a href="#">Link</a>
                    </div>
                </div>
            </div>
            <div class="footerCopyRights text-center">
                <h3><span>&copy;</span> MADE BY <span><a href="#">ENACTUS BANHA IT TEAM <i class="fas fa-laptop"></i></a></span></h3>
            </div>
        </div>
    </footer>
    <?php } ?>
    <!-- ============== End footer =============== -->
    <!-- ============== JavaScripts =============== -->
    <script src="<?php echo $jsPath?>jquery_3.6.0.min.js"></script>
    <script src="<?php echo $jsPath?>propper.js"></script>
    <script src="<?php echo $jsPath?>bootstrap_ltr_4.5.3.bundle.min.js"></script>
    <script src="<?php echo $jsPath?>slick.min.js"></script>
    <script src="<?php echo $jsPath?>fancyBox.min.js"></script>
    <script src="<?php echo $jsPath?>mixitup.min.js"></script>
    <script src="<?php echo $jsPath?>basics.js"></script>
    <script src="<?php echo $jsPath?>main.js"></script>
</body>
</html>