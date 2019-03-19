<?php
get_header();
?>

<div class="container">
	<h1>Welcome to My Basic Theme</h1>

	<h5>index.php</h5>

	<!-- Do we have any posts? -->
	<?php if (have_posts()) : ?>
		<!-- Yey, we has posts -->
		<?php while (have_posts()) : the_post(); ?>
			<!-- This is a Blog Post -->
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div>Post Created: <?php echo get_the_date(); ?> by <?php the_author(); ?> in <?php the_category(); ?></div>

			<?php the_excerpt(); ?>

			<hr>
			<!-- End of Blog Post -->
		<?php endwhile; ?>
	<?php endif; ?>
	<!-- End of posts -->
</div><!-- /.container -->

<?php
get_footer();
