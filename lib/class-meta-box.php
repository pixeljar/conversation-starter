<?php
/**
 * Meta Box handler.
 *
 * @package PJ_Conversation_Starter
 */

namespace PJ_Conversation_Starter;

/**
 * Undocumented class
 */
class Meta_Box {

	/**
	 * The hooks for this class.
	 */
	public static function hooks() {

		/* Use the admin_menu action to define the custom boxes */
		add_action( 'admin_menu', [ __CLASS__, 'add_meta_box' ] );
		add_action( 'save_post', [ __CLASS__, 'save_meta_data' ], 1, 2 );

	}

	/**
	 * Adds meta box to the post editing screen.
	 *
	 * @return void
	 */
	public static function add_meta_box() {

		\add_meta_box(
			'pj_convo_starter_metabox',
			__( 'Conversation Starter - Prompt', 'pj-convo' ),
			[ __CLASS__, 'meta_box_markup' ],
			'post',
			'normal',
			'high'
		);

	}

	/**
	 * The markup for the meta box.
	 *
	 * @return void
	 */
	public static function meta_box_markup() {

		global $post;

		$promptext = get_post_meta( $post->ID, 'prompt', true );

		if ( empty( $promptext ) ) {

			$promptext = \PJ_Conversation_Starter\Helpers::get_default_prompt_text(); // "What do you think about this post?";

		}

		?>
		<label for="promptext"><?php esc_html_e( 'Use this text to prompt the readers:', 'pj-convo' ); ?></label><br />
		<textarea rows="5" cols="35" name="promptext" id="promptext"><?php echo esc_textarea( $promptext ); ?></textarea><br />
		<?php
	}

	/**
	 * Saves the meta box data.
	 *
	 * @param int    $post_id The post ID.
	 * @param object $post The post object.
	 * @return int
	 */
	public static function save_meta_data( $post_id, $post ) {

		// Is the user allowed to edit the post or page?
		if (
			isset( $_POST['post_type'] ) && 'page' === sanitize_text_field( wp_unslash( $_POST['post_type'] ) ) &&
			! current_user_can( 'edit_page', $post_id )
		) {

			return $post_id;

		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {

			return $post_id;

		}

		$mydata['prompt'] = '';
		if ( isset( $_POST['promptext'] ) ) {

			$mydata['prompt'] = sanitize_textarea_field( wp_unslash( $_POST['promptext'] ) );

		}

		foreach ( $mydata as $key => $value ) { // Let's cycle through the $mydata array!

			if ( 'revision' === $post->post_type ) {
				return; // don't store custom data twice.
			}

			$value = implode( ',', (array) $value ); // If $value is an array, make it a CSV (unlikely).
			if ( get_post_meta( $post_id, $key, false ) ) { // If the custom field already has a value.

				update_post_meta( $post_id, $key, $value );

			} else { // If the custom field doesn't have a value.

				add_post_meta( $post_id, $key, $value );
			}

			if ( ! $value ) {
				delete_post_meta( $post_id, $key ); // Delete if blank.
			}

		}

	}

}

Meta_Box::hooks();
