<?php

if ( ! class_exists( 'ASPAE_Booking_Controller' ) ) {
	class ASPAE_Booking_Controller {
		public function __construct() {
			$this->run();
		}

		protected function run() {
			$this->add_actions();
			$this->add_filters();
		}

		public function ajax_controller() {
			if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
//				exit( var_dump( $_REQUEST ) );
			}
		}

		protected function add_actions() {
			add_action( 'admin_init', array( $this, 'ajax_controller' ) );
		}

		protected function add_filters() {  }
	}
}

new ASPAE_Booking_Controller();

