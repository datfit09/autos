<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-9';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="blog-follow">
        <!-- 
            autos_post_title, 10
            autos_post_thumbnail, 20
            autos_entry_meta, 30
            autos_post_content, 40
            autos_post_author, 50
         -->
        <?php do_action( 'autos_post' ); ?>
        <a href="#" class="link-follow">
            <span class="fa fa-link"></span>
            http://example.com/tincidunt-lacus-elementum-massa/2956
        </a>
    </div>
</article>