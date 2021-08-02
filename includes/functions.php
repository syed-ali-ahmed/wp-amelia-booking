<?php

if ( ! function_exists( 'aspae_purchasing_appointment_first_time' ) ) {
	function aspae_purchasing_appointment_first_time( $user_id, $provider_id ) {
		return update_user_meta( $user_id, '_amelia_provider_id', $provider_id );
	}
}

if ( ! function_exists( 'aspae_get_user_details' ) ) {
	function aspae_get_user_details( ) {
		$html = '';
		$email       = isset($_COOKIE['ameliaUserEmail']) ? sanitize_text_field( $_COOKIE['ameliaUserEmail'] ) : '';
		$user        = get_user_by( 'email', $email );
		$html .= '<input type="hidden" name="_amelia_customer_info" value="' . esc_attr( json_encode( $user ) ) . '" id="_amelia_customer_info" />';
		$provider_id = get_user_meta( $user->ID, '_amelia_provider_id', true );
		if ( $provider_id && ! empty( $provider_id ) ) {
			$html .= '<input type="hidden" name="_amelia_provider_id" value="' . $provider_id . '" id="_amelia_provider_id" />';
		}
		return $html;
	}
}