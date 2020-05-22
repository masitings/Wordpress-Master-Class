<?php
function calling_style()
{
    wp_enqueue_style('app', get_template_directory_uri() . '/assets/css/app.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    wp_enqueue_script('jquery.min', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js');
    wp_enqueue_script('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js');
    wp_deregister_script('jquery');
}

if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(
        array(
            'page_title' => 'Site Settings',
            'menu_title' => 'Site Settings',
            'menu_slug'  => 'site-settings',
            'redirect'         => false
        )
    );
}

function pagination_themes()
{
    // Don't print empty markup if there's only one page.
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }

    $paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args   = array();
    $url_parts    = explode('?', $pagenum_link);

    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links(array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'mid_size' => 3,
        'add_args' => array_map('urlencode', $query_args),
        'prev_text' => __('&larr; Previous', 'yourtheme'),
        'next_text' => __('Next &rarr;', 'yourtheme'),
        'type'      => 'list',
    ));

    if ($links) :?>
        <nav class="navigation paging-navigation" role="navigation">
            <?php echo $links; ?>
        </nav><!-- .navigation -->
    <?php endif;
}

add_action('wp_enqueue_scripts', 'calling_style');
