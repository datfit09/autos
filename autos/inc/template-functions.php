<?php// function tieu de contentif ( ! function_exists( 'autos_post_title' ) ) {    function autos_post_title() {        ?>        <h2 class="blog-post-title blog-single">            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>        </h2>        <?php    }}// function image content.if ( ! function_exists( 'autos_post_thumbnail' ) ) {    function autos_post_thumbnail() {        if ( ! is_singular( 'post' ) ) {            ?>                <a href="<?php the_permalink(); ?>" class="post-thumbnail-image">                    <?php the_post_thumbnail( array(370, 260) ); ?>                </a>            <?php        } else {            ?>                <a href="<?php the_permalink(); ?>" class="post-thumbnail-image">                    <?php the_post_thumbnail( 'large' ); ?>                </a>            <?php        }    }}// function content.if ( ! function_exists( 'autos_post_content' ) ) {    function autos_post_content() {        if ( is_singular( 'post' ) ) {        ?>            <div class="summary">                   <?php                 the_content();                $link_pages = array(                    'before'           => __( ' <p>Page: ' , 'autos' ),                    'after'            => '</p>;',                    'nextpagelink'     => __( 'Next page' , 'autos' ),                    'previouspagelink' => __( 'Previous page' , 'autos' )                );                wp_link_pages( $link_pages );                ?>            </div>        <?php        }    }}// function tag.if ( ! function_exists( 'autos_entry_tag' ) ) {  function autos_entry_tag() {        if ( is_singular( 'post' ) && has_tag() ) {            ?>            <div class="entry-tag">                <?php printf( __( '<span class="fa fa-tags tag"></span> Tags : %1$s', 'autos'), get_the_tag_list( '', ', ' ) ); ?>             </div>            <?php        }  }}// function post author.if ( ! function_exists( 'autos_post_author' ) ) {    function autos_post_author() {        if ( is_singular( 'post' ) ) {            get_template_part( 'author-bio' );        }    }}// function post meta : date, comment. if ( ! function_exists( 'autos_entry_meta' ) ) {    function autos_entry_meta() {        if ( 'link' == get_post_format() || 'quote' == get_post_format() ) {            return;        }        ?>        <ul class="blog-info blog">            <li class="clock"><?php                printf( __( '<span class="date_published"><img src="http://autos.io/wp-content/uploads/2018/12/clock.png" class="icon-clock"></span> %1$s' , 'autos' ),                    get_the_date() );            ?></li>            <li><?php                 if ( comments_open() ):                    echo '<span class="meta-reply"><img src="http://autos.io/wp-content/uploads/2018/12/comment.png" class="icon-comment"></span>';                        comments_popup_link(                            __( 'Leave a comment', 'autos' ),                            __( 'One comment', 'autos' ),                            __( '% comments', 'autos' ),                            __( 'Read all comments', 'autos' )                        );                    echo '</span>';                endif;            ?></li>        </ul>    <?php }}// function pagination.if ( ! function_exists( 'autos_pagination' ) ) {    function autos_pagination() {    ?>    <div class="pagination-button">        <?php            $args = array(                'prev_text'          => __( '<', 'autos' ),                'next_text'          => __( '>', 'autos' ),            );            the_posts_pagination( $args );        ?>    </div>    <?php    }}// function excape.if ( ! function_exists( 'autos_excape' ) ) {    function autos_excape() {    ?>    <div class="excerpt"><?php echo get_the_excerpt(); ?></div>    <?php    }}// function read more.if ( ! function_exists( 'autos_read_more' ) ) {    function autos_read_more() {    ?>    <div class="read-more">        <a href="<?php the_permalink(); ?>">            <?php esc_html_e( 'CONTINUE READING', 'autos' ); ?>        </a>    </div>    <?php    }}// function share.if ( ! function_exists( 'autos_share' ) ) {    function autos_share() {    ?>    <div class="share col-md-1">        <strong class="social-title">Share on</strong>        <ul class="social">            <li><a href="#">                <span class="fa fa-facebook social-button-content"></span></a>            </li>            <li><a href="#">                <span class="fa fa-twitter social-button-content"></span></a>            </li>            <li><a href="#">                <span class="fa fa-google-plus social-button-content"></span></a>            </li>            <li><a href="#">                <span class="fa fa-linkedin-square social-button-content"></span></a>            </li>        </ul>    </div>    <?php    }}// function content-open.if ( ! function_exists( 'autos_content_start' ) ) {    function autos_content_start() {    ?>    <div class="content-open col-md-10">    <?php    } }if ( ! function_exists( 'autos_content_end' ) ) {    function autos_content_end() {    ?>    </div>    <?php    } }// function hook.if ( ! function_exists( 'autos_hook_action' ) ) {    function autos_hook_action() {        if ( is_singular( 'post' ) ) {            remove_action( 'autos_post', 'autos_post_title', 10 );        }    }}