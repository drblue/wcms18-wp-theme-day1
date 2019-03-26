<!-- This is a Blog Post -->
<div class="row">
	<?php if (has_post_thumbnail()) : ?>
		<div class="col-sm-3">
			<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
		</div>
	<?php endif; ?>
	<div class="col-sm">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div>Post Created: <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> in <?php the_category(); ?></div>

		<?php the_excerpt(); ?>
	</div>
</div>

<hr>
<!-- End of Blog Post -->
