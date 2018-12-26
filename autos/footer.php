<footer class="footer" style="<?php footer_style(); ?>">
    <div class="footer-widget">
        <div class="container">
            <?php
            if ( is_active_sidebar( 'footer-widget' ) ) {
                dynamic_sidebar( 'footer-widget' );
            }
            ?>
        </div>
    </div>

    <div class="ft-end">
        <div class="container">
            <div class="ft-copyright">
                <div class="copyright">
                    <?php echo wp_kses_post( get_option( 'footer_left' ) ); ?>
                </div>
                <div class="FAQ">
                    <?php echo wp_kses_post( get_option( 'footer_right' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>    
</body>
</html>