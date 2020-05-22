<?php get_header(); ?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();  ?>
                    <div class="card mb-2">
                        <div class="card-body">
                            <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php pagination_themes(); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>