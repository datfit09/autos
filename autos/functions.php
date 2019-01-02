<?php 
/**
*THEME_URI = lay duong dan thu muc theme.
*/
define( 'THEME_URI', get_template_directory_uri() . '/' );
define( 'THEME_DIR', get_template_directory() . '/' );

// Chi duong dan do_action den Template hooks.
require_once THEME_DIR . 'inc/template-functions.php';
require_once THEME_DIR . 'inc/template-hooks.php';
require_once THEME_DIR . 'inc/customizer.php';
require_once THEME_DIR . 'inc/widgets/class-widget-recent-post-thumbnail.php';


//Thiet lap chieu rong noi dung.
if ( ! isset( $content_with ) ) {
    $content_with = 1200;
}

/*
*Khai bao chuc nang cua theme.
*/ 
if ( ! function_exists( 'autos_theme_setup' ) ) {
    function autos_theme_setup() {

        // Thiet lap textdomain.
        $language_folder = THEME_DIR . 'language';
        load_theme_textdomain( 'autos', $language_folder );

        // Tu dong them link RSS len <header>.
        add_theme_support( 'automatic-feed-links' );

        // Them post thumbnail.
        add_theme_support( 'post-thumbnails' );



        // Them Widget Autos_Recent_Post_Thumnbail cho nguoi dung.
        function wpb_load_widget() {
            register_widget( 'Autos_Recent_Post_Thumnbail' );
        }
        add_action( 'widgets_init', 'wpb_load_widget' );         
        
        // Them custumer logo.
        add_theme_support(
            'custom-logo' ,
            array(
                'height'      => 100,
                'width'       => 400,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
            )
        );

        // Post formats.
        add_theme_support( 'post-formats' , array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ) );

        // Them title-tag.
        add_theme_support( 'title-tag' );

        // Them custom background.
        $default_background = array(
            'default_background' => '#e8e8e8',
        );
        add_theme_support( 'custom-background', $default_background );
    }
    add_action( 'after_setup_theme', 'autos_theme_setup' );
}


// Them menu.
function register_my_menus() {
  register_nav_menus(
    array('primary-menu' => __( 'Primary Menu', 'autos' ) )
  );
}
add_action( 'init', 'register_my_menus' );

// Option menu.
if ( ! function_exists( 'autos_menu' ) ) {
    function autos_menu( $menu ) {
        $menu = array(
            'theme_location' => $menu,
            'container'      => 'nav',
            'menu_class'     => 'primary-menu menu',
        );
        wp_nav_menu( $menu );
    }
}

// Tao form search.
if ( ! function_exists( 'autos_search' ) ) {
    function autos_search() {
        ?>
        <button class="fa fa-search search-button demo-btn"></button>
        <?php
    }
}

// Ham hien thi thumbnail.
if ( !function_exists( 'autos_thumbnail' ) ) {
    function autos_thumbnail( $size ) {
        if ( ! is_single() && has_post_thumbnail() && post_password_required() || has_post_format( 'image' ) ) : ?>
        <figure class="post_thumbnail"> <?php the_post_thumbnail( $size ); ?> </figure>
        <?php endif; ?>
    <?php }
}

// Category.
if ( ! function_exists( 'autos_category' ) ) {
    function autos_category() {
        ?>
        <div class="archive-title">
        <?php 
            if ( is_tag() ) :
                printf( __( 'Post tagged: %1$s' , 'autos' ) , single_tag_title( '', false ) );
            elseif ( is_category() ) :
                printf( __( 'Post categorized: %1$s' , 'autos' ) , single_tag_title( '', false ) );
            elseif ( is_day() ) :
                printf( __( 'Daily Archives: %1$s' , 'autos' ) , get_the_time('l, F j, Y') );
            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %1$s' ), 'autos' , get_the_time('F Y') );
            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %1$s' ), 'autos' , get_the_time('Y') );
            endif;    
        ?>
        </div>

        <?php if( is_tag() || is_category() ) : ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php endif; ?>
        <?php
    }
}

// autos_entry_header = hien thi tieu de post.
if ( ! function_exists( 'autos_entry_header' ) ) {
    function autos_entry_header() { ?>
        <?php if ( is_single() ) : ?>
            <h1 class="entry_header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" > <?php the_title(); ?> </a></h1>
        <?php else: ?>
            <h2 class="entry_header"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" > <?php the_title(); ?> </a></h2>
        <?php endif; ?>
    <?php }
}

/**
* Chèn CSS và Javascript vào theme
* sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
**/
function autos_styles() {
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */

    // font-awesome-min css.
    wp_enqueue_style(
        'font-awesome',
        THEME_URI . 'assets/css/font-awesome.min.css'
    );

    // option.js script.
    wp_enqueue_script( 
        'option' , 
        THEME_URI . 'assets/js/option.js' , 
        array( 'jquery' ),
        null,
        true
    );


    if( is_singular() && comments_open() && ( 1 == get_option( 'thread_comments' ) ) ) {
        // Load comment-reply.js (into footer).
        wp_enqueue_script( 'comment-reply', 'wp-includes/js/comment-reply', array(), false, true );
    }

    wp_enqueue_style(
        'main-style',
        get_stylesheet_uri()
    );
}
add_action( 'wp_enqueue_scripts', 'autos_styles' );


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Main Sidebar', 'autos' ),
            'id'            => 'main-sidebar',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'autos' ),
            'before_widget' => '<ul id="%1$s" class="widget %2$s">',
            'after_widget'  => '</ul>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Widget', 'autos' ),
            'id'            => 'footer-widget',
            'description'   => __( 'Widgets in this area will be shown on foooter.', 'autos' ),
            'before_widget' => '<ul id="%1$s" class="widget %2$s col-md-3">',
            'after_widget'  => '</ul>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        )
    );
}


