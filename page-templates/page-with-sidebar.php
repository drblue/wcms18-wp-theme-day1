<?php
/* Template Name: Page with sidebar */
get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-9 content">
			<!-- Do we have a page? -->
			<?php if (have_posts()) : ?>
				<!-- Yey, we has a page -->
				<?php while (have_posts()) : the_post(); ?>
					<!-- This is a Page -->
					<h1><?php the_title(); ?></h1>

					<?php the_content(); ?>
					<!-- End of Page -->
				<?php endwhile; ?>
			<?php endif; ?>
			<!-- End of posts -->
		</div>
		<?php
			get_sidebar('page');
		?>
	</div>
</div><!-- /.container -->

<?php
get_footer();
