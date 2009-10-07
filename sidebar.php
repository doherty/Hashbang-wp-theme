<div id="leftcol" >
<div id="menu">

<h2 class="menuheader">Pages</h2>
<div class="menucontent">
<ul>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
</div>

<h2 class="menuheader">Categories</h2>
<div class="menucontent">
<ul>
<?php wp_list_categories('title_li=&show_count=0'); ?>
</ul>
</div>


<h2 class="menuheader">Archives</h2>
<div class="menucontent">
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>


<h2 class="menuheader">Links</h2>
<div class="menucontent">
<ul>
<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
</ul>
</div>

<h2 class="menuheader">Customise</h2>
<div class="menucontent">

<ul>
<li><a href="#" onclick="setActiveStyleSheet('white'); return false;">White</a></li>
<li><a href="#" onclick="setActiveStyleSheet('black'); return false;">Black</a></li>
<li><a href="#" onclick="setActiveStyleSheet('blue'); return false;">Blue</a></li>
<li><a href="#" onclick="setActiveStyleSheet('green'); return false;">Green</a></li>
<li><a href="#" onclick="setActiveStyleSheet('grey'); return false;">Grey</a></li>
</ul>

</div>



<h2 class="menuheader">Info</h2>
<div class="menucontent">
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
<li>Design by <a href="http://www.techdesigns.co.uk" title="Design by Techdesigns">Techdesigns</a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">Powered by WordPress</a></li>
<?php wp_meta(); ?>
</ul>
</div>

<?php if ( !function_exists('dynamic_sidebar')         || !dynamic_sidebar() ); ?>




</div>
</div>