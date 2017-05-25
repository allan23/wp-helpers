<?php

namespace WP_Helpers;

class Form {
	/**
	 * @param array $field_data Array of field data (id, label, and value)
	 *
	 * @return string
	 */
	public static function generate( $field_data ) {
		$field_data['type'] = ( isset( $field_data['type'] ) ) ? $field_data['type'] : 'text';

		$value = get_post_meta( get_the_ID(), $field_data['id'], true );

		switch ( $field_data['type'] ) {
			case 'text':
				return self::text( $field_data['id'], $field_data['label'], $value );
				break;
			case 'textarea':
				return self::textarea( $field_data['id'], $field_data['label'], $value );
				break;
		}
	}

	/**
	 * Generates HTML for text input field.
	 *
	 * @param string $id
	 * @param string $label
	 * @param string $value
	 *
	 * @return string
	 */
	private static function text( $id, $label, $value = '' ) {
		return '<p><label for="dp_' . esc_attr( $id ) . '">' . esc_html( $label ) . ': </label><input type="text" name="' . esc_attr( $id ) . '" value="' . esc_attr( $value ) . '" id="dp_' . esc_attr( $id ) . '"></p>';
	}

	/**
	 * Generates HTML for textarea field.
	 *
	 * @param string $id
	 * @param string $label
	 * @param string $value
	 *
	 * @return string
	 */
	private static function textarea( $id, $label, $value = '' ) {
		return '<p><label>' . esc_html( $label ) . ': </label><textarea name="' . esc_attr( $id ) . '">' . esc_textarea( $value ) . '</textarea></p>';
	}
}