<?php
get_header();
?>

<main class="container">
	<h1><?php _e('Movie Reviews', 'mybasictheme'); ?></h1>

	<div class="row">
		<div class="col-md-9 content">
			<!-- Do we have any posts? -->
			<?php if (have_posts()) : ?>
				<!-- Yey, we has posts -->
				<div class="card-group">
					<div class="row">
						<?php while (have_posts()) : the_post(); ?>
							<?php get_template_part('template-parts/content-mbt_movie_review', 'excerpt'); // template-parts/content-excerpt.php ?>
						<?php endwhile; ?>
					</div><!-- /.row -->
				</div><!-- /.card-group -->

				<!-- pagination -->
				<?php get_template_part('template-parts/posts-pagination'); ?>
				<!-- /pagination -->
			<?php else: ?>
				<?php get_template_part('template-parts/content', 'none'); // template-parts/content-none.php ?>
			<?php endif; ?>
			<!-- End of posts -->
		</div><!-- /.col-md-9 -->

		<?php get_sidebar('movie-review'); ?>
	</div><!-- /.row -->
</main><!-- /.container -->

<?php
get_footer();
