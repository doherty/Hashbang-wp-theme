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
