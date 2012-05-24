<div id="leftcol" >
<div id="menu">

<h2 class="menuheader">About</h2>
<div class="menucontent">
<p>1) Experimental cognitive neuropsychology</p>
<p>2) Computer science</p>
<p>3) ???</p>
<p>4) PROFIT!</p>
</div>

<h2 class="menuheader">Pages</h2>
<div class="menucontent">
<ul>
<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
</ul>
</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ); ?>

<h2 class="menuheader">Customise</h2>
<div class="menucontent">
<ul>
<li><a href="#" class="styleswitch" rel="white">White</a></li>
<li><a href="#" class="styleswitch" rel="black">Black</a></li>
<li><a href="#" class="styleswitch" rel="blue">Blue</a></li>
<li><a href="#" class="styleswitch" rel="green">Green</a></li>
<li><a href="#" class="styleswitch" rel="grey">Grey</a></li>
</ul>
</div>

</div>
</div>
