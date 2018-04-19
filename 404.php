<?php get_header() ?>

	<main id="main" class="columns small-12">
		<article class="hentry">
			<header>
				<h1 class="page-title"><?php _e( 'Whoooops. 404: Page Not Found', 'domestic' ); ?></h1>
			</header>
			<div class="entry-content">
				<div class="error">
					<p class="bottom"><?php _e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'domestic' ); ?></p>
				</div>
				<p><?php _e( 'Please try the following:', 'domestic' ); ?></p>
				<ul>
					<li>
						<?php _e( 'Check your spelling', 'domestic' ); ?>
					</li>
					<li>
						<?php
						printf(
							/* translators: %s: home page url */
							__( 'Return to the <a href="%s">home page</a>', 'domestic' ),
							home_url()
						);
						?>
					</li>
					<li>
						<?php _e( 'Click the <a href="javascript:history.back()">Back</a> button', 'domestic' ); ?>
					</li>
					<li>
						<br>
						<?php get_search_form() ?>
					</li>
				</ul>
			</div>
		</article>
	</main>



<?php get_footer() ?>
