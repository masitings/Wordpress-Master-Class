<?php $headers = get_field('headers', 'option');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?php bloginfo('url');?>"><?php bloginfo('name'); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php foreach ($headers['menus'] as $menu) :?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $menu['menu']['url'];?>"><?= $menu['menu']['title'];?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </nav>