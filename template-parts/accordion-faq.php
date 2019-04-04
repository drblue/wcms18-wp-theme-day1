<?php
	// hämta ut alla blogginlägg från kategorin med slug:en 'faq'
	$faq_query = new WP_Query([
		'category_name' => 'faq',
		'order' => 'asc',
		'orderby' => 'title',
		// 'posts_per_page' => -1,
		'paged' => get_query_var('paged'),
	]);

	// om det finns några blogginlägg, starta en accordion
	if ($faq_query->have_posts()) {
		?>
			<div class="accordion" id="accordionFAQ">
				<?php
					// för varje blogginlägg, skriv ut en single accordion item
					while ($faq_query->have_posts()) {
						$faq_query->the_post();
						?>
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
						<?php
					}
				?>
			</div><!-- End of Accordion -->

			<!-- pagination -->
			<div class="pagination-links d-flex justify-content-between mt-2">
				<div class="previous-page">
					<?php previous_posts_link(__('&laquo; Previous Page', 'mybasictheme')); ?>
				</div>
				<div class="next-page">
					<?php next_posts_link(__('Next Page &raquo;', 'mybasictheme'), $faq_query->max_num_pages); ?>
				</div>
			</div>
			<!-- /pagination -->
		<?php
		// reset postdata to main loop
		wp_reset_postdata();
	} else {
		?>
			<p><em><?php _e('Sorry, no FAQs found.', 'mybasictheme'); ?></em></p>
		<?php
	}

?>
