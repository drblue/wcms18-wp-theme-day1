<!-- This is a Blog Post -->
<h1><?php the_title(); ?></h1>

<?php if (has_post_thumbnail()) : ?>
	<div class="featured-image-wrapper">
		<?php the_post_thumbnail('featured-image', ['class' => 'img-fluid d-block mx-auto']); ?>
	</div>
<?php endif; ?>

<?php the_content(); ?>

<hr>

<div>Post Created: <?php echo get_the_date(); ?> by <?php the_author(); ?></div>

<!-- End of Blog Post -->
