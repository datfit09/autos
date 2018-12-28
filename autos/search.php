<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-9 blog">
                    <div id="main-content">
                        <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <h1 class="page-title">
                                    <?php printf( __( 'Search Results for: %s', 'autos' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); 
                                    ?>
                                </h1>
                            </header>

                            <?php
                            while ( have_posts() ) : the_post();
                                get_template_part( 'template-parts/content', 'search' );
                            endwhile;

                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'autos' ),
                                'next_text'          => __( 'Next page', 'autos' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'autos' ) . ' </span>',
                            ) );

                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </div>
                </div>

                <div id="sidebar" class="col-md-3 side-bar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>