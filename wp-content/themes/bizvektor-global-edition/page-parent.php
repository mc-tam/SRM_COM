<?php
/*
 * Template Name: Child index page
 */
get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
<!-- [ #content ] -->
<div id="content">

<?php if ( have_posts()) : the_post(); ?>
	<?php
	$content = NULL;
	$content = get_the_content();
	if ($content) { ?>
		<div id="post-<?php the_ID(); ?>" class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	<?php } ?>

<?php endif; ?>

<?php 
$parentId = get_the_ID();
$args = 'posts_per_page=-1&post_type=page&orderby=menu_order&order=asc&post_parent='.$parentId;
query_posts($args);
if (have_posts()) : 
  $count = 1;
  while (have_posts()) : 
    the_post();
    if ( ( $count % 2 ) > 0 ) {
		$layout	= 'odd';
	} else {
		$layout	= 'even';
	}
?>
<!-- .child_page_block -->
<div class="child_page_block layout_<?php echo $layout ?>">
<div class="child_page_blockInner">
	<h4 class="entryTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<?php if ( has_post_thumbnail()) { ?>
		<div class="thumbImage">
		<div class="thumbImageInner">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>
		</div><!-- [ /.thumbImage ] -->
	<?php } ?>
	<div class="childText">
	<p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
	<div class="moreLink"><a href="<?php the_permalink(); ?>"><?php echo _x( 'Read more', 'Link to page', 'biz-vektor' ); ?></a></div>
	</div>
	<span class="linkBtn linkBtnS linkBtnAdmin"><?php edit_post_link(__('Edit', 'biz-vektor')); ?></span>
</div>
</div>
<!-- /.child_page_block -->
<?php
    $count++;
   endwhile;
endif;
wp_reset_query();
?>

</div>
<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<div id="sideTower" class="sideTower">
	<?php get_sidebar('page'); ?>
</div>
<!-- [ /#sideTower ] -->
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>