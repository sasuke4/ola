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

	<?php get_search_form(); ?>

	<section class="blog-left">
		<div class="blog-left-recent">
			<h3>Mas recientes</h3>
			<?php
				$args=array('numberposts' => '4');
				$recent_posts = wp_get_recent_posts($args);
			    foreach( $recent_posts as $recent ){
			    	echo '<div class="blog-left-recent-box"><a href="' . get_permalink($recent["ID"]) . '">' .        $recent["post_title"].'</a></div>';
			    }
			?>
		</div>
		<div class="blog-left-polular">
			<h3>Mas populares</h3>
			<?php
				$args=array('cat' => '2');
				$recent_posts = wp_get_recent_posts($args);
			    foreach( $recent_posts as $recent ){
			    	echo '<div class="blog-left-recent-box"><a href="' . get_permalink($recent["ID"]) . '">' .        $recent["post_title"].'</a></div>';
			    }
			?>
		</div>
	</section>

	<section class="blog-right">
		<?php
			$args=array('numberposts' => '4','cat' => '2');
			$recent_posts = get_posts($args);
		    foreach( $recent_posts as $recent ){
				if (has_post_thumbnail($recent->ID) ) { // check if the post has a Post Thumbnail assigned to it.
				    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $recent->ID ), 'single-post-thumbnail' );
				    $title= $recent->post_title;
				    $href= get_permalink($recent->ID);
				    
				    global $post;
				    $post = get_post( $recent->ID);
				    setup_postdata( $post );
				    $the_excerpt = get_the_excerpt();
				    
					
				    echo  '<div class="blog-right-article"><img src="'.$image[0].'" alt="uno">
							<div class="blog-right-article-box">
								<h3><a href="'.$href.'">'.$title.'</a></h3>
							</div>
							<div class="blog-right-article-box">
								<a href="'.$href.'">'.$the_excerpt.'</a>
							</div>
						  </div>';
					wp_reset_postdata();
				}
		    }
		?>
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

						<div class="article-textaux">
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
