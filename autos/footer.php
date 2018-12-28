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

    <div class="ft-end" style="<?php footer_end_style(); ?>">
        <div class="container">
            <div class="ft-copyright">
                <div class="copyright">
                    <?php echo wp_kses_post( get_option( 'footer_left', 'Copyright' ) ); ?>
                </div>
                <div class="FAQ">
                    <?php echo wp_kses_post( get_option( 'footer_right', 'FAQ' ) ); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="menu-overlay"></div>

<div class="modal">
    <div class="modal-view">
        <div class="modal-header">
            <div class="modal-title">Search Page</div>
            <button class="modal-close">x</button>
        </div>
        <div class="modal-content">
            <?php get_search_form(); ?>
        </div>
        <div class="modal-action">
            <button class="btn modal-close">Close</button>
            <button class="btn modal-close modal-save">Search</button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>    
</body>
</html>