<!DOCTYPE html>
<html "<?php language_attributes(); ?>" />
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="top-bar">
            <div class="container">
                <?php
                    $left = get_option( 'topbar_left' );
                    $right = get_option( 'topbar_right' );
                    if ( '' != $left || '' != $right ) {
                        ?><div class="header-login">
                            <?php echo wp_kses_post( get_option( 'topbar_left' ) ); ?>
                        </div>
                        <div class="header-contact">
                            <?php echo wp_kses_post( get_option( 'topbar_right' ) ); ?>
                        </div>
                    <?php }
                ?>
            </div>
        </div>

        <div class="topnav">
            <div class="container">
                <div class="topnav-wrapper">
                    <?php autos_logo(); ?>

                    <div class="menu">
                        <?php autos_menu( 'primary-menu' ); ?>
                    </div>

                    <?php autos_search(); ?>
                    
                    <div class="search-form">
                        <?php get_template_part( 'template/search' ); ?>
                    </div>

                    <button class="toggle-menu-btn fa fa-bars"></button>

                    <?php hotline(); ?>
                </div>
            </div>
        </div>

        <div class="page-header" style="<?php autos_page_header_background(); ?>">
            <div class="container">
                <?php autos_title_blog(); ?>
            </div>
        </div>
        <?php do_action( 'autos_header' ); ?>
    </header>
