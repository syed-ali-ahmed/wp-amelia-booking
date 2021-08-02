<?php
/**
 * File: class-sp-init.php
 * Class: SP_Init
 *
 * @package Starter_Plugin
 */

if ( ! class_exists( 'ASPAE_Init' ) ) {
	/**
	 * Class SP_Init
	 */
	class ASPAE_Init {
		protected $file;

		/**
		 * SP_Init constructor.
		 */
		public function __construct() {
			$this->run();
		}

		/**
		 * Main function.
		 */
		protected function run() {
			$this->required_files();
			$this->add_actions();
			$this->add_filters();
			do_action( 'aspae_init', __CLASS__ );
		}

		public function file_error() {
			?>
			<div class="notice notice-error">
				<p>
					<strong><?php esc_attr_e( 'File not found: ', 'sp' ); ?></strong>
					<?php echo esc_attr( $this->file ); ?>
					<?php esc_attr_e( '!', 'sp' ); ?>
				</p>
			</div>
			<?php
		}

		/**
		 * Including files.
		 *
		 * @param string $file File path.
		 */
		protected function file($file ) {
			if ( file_exists( $file ) ) {
				require_once $file;
			} else {
				$this->file = $file;
				add_action( 'admin_notices', array( $this, 'file_error' ) );
			}
		}

		/**
		 * Required Files.
		 */
		protected function required_files() {
		    $this->file( ASPAE_DIR_PATH . 'vendor/autoload.php' );
			$this->file( ASPAE_DIR_PATH . 'includes/functions.php' );
			$this->file( ASPAE_DIR_PATH . 'includes/classes/class-aspae-booking-controller.php' );
		}

		/**
		 * WP enqueue scripts.
		 */
		public function wp_enqueue_scripts() {

		    wp_enqueue_script( ASPAE_TEXT_DOMAIN . '-frontend-js', ASPAE_DIR_URL . 'assets/js/frontend.js', [ 'jquery' ], ASPAE_VERSION, true );
		    wp_localize_script( ASPAE_TEXT_DOMAIN . '-frontend-js', 'aspae_front_js_obj', [
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
            ] );
        }

		/**
		 * Admin enqueue scripts.
		 *
		 * @param string $hook Page hook.
		 */
		public function admin_enqueue_scripts( $hook ) {  }

		public function aspae_ajax_init() {  }


		/**
		 * Add Actions.
		 */
		protected function add_actions() {
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

			add_action( 'wp_ajax_aspae_ajax_init', array( $this, 'aspae_ajax_init') );
			add_action( 'wp_ajax_nopriv_aspae_ajax_init', array( $this, 'aspae_ajax_init' ), 10, 3 );
		}

		public function edit_shortcode_tag( $output, $tag, $attr, $m ){
		    $html = aspae_get_user_details();
		    return $output . ' ' . $html;
		}

		/**
		 * Add Filters.
		 */
		protected function add_filters() {
		    add_filter( 'do_shortcode_tag', array( $this, 'edit_shortcode_tag' ), 10, 4 );
        }
	}
}

return 'ASPAE_Init';
