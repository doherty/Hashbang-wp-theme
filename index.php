<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix" > 
<div id="maincol" >


<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>

<h2 class="contentheader"><?php the_title(); ?></h2>
<div class="content">
<div class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Permanent Link</a></div>
<?php the_content('Read more &raquo;'); ?>


<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
<div id="postinfotext">
Posted: <?php the_time('F jS, Y') ?><br/>
Categories: <?php the_category(', ') ?><br/>
Tags: <?php the_tags(''); ?><br/>
Comments: <a href="<?php comments_link(); ?>"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a>.
</div>

</div>	
<?php endwhile; ?>

<div class="navigation">
<span class="prevlink"><?php next_posts_link('Previous entries') ?></span>
<span class="nextlink"><?php previous_posts_link('Next entries') ?></span>
</div>
		
<?php else : ?>
<h2 class="contentheader">Not found!</h2>
<p>Could not find the requested page. Use the navigation menu to find your target, or use the search box below:</p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>



</div>
</div>

<?php get_footer(); ?>