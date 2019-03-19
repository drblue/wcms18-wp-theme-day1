<?php
get_header();
?>

<h1>Hello, world!</h1>

<!-- Do we have any posts? -->
<?php if (have_posts()) : ?>
	<!-- Yey, we has posts -->
	<?php while (have_posts()) : the_post(); ?>
		<!-- This is a Blog Post -->
		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<hr>
		<!-- End of Blog Post -->
	<?php endwhile; ?>
<?php endif; ?>
<!-- End of posts -->

<?php
get_footer();
