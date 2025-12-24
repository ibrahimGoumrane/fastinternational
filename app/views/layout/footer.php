    </main>
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section footer-brand">
                    <div class="footer-logo">
                        <span class="logo-icon"><img src="public/images/logo.jpg" alt="FAST International Logo"></span>
                        <span class="logo-text">FAST<span class="logo-accent">International</span></span>
                    </div>
                    <p class="footer-desc"><?= $t['footer_about'] ?></p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4><?= $t['quick_links'] ?></h4>
                    <ul class="footer-links">
                        <li><a href="#home"><i class="fas fa-chevron-right"></i> <?= $t['home'] ?></a></li>
                        <li><a href="#about"><i class="fas fa-chevron-right"></i> <?= $t['about'] ?></a></li>
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['services'] ?></a></li>
                        <li><a href="#expertise"><i class="fas fa-chevron-right"></i> <?= $t['expertise'] ?></a></li>
                        <li><a href="#missions"><i class="fas fa-chevron-right"></i> <?= $t['missions'] ?></a></li>
                        <li><a href="#contact"><i class="fas fa-chevron-right"></i> <?= $t['contact'] ?></a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4><?= $t['services'] ?></h4>
                    <ul class="footer-links">
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['databases'] ?></a></li>
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['methods'] ?></a></li>
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['internet'] ?></a></li>
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['operating_systems'] ?></a></li>
                        <li><a href="#services"><i class="fas fa-chevron-right"></i> <?= $t['programming'] ?></a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4><?= $t['contact_info_footer'] ?></h4>
                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span><a href="mailto:info@fastinternational.com">info@fastinternational.com</a></span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-globe"></i>
                            <span><a href="http://www.fastinternational.com">www.fastinternational.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> FAST International. <?= $t['all_rights_reserved'] ?></p>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <a href="#home" class="back-to-top" id="backToTop" aria-label="<?= $t['back_to_top'] ?>">
        <i class="fas fa-chevron-up"></i>
    </a>
    
    <!-- Google reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
    <script src="public/js/script.js"></script>
</body>
</html>
