<?php
/**
 * The walker to display comments
 *
 * It allows to inject some classes needed for Foundation CSS framework
 *
 * @package Domestic
 * @since 1.0.0
 */

if ( ! class_exists( 'Domestic_Walker_Comments' ) ) {
	class Domestic_Walker_Comments extends Walker_Comment {

		// Init classwide variables.
		public $tree_type = 'comment';

		// Comment ID
		public $db_fields = [
			'parent' => 'comment_parent',
			'id'     => 'comment_ID',
		];

		/** START_LVL
		 * Starts the list before the CHILD elements are added. */
		function start_lvl( &$output, $depth = 0, $args = [] ) {
			$GLOBALS['comment_depth'] = $depth + 1; ?>

			<ul class="children">
			<?php
		}

		/** END_LVL
		 * Ends the children list of after the elements are added. */
		function end_lvl( &$output, $depth = 0, $args = [] ) {
			$GLOBALS['comment_depth'] = $depth + 1;
			?>

			</ul><!-- /.children -->

			<?php
		}

		/** START_EL */
		function start_el( &$output, $comment, $depth = 0, $args = [], $id = 0 ) {
			$depth ++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment']       = $comment;
			$parent_class             = ( empty( $args['has_children'] ) ? '' : 'parent' );
			?>

			<li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID(); ?>">
			<article id="comment-body-<?php comment_ID(); ?>" class="comment-body">


				<header class="comment-author">

					<div class="avatar-wrap">
						<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
					</div>

					<div class="author-meta vcard author">

						<div class="comment-author-link">
							<?php echo get_comment_author_link(); ?>
						</div>
						<time datetime="<?php comment_date( 'c' ); ?>">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php printf( get_comment_date(), get_comment_time() ); ?>
							</a>
						</time>

					</div><!-- /.comment-author -->

					<div class="reply">
						<?php
						$reply_args = [
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						];

						comment_reply_link( array_merge( $args, $reply_args ) );
						?>
					</div><!-- /.reply -->

				</header>

				<section id="comment-content-<?php comment_ID(); ?>" class="comment">
					<?php if ( ! $comment->comment_approved ) : ?>
						<div class="notice">
							<p class="bottom"><?php _e( 'Your comment is awaiting moderation.', 'domestic' ); ?></p>
						</div>
						<?php
					else :
						comment_text();
						?>
					<?php endif; ?>
				</section><!-- /.comment-content -->

				<div class="comment-meta comment-meta-data hide">
					<a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ); ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
				</div><!-- /.comment-meta -->

			</article><!-- /.comment-body -->

			<?php
		}

		function end_el( & $output, $comment, $depth = 0, $args = [] ) {
			?>

			</li><!-- /#comment-' . get_comment_ID() . ' -->

			<?php
		}
	}
}
