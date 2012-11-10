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

function cc_by_sa() {
    echo '<div class="copyright"><p>This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_GB">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.</p></div>';
}
add_action('wp_footer', 'cc_by_sa');
