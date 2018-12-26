<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php
    // You can start editing here -- including this comment!
    if ( have_comments() ) : ?>
        <h6 class="comment-total-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                /* translators: %s: post title */
                printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'autos' ), get_the_title() );
            } else {
                printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        ' COMMENTS (%1$s) ',
                        ' COMMENTS (%1$s) ',
                        $comments_number,
                        'comments title',
                        'autos'
                    ),
                    number_format_i18n( $comments_number ),
                    get_the_title()
                );
            }
            ?>
        </h6>

        <?php
            wp_list_comments(
                array(
                    'callback'    => 'autos_comment_list',
                    'short_ping'  => true,
                ) 
            );
        ?>

        <?php the_comments_pagination( array(
            'prev_text' => 'Prev',
            'next_text' =>'Next',
        ) );

    endif; // Check for have_comments().

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'autos' ); ?></p>
    <?php
    endif;

    $author = '<p class="comment-form-author">' . '<input id="author" placeholder="Name *" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>';
    $email = '<p class="comment-form-email">' . '<input id="email" placeholder="Email address *" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '"' . $aria_req . ' /></p>';
    $url = '<p class="comment-form-url">' .
                 '<input id="url" name="url" placeholder="http://your-site-name.com" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></p>';

    $args = array(
        'fields' => apply_filters(
            'comment_form_default_fields',
            array(
                'author' => $author,
                'email'  => $email,
                'url'    => $url,
            )
        ),
        
        'comment_field' => '<p class="comment-form-comment">' .
            '<textarea id="comment" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea>' .
            '</p>',
        'comment_notes_after' => '',
        'title_reply' => '<div class="crunchify-text"> <h5>Leave Your Comment</h5></div>'
    );

    comment_form( $args );
    ?>
</div>