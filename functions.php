<?php

/** Required for Foundation to work properly */
require_once 'inc/foundation.php';

/** Format comments */
require_once 'inc/class-domestic-walker-comments.php';

/** Register all navigation menus */
require_once 'inc/navigation.php';

/** Add menu walkers for top-bar and off-canvas */
require_once 'inc/class-domestic-walker-top-bar.php';
require_once 'inc/class-domestic-walker-mobile-menu.php';

/** Create widget areas in sidebar and footer */
require_once 'inc/widget-areas.php';

/** Enqueue scripts */
require_once 'inc/enqueue-scripts.php';

/** Add theme support */
require_once 'inc/theme-support.php';

/** Add Nav Options to Customer */
require_once 'inc/customizer.php';


require_once 'inc/jetpack.php';

/** Change WP's sticky post class */
require_once 'inc/sticky-slider.php';

/** Configure responsive image sizes */
require_once 'inc/images.php';

require_once 'inc/content.php';

/** WP Editor setup */
require_once 'inc/wp-editor.php';

require_once 'inc/front-page.php';
