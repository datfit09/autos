<?php
$class = '';
if ( ! is_singular( 'post' ) ) {
    $class = 'col-md-6';
}
?>
<article id="post- <?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-header">
        <?php autos_thumbnail( 'large' ); ?>
        <?php autos_entry_header(); ?>
        <?php 
            $attachment = get_children( array( 'post_parent' => $post->ID ) );
            $attachment_number = count( $attachment );
            printf( __( 'This image post contains %1$s photo' , 'autos' ) , $attachment_number );
         ?>
    </div>
    
</article>