<?php
get_header();
?>

<main class="container">
	<h1><?php _e('Frequently Asked Questions', 'mybasictheme'); ?></h1>

	<!-- Do we have any posts? -->
	<?php if (have_posts()) : ?>
		<div class="accordion" id="accordionFAQ">
			<?php while (have_posts()) : the_post(); ?>
				<!-- Single FAQ start -->
				<div class="card">
					<div class="card-header">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#faq-<?php the_ID(); ?>">
								<?php the_title(); ?>
							</button>
						</h2>
					</div>

					<div id="faq-<?php the_ID(); ?>" class="collapse" data-parent="#accordionFAQ">
						<div class="card-body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<!-- Single FAQ end -->
			<?php endwhile; ?>
		</div><!-- End of Accordion -->

		<!-- pagination -->
		<?php get_template_part('template-parts/posts-pagination'); ?>
		<!-- /pagination -->
	<?php else: ?>
		<?php get_template_part('template-parts/content', 'none'); // template-parts/content-none.php ?>
	<?php endif; ?>
	<!-- End of posts -->
</main><!-- /.container -->

<?php
get_footer();
