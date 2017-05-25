<?php

namespace WP_Helpers;

class Post_Type {
	/**
	 * @var string Textdomain for translations.
	 */
	static $textdomain = 'wp_helpers';

	/**
	 * Generates a custom post type.
	 *
	 * @param string $post_type Name of post type.
	 * @param string $nice_name Human readable name of post type.
	 * @param array $labels Override the default labels.
	 * @param array $args Override the default arguments.
	 */
	public static function generate( $post_type, $nice_name, $labels = array(), $args = array() ) {
		$default_labels = array(
			'name'               => esc_html_x( $nice_name, 'post type general name', self::$textdomain ),
			'singular_name'      => esc_html_x( $nice_name, 'post type singular name', self::$textdomain ),
			'menu_name'          => esc_html_x( $nice_name, 'admin menu', self::$textdomain ),
			'name_admin_bar'     => esc_html_x( $nice_name, 'add new on admin bar', self::$textdomain ),
			'add_new'            => esc_html_x( 'Add New', $nice_name, self::$textdomain ),
			'add_new_item'       => esc_html__( 'Add New ' . $nice_name, self::$textdomain ),
			'new_item'           => esc_html__( 'New ' . $nice_name, self::$textdomain ),
			'edit_item'          => esc_html__( 'Edit ' . $nice_name, self::$textdomain ),
			'view_item'          => esc_html__( 'View ' . $nice_name, self::$textdomain ),
			'all_items'          => esc_html__( 'All ' . $nice_name, self::$textdomain ),
			'search_items'       => esc_html__( 'Search ' . $nice_name, self::$textdomain ),
			'parent_item_colon'  => esc_html__( 'Parent ' . $nice_name . ':', self::$textdomain ),
			'not_found'          => esc_html__( 'None found.', self::$textdomain ),
			'not_found_in_trash' => esc_html__( 'None found in Trash.', self::$textdomain )
		);

		$labels = array_merge( $labels, $default_labels );

		$default_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( '', self::$textdomain ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => $post_type ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title' )
		);

		$args = array_merge( $default_args, $args );

		register_post_type( $post_type, $args );
	}
}