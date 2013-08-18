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

<link rel="stylesheet" type="text/css" href="<?php           echo get_stylesheet_directory_uri(); ?>/style.min.css"                  />
<link rel="stylesheet" type="text/css" href="<?php           echo get_stylesheet_directory_uri(); ?>/styles/white.css" id="skin" />

<?php wp_head(); ?>

<script type="application/javascript">var _prum={id:"51670146e6e53da436000000"};var PRUM_EPISODES=PRUM_EPISODES||{};PRUM_EPISODES.q=[];PRUM_EPISODES.mark=function(b,a){PRUM_EPISODES.q.push(["mark",b,a||new Date().getTime()])};PRUM_EPISODES.measure=function(b,a,b){PRUM_EPISODES.q.push(["measure",b,a,b||new Date().getTime()])};PRUM_EPISODES.done=function(a){PRUM_EPISODES.q.push(["done",a])};PRUM_EPISODES.mark("firstbyte");(function(){var b=document.getElementsByTagName("script")[0];var a=document.createElement("script");a.type="text/javascript";a.async=true;a.charset="UTF-8";a.src="//rum-static.pingdom.net/prum.min.js";b.parentNode.insertBefore(a,b)})();</script>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="all comments - RSS 2.0" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="author" href="https://plus.google.com/u/0/101186227351780847596"/>
</head>

<body>
<div id="page">
<div id="header">
<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
</div><!--/header-->
