<?php

if ( function_exists('register_sidebar') ) {
    register_sidebar(
        array(
            'name' => 'Left Sidebar',
            'before_widget' => '', // Removes <li>
            'after_widget' => '</div>', // Removes </li>
            'before_title' => '<h2 class="menuheader">',
            'after_title' => '</h2><div class="menucontent">',
        )
    );
}

function hashbang_jquery_scripts() {
    wp_enqueue_script(
        'hashbang-jquery',
        get_stylesheet_directory_uri() . '/scripts/jquery-1.9.1.min.js',
        false,
        null,
        true
    );
    wp_enqueue_script(
        'hashbang-jquery-ui',
        get_stylesheet_directory_uri() . '/scripts/jquery-ui-1.10.1.custom.min.js',
        array('hashbang-jquery'),
        null,
        true
    );
    wp_enqueue_script(
        'hashbang-main',
        get_stylesheet_directory_uri() . '/scripts/main.min.js',
        array('hashbang-jquery-ui'),
        null,
        true
    );
}

add_action( 'wp_enqueue_scripts', 'hashbang_jquery_scripts' );

function excerpt_stripped ($excerpt) { return wp_strip_all_tags($excerpt); }

function meta_description ($post) {
    $description = $post->post_title;

    $extra = $post->post_content;
    $extra = strip_shortcodes( $extra );
    $extra = str_replace(']]>', ']]&gt;', $extra);
    $extra = wp_strip_all_tags($extra);
    $extra = wp_trim_words( $extra, 50, '' );
    if ($extra) { $description .= ' ' . $extra; }

    return $description;
}
