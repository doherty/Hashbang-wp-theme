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
<?php echo get_avatar( $author->user_email, 128, 'Mystery Man', $author->display_name ); ?>
<p id="profile" style="text-align:justify;">
1) Experimental cognitive neuropsychology<br />
2) Computer science<br />
3) ???<br />
4) PROFIT!<br />
<br />

I'm a well-rounded computer geek. I do open-source technology like linux and perl,
but I've studied widely - from foreign policy to Plato's Speech of Aristophanes.<br />

This blog is my own to neglect as I see fit. My shorter musings are found on
Twitter - <a href="https://twitter.com/_doherty">@_doherty</a>.
</p>
<dl>
    <dt>Email</dt>
        <dd><?php echo $author->user_email; ?></dd>
    <dt>Twitter</dt>
        <dd><a href="https://twitter.com/_doherty">@_doherty</a></dd>
    <dt>Github</dt>
        <dd><a href="https://github.com/doherty">doherty</a></dd>
    <dt>CPAN</dt>
        <dd><a href="https://metacpan.org/author/DOHERTY">DOHERTY</a></dd>
    <dt>GPG key</dt>
        <dd><a href="http://keyserver.ubuntu.com:11371/pks/lookup?search=0xDBB915AE&op=index">
            <pre style="margin:0;">3627 B320 385F FFD0 8823 861A 1038 C3B7 DBB9 15AE</pre></a>
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
</div>
</div>

<?php get_footer(); ?>