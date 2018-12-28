<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>
<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <?php
        if ( is_singular( 'post' ) ) {
            do_action( 'autos_post_single' );
        } else {
            do_action( 'autos_post' );
        }
    ?>
</article>