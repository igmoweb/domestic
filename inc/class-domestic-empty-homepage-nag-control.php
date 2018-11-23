<?php

if ( ! class_exists( 'Domestic_Empty_Homepage_Nag_Control' ) ) {
	class Domestic_Empty_Homepage_Nag_Control extends WP_Customize_Control {
		/**
		 * Control's Type.
		 *
		 * @since 3.4.0
		 * @var string
		 */
		public $type = 'textarea';

		protected function render_content() {
			?>
			<p><?php echo $this->value(); ?></p>
			<?php
		}
	}
}
