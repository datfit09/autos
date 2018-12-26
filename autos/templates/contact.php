<?php 
    /*
    Template name: Contact
    */
?>

<?php get_header(); ?>

<div class="content">
    <div id="main-content">
        <div class="contact-info">
            <h4>Địa chỉ liên hệ</h4>
            <p>Yên Nghĩa, Hà Đông, Hà Nội</p>
            <p>0946880328</p>
        </div>
        <div class="contact-form">
            <?php echo do_shortcode( '[contact-form-7 id="42" title="Contact form 1"]' ); ?>
        </div>
    </div>

    <div id="sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
