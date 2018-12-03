<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Domestic
 * @since Domestic 1.0.0
 */

if ( have_comments() ) :
	?>
	<section id="comments">
		<h3 class="comments-head-title">
			<?php
				$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: Post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'domestic' ), get_the_title() ); /* WPCS: XSS OK */
			} else {
				printf(
					/* translators: %1$s: Number of replies, %2$s: Post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'domestic'
					),
					esc_html( number_format_i18n( $comments_number ) ),
					get_the_title() // WPCS: XSS OK.
				);
			}
			?>
		</h3>
		<ol class="comment-list">
			<?php

			wp_list_comments(
				[
					'max_depth'         => '',
					'style'             => 'ol',
					'callback'          => null,
					'end-callback'      => null,
					'type'              => 'all',
					'reply_text'        => __( 'Reply', 'domestic' ),
					'page'              => '',
					'per_page'          => '',
					'avatar_size'       => 60,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'html5',
					'short_ping'        => false,
					'echo'              => true,
					'moderation'        => __( 'Your comment is awaiting moderation.', 'domestic' ),
				]
			);

			?>
		</ol>

		<?php
		// Show comment navigation.
		if ( have_comments() ) :
			$comments_text = __( 'Comments', 'domestic' );
			the_comments_navigation(
				[
					'prev_text' => sprintf( '%s <span class="nav-prev-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>', '', __( 'Previous', 'domestic' ), __( 'Comments', 'domestic' ) ),
					'next_text' => sprintf( '<span class="nav-next-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span> %s', __( 'Next', 'domestic' ), __( 'Comments', 'domestic' ), '' ),
				]
			);
		endif;
		?>
	</section>
	<?php
endif;
?>

<?php

	/*
	Do not delete these lines.
	Prevent access to this file directly
	*/

	defined( 'ABSPATH' ) || die( esc_html__( 'Please do not load this page directly. Thanks!', 'domestic' ) );

if ( post_password_required() ) {
	?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'domestic' ); ?></p>
		</div>
	</section>
	<?php
	return;
}
?>

<?php
if ( comments_open() ) :
	if ( ( is_page() || is_single() ) && ( ! is_home() && ! is_front_page() ) ) :
		?>
<section id="respond-wrap">
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
			<p>
				<?php esc_html_e( 'You must be logged in to post a comment.', 'domestic' ); ?>
			</p>
	<?php else : ?>
		<?php comment_form(); ?>
	<?php endif; // If registration required and not logged in. ?>
</section>
		<?php
	endif; // If you delete this the sky will fall on your head.
	endif; // If you delete this the sky will fall on your head.
