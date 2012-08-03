<?php
get_header();
get_sidebar();
$author = (get_query_var('author_name'))
    ? get_user_by('slug', get_query_var('author_name'))
    : get_userdata(get_query_var('author'));
?>
<div id="wrapper" class="clearfix">
<div id="maincol">

<h2 class="contentheader"><?php echo 'About: ' . $author->display_name; ?></h2><br />
<p id="profile">
<?php echo get_avatar( $author->user_email, 128, 'Mystery Man', $author->display_name ); ?>
<?php echo $author->user_description; ?>
</p>
<dl>
    <dt>Website</dt>
        <dd><a href="<?php echo $author->user_url; ?>"><?php echo $author->user_url; ?></a></dd>
    <dt>Email</dt>
        <dd><?php echo $author->user_email; ?></dd>
<?php
//if ($twitter = $author->twitter)    { echo "<dt>Twitter</td><dd>$twitter</dd>\n"; }
//if ($google = $author->googleplus)  { echo "<dt>Google+</dt><dd>$google</dd>\n"; }
//if ($linkedin = $author->linkedin)  { echo "<dt>LinkedIn</dt><dd>$linkedin</dd>\n"; }
if ($jabber = $author->jabber)      { echo "<dt>Jabber</dt><dd>$jabber</dd>\n"; }
if ($aim = $author->aim)            { echo "<dt>AIM</dt><dd>$aim</dd>\n"; }
if ($yahoo = $author->yim)          { echo "<dt>Yahoo! IM</dt><dd>$yahoo</dd>\n"; }

$links = get_bookmarks( array('orderby' => 'rating') );
if ( !empty($links) ) {
    echo '<dt>Links</dt><dd>';
    foreach ($links as $link) {
        printf("<a href='%s'>%s</a>\n", $link->link_url, $link->link_name);
    }
    echo '</dd>';
}
?>
</dl>

<h2>Posts by <?php echo $author->nickname; ?>:</h2>
<ul>
<!-- The Loop -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<li>
    <?php the_time('d M Y'); ?>:
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
    [<?php the_category(', ');?>]
</li>
<?php endwhile; else: ?>
<p><?php _e('No posts by this author.'); ?></p>
<?php endif; ?>
<!-- End Loop -->
</ul>
</div>
</div>

<?php get_footer(); ?>
