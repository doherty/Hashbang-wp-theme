<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<title>
<?php
if ( is_front_page() || is_home() ) {
    echo bloginfo('description');
}
elseif ( is_single() || is_page() ) {
    echo wp_title('');
}
elseif (is_404()) {
    echo '404 Not Found';
}
elseif (is_category()) {
    echo 'Category: '; wp_title('');
}
elseif (is_search()) {
    echo 'Search Results: '; the_search_query();
}
elseif ( is_day() || is_month() || is_year() ) {
    echo 'Archives: '; wp_title('');
}
else {
    echo wp_title('');
} ?> &raquo; <?php bloginfo('name'); ?>
</title>

<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php
if ( is_single() ) {
    single_post_title('', true);
}
else {
    bloginfo('name'); ?> - <?php bloginfo('description');
}
?>" />
<meta name="keywords" content="<?php
if ( is_single() ) {
    $post = $wp_query->post;
    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach ($tags as $tag) {
            echo $tag->name . ' ';
        }
    }
    else {
        bloginfo('name'); ?> - <?php bloginfo('description');
    }
}
else {
    bloginfo('name'); ?> - <?php bloginfo('description');
}
?>" />
<meta name="google-site-verification" content="O8GjPUp_ztuFmLF6KI45mxBxYm2ZcIbNb0t49ZNRoHA" />
<meta name="msvalidate.01" content="76C14A4C09E9693551D652DBC2A70D62" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/white.css" title="white" />
<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/black.css" title="black" />
<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/blue.css" title="blue" />
<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/green.css" title="green" />
<link rel="alternate stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/grey.css" title="grey" />

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/jquery-ui-1.8.12.custom.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/script.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/styleswitcher.js"></script>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="all comments - RSS 2.0" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<?php wp_head(); ?>
</head>

<body>
<div id="page">
<div id="header">
<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
</div><!--/header-->
