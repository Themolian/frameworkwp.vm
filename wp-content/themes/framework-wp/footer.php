<footer class="footer">
            <div class="inner">
                <div class="logo">
                    <a href="/">Leospa</a>
                </div>
                <div class="footer-nav">
                    <nav class="menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                    </nav>
                </div>
                <div class="footer-socials">
                    <a href="" class="social">Follow us on Facebook!</a>
                    <a href="" class="social">Follow us on Twitter!</a>
                    <a href="" class="social">Follow us on Instagram!</a>
                    <a href="" class="social">Follow us on Vimeo!</a>
                </div>
                <div class="copyright">
                    <p>&copy; COPYRIGHT <?php date("Y"); ?> <a href="www.themeies.com">THEMEIES.COM.</a> ALL RIGHTS RESERVED</p>
                </div>
            </div>
        </footer>
    </div><!-- /site-wrap -->
    <?php wp_footer(); ?>
</body>
</html>