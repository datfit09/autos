<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-9 blog">
                    <div id="main-content">
                    <?php 
                    _e( '<h2>404 NOT FOUND</h2>', 'autos');
                    _e( '<p>The article you were looking for was not found, but maybe try looking again!</p>' , 'autos' );
                    
                        ?><div class="search"><?php
                            get_search_form();
                        ?></div><?php    
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