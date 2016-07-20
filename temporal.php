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

						<div class="article-text">
							<?php the_excerpt();?>
						</div>

						<div class="article-border"></div>
					</div>
		<?php
				endwhile;?>
				<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
				<?php else:
		?>
				<div>Sin posts</div>
		<?php
			endif;
			wp_reset_postdata();
		?>