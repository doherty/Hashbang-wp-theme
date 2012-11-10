<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="wrapper" class="clearfix">
<div id="maincol">

<?php if (have_posts()) : ?>
<h2>Search results</h2>
<?php while (have_posts()) : the_post(); ?>

<h2 class="contentheader"><?php the_title(); ?></h2>
<div class="permalink"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Permanent Link</a></div>
<?php the_excerpt() ?>
<div class="postinfotext">
Posted: <?php the_time('F jS, Y') ?><br/>
Categories: <?php the_category(', ') ?><br/>
Tags: <?php the_tags(', '); ?><br/>
Comments: <a href="<?php comments_link(); ?>"><?php comments_number('No Comments','1 Comment','% Comments'); ?></a>.
</div>

<?php endwhile; ?>

<div class="navigation">
<span class="prevlink"><?php next_posts_link('Previous entries') ?></span>
<span class="nextlink"><?php previous_posts_link('Next entries') ?></span>
</div>

<?php else : ?>
<h2 class="contentheader">Search results</h2>
<p>No matches. Please try again, or use the navigation menus to find what you search for.</p>
<?php endif; ?>

</div><!--/maincol-->
</div><!--/wrapper-->
<?php get_footer(); ?>
