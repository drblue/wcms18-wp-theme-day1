<?php
	// detta inläggets id
	$current_post_id = get_the_ID();

	// detta inläggets kategorier
	$current_post_category_ids = wp_get_post_categories($current_post_id);

	// hämta de 3 senaste blogginläggen, oavsett kategori
	$latest_posts_query = new WP_Query([
		'post_type' => 'post',
		'posts_per_page' => 3,
		'post__not_in' => [$current_post_id],
		// 'post__not_in' => [get_the_ID()], // same thing as above but shorter
		'category__in' => $current_post_category_ids,
	]);

	if ($latest_posts_query->have_posts()) {
		?>
			<h2>Latest Posts</h2>
			<div class="card-group">
				<div class="row">
					<?php
						while ($latest_posts_query->have_posts()) {
							$latest_posts_query->the_post();
							get_template_part('template-parts/content', 'excerpt');
						}
					?>
				</div><!-- /.row -->
			</div><!-- /.card-group -->
		<?php

		// reset post data
		wp_reset_postdata();
	}

	// skapa en .card-group och för varje blogginlägg kalla på template-parts/content-excerpt för att visa inlägget
?>
