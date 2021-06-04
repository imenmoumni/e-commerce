<?php
/**
 * WooCommerce Integration Class
 *
 * @link       http://codeamp.com
 * @since      1.0.0
 * @package    Custom_Layouts
 */

namespace Custom_Layouts\Integrations;

use Custom_Layouts\Settings;

/**
 * All WooCommerce integration functionality
 * Add options to admin, integrate with frontend queries
 */
class WooCommerce {

	/**
	 * Init
	 *
	 * @since    1.0.0
	 */
	public static function init() {
		// Add WC options to the admin UI.
		add_action( 'custom-layouts/settings/register', 'Custom_Layouts\\Integrations\\WooCommerce::register_settings', -1 );

		// add_filter( 'custom-layouts/settings/setting/data_type', 'Custom_Layouts\\Integrations\\WooCommerce::modify_data_type', -1, 2 );
		// add_filter( 'custom-layouts/settings/setting/input_type', 'Custom_Layouts\\Integrations\\WooCommerce::modify_input_type', -1, 2 );
		// add_filter( 'custom-layouts/settings/setting/hide_empty', 'Custom_Layouts\\Integrations\\WooCommerce::modify_hide_empty', -1, 2 );
	}

	/**
	 * On S&F settings register, add a new setting + update others
	 *
	 * @since    1.0.0
	 */
	public static function register_settings() {
		self::add_wc_setting();
		self::modify_data_type();
		self::modify_input_type();
		self::modify_hide_empty();
	}

	/**
	 * Add WC as a data type
	 *
	 * @since    1.0.0
	 */
	public static function modify_data_type() {

		// get the object for the data_type setting so we can grab its options.
		$data_type_setting = Settings::get_setting( 'data_type', 'filters' );

		if ( $data_type_setting ) {
			// create the option.
			$wc_data_type_option = array(
				'label' => __( 'WooCommerce', 'custom-layouts' ),
				'value' => 'plugin:woocommerce',
				'dependsOn' => array(
					'relation' => 'AND',
					array(
						'option'  => 'integration_type',
						'compare' => '=',
						'value'   => 'woocommerce_shop',
					),
				),
			);
			$data_type_setting->add_option( $wc_data_type_option, array( 'after' => 'control' ) );
		}
	}

	/**
	 * Add WC support to input types
	 *
	 * @since    1.0.0
	 */
	public static function modify_input_type() {

		// Get the object for the input_type setting so we can update it.
		$input_type_setting = Settings::get_setting( 'input_type', 'filters' );

		// We want to change the dependsOn conditions of the individual options, and add support for WC.
		if ( $input_type_setting ) {

			// Create a map of input type options and conditions we want to add.
			$depends_options = array(
				'input_type_options' => array( 'choice_select', 'choice_radio', 'choice_checkbox', 'choice_link', 'choice_button' ),
				'supports'  => array( 'wc_product_cat', 'wc_product_tag' ),
			);

			foreach ( $depends_options['input_type_options'] as $input_type ) {
				// Lookup the input type option in the choice options.
				$input_type_option = $input_type_setting->get_option( $input_type, array( 'parent' => 'choice' ) );

				foreach ( $depends_options['supports'] as $depends_value ) {
					$depends_condition = array(
						'option'  => 'data_woocommerce',
						'compare' => '=',
						'value'   => $depends_value,
					);

					// Add the condition.
					array_push( $input_type_option['dependsOn'], $depends_condition );
				}

				// Update the option with the new data.
				$input_type_setting->update_option( $input_type, $input_type_option, array( 'parent' => 'choice' ) );
			}
		}
	}

	/**
	 * Allow WC taxonomies to use the `hide_empty` setting
	 *
	 * @since    1.0.0
	 */
	public static function modify_hide_empty() {
		// get the object for the hide_empty setting so we can update it.
		$hide_empty_setting = Settings::get_setting( 'hide_empty', 'filters' );
		$setting_data = $hide_empty_setting->get_data();

		if ( ! $hide_empty_setting ) {
			return;
		}

		if ( ! isset( $setting_data['dependsOn'] ) ) {
			return;
		}

		if ( ! isset( $setting_data['dependsOn'][1] ) ) {
			return;
		}

		// We want to change the dependsOn conditions of the individual options in the setting
		// and add support for WC.
		$depends_condition_1 = array(
			'option'  => 'data_woocommerce',
			'compare' => '=',
			'value'   => 'wc_product_tag',
		);

		$depends_condition_2 = array(
			'option'  => 'data_woocommerce',
			'compare' => '=',
			'value'   => 'wc_product_cat',
		);

		array_push( $setting_data['dependsOn'][1], $depends_condition_1 );
		array_push( $setting_data['dependsOn'][1], $depends_condition_2 );

		$hide_empty_setting->update( $setting_data );
	}

	/**
	 * Creates a WC setting which is only shown when the WC data_type
	 * is selected
	 *
	 * @since    1.0.0
	 */
	public static function add_wc_setting() {
		$setting = array(
			'name'        => 'data_woocommerce',
			'label'       => __( 'Data Source', 'custom-layouts' ),
			// 'description' => __( 'Select a WooCommerce data type', 'custom-layouts' ),
			'tab'         => 'basic',
			'type'        => 'Select2',
			'placeholder' => __( 'Choose WooCommerce source', 'custom-layouts' ),
			'options'     => array(
				array(
					'label' => __( 'Product Tags', 'custom-layouts' ),
					'value' => 'wc_product_tag',
				),
				array(
					'label' => __( 'Product Categories', 'custom-layouts' ),
					'value' => 'wc_product_cat',
				),
				array(
					'label' => __( 'Price', 'custom-layouts' ),
					'value' => 'wc_price',
				),
				/* array(
					'label' => __( 'In Stock', 'custom-layouts' ),
					'value' => '6',
				), */
			),
			'dependsOn' => array(
				'relation' => 'AND',
				array(
					'option'  => 'data_type',
					'compare' => '=',
					'value'   => 'plugin:woocommerce',
				),
			),
		);

		$args = array(
			'setting'  => $setting,
			'section' => 'filters',
			'after'   => 'data_type', // Add it right after the `data_type` setting.
		);

		Settings::register_setting( $args );
	}
}
