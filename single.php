<!DOCTYPE HTML>
<html>
<head>
<title>oolaa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php bloginfo(stylesheet_url);?>">
<title><?php bloginfo(title);?></title>

</head>

<body>
		<nav class="navbar">
				<div class="navbar-logo">oolaa</div>
				<ul>
						<li>Regístrate</li>
						<li>Inicia sesión</li>
						<li>Blog</li>
						<li>¿Eres estilista?</li>
				</ul>
		</nav>

	<div class="search fixedElement">
			<input type="text" placeholder="busca por tema">
	</div>

	<section class="blog-left">
		<div class="blog-left-recent">
			<h3>Mas recientes</h3>
			<?php
				$args=array('numberposts' => '4');
				$recent_posts = wp_get_recent_posts($args);
			    foreach( $recent_posts as $recent ){
			    	echo '<div class="blog-left-recent-box"><a href="' . get_permalink($recent["ID"]) . '">' .        $recent["post_title"].'</a></div>';
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					    the_post_thumbnail('thumbnail');
					}
			    }
			?>
		</div>
		<div class="blog-left-polular">
			<h3>Mas populares</h3>
			<div class="blog-left-recent-box">
				<a href="#">El color de las uñas</a>
			</div>
			<div class="blog-left-recent-box">
				<a href="#">La importancia de un servicio</a>
			</div>
			<div class="blog-left-recent-box">
				<a href="#"><a href="#">Pasos de reclutamiento</a>
			</div>
			<div class="blog-left-recent-box">
				<a href="#">Cálentamiento global</a>
			</div>
		</div>
	</section>

	<section class="blog-right">

	</section>
	<section class="blog-center">
		<?php
			if(have_posts()) :
				while(have_posts()):		
					the_post();			
		?>
					<div class="article">
						<div class="article-header">
								<h3><?php the_title()?></h3>
								<div class="article-info">
									<div class="article-info-author">Laura Pelaez</div>
									<div class="article-info-date">Marzo 15 2016</div>
								</div>
						</div>

						<div class="article-text-aux">
							<?php the_content();?>
						</div>

					</div>
		<?php
				endwhile;?>

				<?php the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Back', 'textdomain' ),
					'next_text' => __( 'Onward', 'textdomain' ),
				) );?>
				<?php else:
		?>
				<div>Sin posts</div>
		<?php
			endif;
			wp_reset_postdata();
		?>
	</section>

	



</body>
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>

<script src="/js/main.js" type="text/javascript">

</script>

</html>
