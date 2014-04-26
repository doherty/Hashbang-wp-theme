<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<?php
$blog_keywords = implode(' ', get_terms( 'post_tag',
    array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 20, fields => 'names' )
));

if ( is_front_page() || is_home() ) {
    $title_text = get_bloginfo('description') . ' &raquo ' . get_bloginfo('name');
    $desc_text  = get_bloginfo('description') .   ' - '    . get_bloginfo('name');
    $keywords   = $blog_keywords;
}
elseif ( is_single() || is_page() ) {
    $title_text = wp_title('', false) . ' &raquo ' . get_bloginfo('name');
    $desc_text  = meta_description($post);
    $tags       = get_the_tags($post->ID);
    if ($tags) {
        $cb       = function($tag){ return $tag->name; };
        $keywords = implode(' ', array_map($cb, $tags));
    }
    else {
        $keywords = '';
    }
}
elseif (is_404()) {
    $title_text = '404 Not Found';
}
elseif (is_category()) {
    $title_text = 'Category: ' . wp_title('', false);
    $desc_text  = wp_title('', false);
}
elseif (is_search()) {
    $title_text = 'Search Results: ' . get_search_query();
    $desc_text  = get_search_query();
}
elseif ( is_day() || is_month() || is_year() ) {
    $title_text = 'Archives: ' . wp_title('', false);
}
else {
    $title_text = wp_title('', false);
    $desc_text  = wp_title('', false);
} ?>
<title><?php echo $title_text
    ? $title_text
    : get_bloginfo('name') . ' &raquo; ' . get_bloginfo('description')
?></title>
<meta name="description" content="<?php echo $desc_text
    ? $desc_text
    : get_bloginfo('name') . ' - ' . get_bloginfo('description')
?>" />
<meta name="keywords" content="<?php echo $keywords
    ? $keywords
    : $blog_keywords
?>" />

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style.min.css"              />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/styles/white.css" id="skin" />

<?php
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head();
?>

<link rel="shortcut icon" href="/favicon.ico" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="all comments - RSS 2.0" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="author" href="https://plus.google.com/u/0/101186227351780847596"/>
</head>

<body>
<div id="page">
<div id="header">
<h1><a href="<?php bloginfo('url'); ?>"
    title="<?php echo get_bloginfo('description') . ' &raquo ' . get_bloginfo('name'); ?>">
    <?php echo get_bloginfo('description') . ' &raquo ' . get_bloginfo('name'); ?>
</a></h1>
</div><!--/header-->
