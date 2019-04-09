<!-- This is a single Movie Review -->
<article>
	<h1><?php the_title(); ?></h1>

	<?php if (has_post_thumbnail()) : ?>
		<div class="featured-image-wrapper">
			<?php the_post_thumbnail('featured-image', ['class' => 'img-fluid d-block mx-auto']); ?>
		</div>
	<?php endif; ?>

	<p class="text-muted">
		<em>
			<?php
				printf(
					__('Movie Review written by %s on %s', 'mybasictheme'),
					get_the_author(),
					get_the_date()
				);
			?>
		</em>
	</p>

	<div class="movie-metadata-wrapper">
		<p>
			<?php _e('Actors:', 'mybasictheme'); ?> <?php the_terms(get_the_ID(), 'mbt_actor'); ?>
		</p>
		<p>
			<?php
				the_terms(
					get_the_ID(),
					'mbt_movie_genre',
					__('Genres: ', 'mybasictheme')
				);
			?>
		</p>
	</div>

	<?php the_content(); ?>
</article>
<!-- End of single Movie Review -->

<!-- Pagination -->
<?php get_template_part('template-parts/movie-review-pagination'); ?>
<!-- /Pagination -->
