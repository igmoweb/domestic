<?php

/**
 * Domestic Theme admin About/Docs page
 */

if ( ! function_exists( 'domestic_register_docs_page' ) ) :
	function domestic_register_docs_page() {
		add_theme_page( __( 'Domestic Theme', 'domestic' ), __( 'Domestic Theme', 'domestic' ), 'edit_theme_options', 'domestic-about', 'domestic_render_docs_page' );
	}

	add_action( 'admin_menu', 'domestic_register_docs_page' );
endif;

if ( ! function_exists( 'domestic_render_docs_page' ) ) :
	function domestic_render_docs_page() {
		$base_url    = add_query_arg( 'page', 'domestic-about', admin_url( 'themes.php' ) );
		$current_tab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : 'docs'; // phpcs:ignore
		$pages       = [
			'docs'    => __( 'Domestic Docs', 'domestic' ),
			'credits' => __( 'Credits', 'domestic' ),
		];
		?>
		<div class="wrap about-wrap full-width-layout">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<p class="about-text">About text</p>

			<div class="wp-badge">Replace!!!</div>

			<h2 class="nav-tab-wrapper wp-clearfix">
				<?php foreach ( $pages as $page => $label ) : ?>
					<a
							href="<?php echo esc_url( add_query_arg( 'tab', $page, $base_url ) ); ?>"
							class="nav-tab <?php echo $current_tab === $page ? 'nav-tab-active' : '' ?>"
					>
						<?php echo esc_html( $label ) ?>
					</a>
				<?php endforeach; ?>
			</h2>
			<div class="domestic-index">
				<h3><?php esc_html_e( 'Domestic Theme Docs', 'domestic' ); ?></h3>
				<ul class="index">
					<li><a href="#blog-slider"><?php esc_html_e( 'Blog Slider', 'domestic' ); ?></a></li>
					<li>
						<a href="#homepage"><?php esc_html_e( 'Homepage', 'domestic' ); ?></a>
						<ul>
							<li><a href="#homepage-setting"><?php esc_html_e( 'Setting a homepage', 'domestic' ); ?></a>
							</li>
							<li>
								<a href="#homepage-customize"><?php esc_html_e( 'Homepage Customizer', 'domestic' ); ?></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="inline-svg full-width">
				<p style="color:red">REPLACE IMAGE!!!</p>
				<img src="https://s.w.org/images/core/4.9/banner.svg" alt="">
			</div>

			<div class="feature-section" id="blog-slider">
				<h2><?php esc_html_e( 'Blog Slider', 'domestic' ); ?></h2>
			</div>
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi consectetur deleniti ducimus facilis fuga illum itaque laudantium, odit omnis quisquam sapiente sequi voluptatibus. Id maxime necessitatibus porro quae qui?</p>
				<p>Cupiditate debitis eum libero, magnam minima molestiae neque nesciunt praesentium quia quisquam recusandae reiciendis sit! At aut, cum error est, eveniet inventore neque nihil odio odit quibusdam, quod repudiandae sunt?</p>
				<p>Eligendi eos est eveniet nemo officia quidem suscipit. Alias aliquid deserunt dolorum enim eos eveniet fugit inventore ipsum itaque iure laboriosam modi molestiae natus possimus, quisquam rem repudiandae tempora, voluptas!</p>
				<p>Aspernatur assumenda beatae debitis doloremque ducimus eligendi illo laudantium necessitatibus obcaecati, qui, quia quibusdam repudiandae! Alias amet autem beatae dignissimos ducimus enim ipsam iste nesciunt nihil omnis sint suscipit, ut!</p>
				<p>Assumenda consequuntur debitis distinctio dolores earum esse est impedit inventore ipsum iste iure maxime nostrum obcaecati reiciendis sed suscipit, ut veritatis vero voluptas voluptatum! Aspernatur culpa enim laborum suscipit veniam.</p>
			</div>

			<div class="feature-section" id="homepage">
				<h2><?php esc_html_e( 'Homepage', 'domestic' ); ?></h2>
			</div>
			<div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi consectetur deleniti ducimus facilis fuga illum itaque laudantium, odit omnis quisquam sapiente sequi voluptatibus. Id maxime necessitatibus porro quae qui?</p>
			</div>

			<div>
				<h3 id="homepage-setting"><?php esc_html_e( 'Setting a homepage', 'domestic' ); ?></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi consectetur deleniti ducimus facilis fuga illum itaque laudantium, odit omnis quisquam sapiente sequi voluptatibus. Id maxime necessitatibus porro quae qui?</p>
				<p>Cupiditate debitis eum libero, magnam minima molestiae neque nesciunt praesentium quia quisquam recusandae reiciendis sit! At aut, cum error est, eveniet inventore neque nihil odio odit quibusdam, quod repudiandae sunt?</p>

				<h3 id="homepage-customize"><?php esc_html_e( 'Homepage Customizer', 'domestic' ); ?></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet commodi consectetur deleniti ducimus facilis fuga illum itaque laudantium, odit omnis quisquam sapiente sequi voluptatibus. Id maxime necessitatibus porro quae qui?</p>
				<p>Cupiditate debitis eum libero, magnam minima molestiae neque nesciunt praesentium quia quisquam recusandae reiciendis sit! At aut, cum error est, eveniet inventore neque nihil odio odit quibusdam, quod repudiandae sunt?</p>
			</div>


		</div>
		<style>
			ul.index li {
				line-height: 1.5rem;
			}

			ul.index li > ul {
				margin-top: 1rem;
				margin-left: 1rem;
			}
		</style>
		<?php
	}
endif;

