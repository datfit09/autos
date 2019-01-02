<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>

<article id="post- <?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <?php
    /**
    *autos_post_thumbnail', 10
    *autos_post_title', 20
    *autos_entry_meta', 30
    *autos_post_content', 40
    *autos_excape', 50
    *autos_read_more', 60
    *autos_post_author', 70
    *autos_entry_tag', 80
    */
    ?>

    <?php
        if ( is_singular( 'post' ) ) {
            do_action( 'autos_post_single' );
        } else {
            do_action( 'autos_post' );
        }
    ?>
</article>