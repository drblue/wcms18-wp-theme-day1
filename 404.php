<?php
get_header();
?>

<div class="container">

	<div class="row">
		<div class="col-md-9 content">
			<h1><?php _e('Sorry, that page is missing 👻!', 'mybasictheme'); ?></h1>

			<!-- <img src="https://banner2.kisspng.com/20180330/gww/kisspng-pixel-art-ghost-drawing-pixel-5abe367896dc87.9378433915224152246179.jpg" class="img-fluid"> -->

			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ?controls=0&hd=1&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>

		</div><!-- /.col-md-9 -->

		<?php get_sidebar(); ?>
	</div><!-- /.row -->
</div><!-- /.container -->

<?php
get_footer();
