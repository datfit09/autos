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
                <div class="header-login">
                    <?php echo wp_kses_post( get_option( 'topbar_left' ) ); ?>
                </div>
                <div class="header-contact">
                    <?php echo wp_kses_post( get_option( 'topbar_right' ) ); ?>
                </div>
            </div>
        </div>

        <div class="topnav">
            <div class="container">
                <?php autos_logo(); ?>

                <div class="menu">
                    <?php autos_menu( 'primary-menu' ); ?>
                </div>
                <button class="fa fa-search search-button"></button>

                <button class="toggle-menu-btn fa fa-bars"></button>

                <?php hotline(); ?>

                <div class="menu-overlay"></div>
            </div>
        </div>

        <div class="page-header" style="<?php autos_page_header_background(); ?>">
            <div class="container">
                <?php autos_title_blog(); ?>
            </div>
        </div>
        <?php do_action( 'autos_header' ); ?>
    </header>
