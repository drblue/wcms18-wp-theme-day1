<?php
get_header();
?>

<div class="container">
	<h1>Welcome to My Basic Theme</h1>

	<h5>single.php</h5>

	<!-- Do we have any posts? -->
	<?php if (have_posts()) : ?>
		<!-- Yey, we has posts -->
		<?php while (have_posts()) : the_post(); ?>
			<!-- This is a Blog Post -->
			<h2><?php the_title(); ?></h2>

			<?php the_content(); ?>

			<hr>

			<div>Post Created: <?php echo get_the_date(); ?> by <?php the_author(); ?></div>

			<!-- End of Blog Post -->
		<?php endwhile; ?>
	<?php endif; ?>
	<!-- End of posts -->
</div><!-- /.container -->

<?php
get_footer();