// Logo Menu.
if ( ! function_exists( 'autos_logo' ) ) {
    function autos_logo() {
        $id      = get_theme_mod( 'custom_logo' );
        $img     = wp_get_attachment_image_src( $id, 'full' );
        $img_src = THEME_URI . 'assets/images/logo.jpg';
        if ( false != $img ) {
            $img_src = $img[0];
        }
        ?>
        <h2 class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php esc_attr__( 'Logo Image', 'autos' ); ?>">
            </a>
        </h2>
        <?php
    }
}

// Logo Footer.
if ( ! function_exists( 'autos_logo_footer' ) ) {
    function autos_logo_footer() {
        $imgft  = get_option( 'footer_logo_image' );
        ?> <img src="<?php echo esc_url( $imgft ); ?>" alt="<?php esc_attr__( 'Logo Image Footer', 'autos' ); ?>"> <?php
    }
}

// background_header_image Color.
if ( !function_exists( 'background_header_image' ) ) {
    function background_header_image() {
        $color = get_option( 'background_header_image', '#2a47ed' );
        $style = 'color: ' . $color .';';
        echo $style;
    }
}

// Color Blog Title.
if ( ! function_exists( 'blog_title_style' ) ) {
    function blog_title_style() {
        $color    = get_option( 'blog_color', '#000' );

        $style = 'color: ' . $color . ';';
        echo $style;
    }
}

// thay ten title trang single cho trang blog.
if ( ! function_exists( 'autos_title_blog' ) ) {
    function autos_title_blog() {
        $title     = get_option( 'blog_title' );
        if ( is_singular( 'post' ) ) {
            $title = get_the_title();
        }
        ?>
        <div class="block">
            <h1 class="blog-title" style="<?php blog_title_style(); ?>">
                <?php echo wp_kses_post( $title ); ?>
            </h1>
        </div>
        <?php
    }
}

// Thay image background Hearder.
if ( ! function_exists( 'autos_page_header_background' ) ) {
    function autos_page_header_background() {
        $bg_header = get_option( 'page_header_background' );
        $color     = get_option( 'background_header_image', '#2a47ed' );
        $style     = 'background-color: ' . $color . ';';

        if ( false != $bg_header ) {
            $style .= 'background-image: url(' . $bg_header . ')';
        }

        echo $style;
    }
}

// Color Blog Title.
if ( ! function_exists( 'blog_title_style' ) ) {
    function blog_title_style() {
        $color    = get_option( 'blog_color', '#000' );

        $style = 'color: ' . $color . ';';
        echo $style;
    }
}

// Hotline.
if ( ! function_exists( 'hotline' ) ) {
    function hotline() {
        $hotline = get_option( 'hotline' );
        echo $hotline;
    }
}

// Footer style.
if ( ! function_exists( 'footer_style' ) ) {
    function footer_style() {
        $color    = get_option( 'footer_color' );
        $bg_color = get_option( 'footer_background' );

        $style = 'color: ' . $color . ';';
        $style .= 'background-color: ' . $bg_color;

        echo $style;
    }
}

// Footer End style.
if ( ! function_exists( 'footer_end_style' ) ) {
    function footer_end_style() {
        $color    = get_option( 'footer_end_color', '#000' );
        $bg_color = get_option( 'footer_end_background', '#f5f5f5' );

        $style = 'color: ' . $color . ';';
        $style .= 'background-color: ' . $bg_color;

        echo $style;
    }
}

// Comment Form Style.
if ( ! function_exists( 'autos_comment_list' ) ) {
    function autos_comment_list( $comment, $args, $depth ) {
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>

        <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
            <div class="comment-body">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment, 70 ); ?>
                </div>

                <?php if ( 'div' != $args['style'] ) : ?>
                <div id="div-comment-<?php comment_ID(); ?>" class="comment-content">
                <?php endif; ?>

                    <div class="comment-meta commentmetadata">
                        <?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'autos' ), get_comment_author_link() ); ?>
                        
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'autos' ); ?></em>
                        <?php endif; ?>

                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-date">
                            <?php echo '<time datetime="' . esc_attr( get_comment_date( 'c' ) ) . '" class="only">' . esc_html( get_comment_date() ) . '</time>'; ?>
                        </a>

                        <div class="reply">
                            <?php
                                comment_reply_link(
                                    array_merge(
                                        $args, array(
                                            'add_below' => $add_below,
                                            'depth' => $depth,
                                            'max_depth' => $args['max_depth'],
                                        )
                                    )
                                );
                            ?>
                            <?php edit_comment_link( __( 'Edit', 'autos' ), '  ', '' ); ?>
                        </div>
                    </div>

                    <div class="comment-text">
                      <?php comment_text(); ?>
                    </div>

                <?php if ( 'div' != $args['style'] ) : ?>
                </div>
                <?php endif; ?>
            </div>
        <?php


    }
}

