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
<div id="profile-avatar"><?php echo get_avatar( $author->user_email, 256, 'Mystery Man', $author->display_name ); ?></div>
<p id="profile-body">
1) Experimental cognitive neuropsychology<br />
2) Computer science<br />
3) ???<br />
4) PROFIT!<br />
<br />

I'm a well-rounded computer geek. I do open-source technology like linux and perl,
but I've studied widely &ndash; from foreign policy to Plato's Speech of Aristophanes.
My first degree is a BSc Psychology, but I currently study computer science.<br />

This work is licensed under a <a rel="license"
href="http://creativecommons.org/licenses/by-sa/3.0/deed.en">
Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
If you value concision, try my Twitter feed:
<a href="https://twitter.com/mikedoherty_ca">@mikedoherty_ca</a>.
</p>
<dl>
    <dt>Email</dt>
        <dd><?php echo $author->user_email; ?></dd>
    <dt>Twitter</dt>
        <dd><a href="https://twitter.com/mikedoherty_ca">@mikedoherty_ca</a></dd>
    <dt>Github</dt>
        <dd><a href="https://github.com/doherty">doherty</a></dd>
    <dt>CPAN</dt>
        <dd><a href="https://metacpan.org/author/DOHERTY">DOHERTY</a></dd>
    <dt>GPG key</dt>
        <dd><a href="http://keyserver.ubuntu.com:11371/pks/lookup?search=0xDBB915AE&amp;op=index" class="inline-code">
            3627 B320 385F FFD0 8823 861A 1038 C3B7 DBB9 15AE
            </a>
        </dd>
<?php
$links = get_bookmarks( array('orderby' => 'rating', exclude => '8,9,12') );
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
</div><!--/maincol-->
</div><!--/wrapper-->
<?php get_footer(); ?>
