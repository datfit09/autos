<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-8 blog">
                    <div id="main-content">

                    <?php 
                    _e( '<h2>404 NOT FOUND</h2>', 'autos');
                    _e( '<p>The article you were looking for was not found, but maybe try looking again!</p>' , 'autos' );
                    get_search_form();
                    _e( '<h3>Content catagory</h3>', 'autos' );
                    echo '<div class="404-cat-list">';
                        wp_list_categories( array( 'title_li' => '' ) );
                    echo '</div>';

                    _e( 'Tag Cloud' , 'autos' );
                    wp_tag_cloud();
                    ?>
                    
                    </div>
                </div>

                <div id="sidebar" class="col-md-4 slide-bar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>