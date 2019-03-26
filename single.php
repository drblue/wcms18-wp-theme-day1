<?php
get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-9 content">
			<!-- Do we have any posts? -->
			<?php if (have_posts()) : ?>
				<!-- Yey, we has posts -->
				<?php while (have_posts()) : the_post(); ?>
					<?php get_template_part('template-parts/content', 'single'); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php get_template_part('template-parts/content', 'none'); // template-parts/content-none.php ?>
			<?php endif; ?>
			<!-- End of posts -->
		</div><!-- /.col-md-9 -->

		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
