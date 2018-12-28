<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="col-md-9 blog">
                    <div id="main-content">
                        <div class="author-box">
                            <?php get_template_part( 'author-bio' ); ?>
                        </div>

                        <?php if( have_posts() ) : while( have_posts() ) : the_post();  ?>

                            <?php get_template_part( 'content' , get_post_format() ); ?>

                        <?php endwhile ?>
                        <?php autos_pagination(); ?>
                        <?php else: ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                        <?php endif; ?>
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