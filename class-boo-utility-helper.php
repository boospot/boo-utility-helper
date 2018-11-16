<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Boo_Utility_Helper
 *
 * This is utility helper class
 *
 * @version 1.0
 *
 * @author RaoAbid | BooSpot
 * @link https://github.com/boospot/boo-utility-helper
 */
if ( ! class_exists( 'Boo_Utility_Helper' ) ):

	class Boo_Utility_Helper {


		public function __construct( $config_array = null ) {

		}


		/*
		 * This widget returns the instance of widget
		 * Form should send the widget_id and $widget_number
		 */
		public static function get_widget_instance( $form_data ) {

			$widget_id = isset( $form_data['widget_id'] ) && ! empty( $form_data['widget_id'] )
				? sanitize_key( $form_data['widget_id'] )
				: false;


			$widget_number = isset( $form_data['widget_number'] ) && ! empty( $form_data['widget_number'] )
				? absint( $form_data['widget_number'] )
				: false;

			if ( ! $widget_id || ! $widget_number ) {
				return false;
			}


			$options_id       = 'widget_' . $widget_id;
			$widget_instances = get_option( $options_id, true );

			if ( $widget_instances and is_array( $widget_instances ) ) {
				$required_instance = isset( $widget_instances[ $widget_number ] ) ? $widget_instances[ $widget_number ] : false;

				unset( $options_id, $widget_instances );

				return $required_instance;
			}

			unset( $options_id, $widget_instances );

			return false;

		}

	}

endif;
