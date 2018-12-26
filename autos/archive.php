<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-8 blog">
                    <div id="main-content">
                        <?php autos_category(); ?>
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