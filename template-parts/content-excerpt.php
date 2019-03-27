<!-- This is a Blog Post -->
<div class="col-md-6 col-lg-4 mb-4">
	<div class="card">
		<?php if (has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top img-fluid']); ?>
			</a>
		<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

			<div class="card-text">
				<?php the_excerpt(); ?>
			</div>
		</div><!-- /.card-body -->
		<div class="card-footer">
			<small class="text-muted">Post Created: <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> in <?php the_category(', '); ?></small>
		</div><!-- /.card-footer -->
	</div><!-- /.card -->
</div><!-- /.col -->
<!-- End of Blog Post -->
