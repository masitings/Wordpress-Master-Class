<?php get_header(); ?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-9 card">
            <h1 class="mb-4"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>

        <?php get_sidebar(); ?>

    </div>
</div>
<?php get_footer(); ?>