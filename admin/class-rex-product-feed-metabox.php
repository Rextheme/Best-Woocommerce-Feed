<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://rextheme.com
 * @since      1.0.0
 *
 * @package    Rex_Product_Metabox
 * @subpackage Rex_Product_Feed/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines all the Metaboxes for Products
 *
 * @package    Rex_Product_Metabox
 * @subpackage Rex_Product_Feed/admin
 * @author     RexTheme <info@rextheme.com>
 */
class Rex_Product_Metabox {

  private $prefix = 'rex_feed_';

  /**
   * Register all metaboxes.
   *
   * @since    1.0.0
   */
  public function register() {
    $this->products();
  }

  /**
   * Metabox for Google Merchant.
   *
   * @since    1.0.0
   */
  private function products(){

    /**
     * Products Selection Metabox
     */
    $box = new_cmb2_box( array(
      'id'            => $this->prefix . 'metabox',
      'title'         => esc_html__( 'Products', 'rex-product-feed' ),
      'object_types'  => array( 'product-feed', ), // Post type
    ) );

    $box->add_field( array(
      'name'             => __('Products', 'rex-product-feed' ),
      'desc'             => __('Select products to create feed for.', 'rex-product-feed' ),
      'id'               => $this->prefix . 'products',
      'type'             => 'select',
      'show_option_none' => false,
      'default'          => 'all',
      'options'          => array(
        'all'    => __( 'All Products', 'rex-product-feed' ),
        'cats'   => __( 'Map Category', 'rex-product-feed' ),
        'tags'   => __( 'Map Tag', 'rex-product-feed' ),
        'custom' => __( 'Custom', 'rex-product-feed' ),
      ),
    ) );

    $box->add_field( array(
      'name'           => 'Product Category',
      'desc'           => 'Description Goes Here',
      'id'             => 'wiki_test_taxonomy_multicheck',
      'taxonomy'       => 'product_cat', //Enter Taxonomy Slug
      'type'           => 'taxonomy_multicheck',
      'text'           => array(
        'no_terms_text' => 'Sorry, no product categories could be found.'
      ),
      'attributes' => array(
        'required'               => true, // Will be required only if visible.
        'data-conditional-id'    => $this->prefix . 'products',
        'data-conditional-value' => 'cats',
      ),
    ) );

    $box->add_field( array(
      'name'           => 'Product Tag',
      'desc'           => 'Description Goes Here',
      'id'             => 'tag',
      'taxonomy'       => 'product_tag', //Enter Taxonomy Slug
      'type'           => 'taxonomy_multicheck',
      'text'           => array(
        'no_terms_text' => 'Sorry, no product tags could be found.'
      ),
      'attributes' => array(
        'required'               => true, // Will be required only if visible.
        'data-conditional-id'    => $this->prefix . 'products',
        'data-conditional-value' => 'tags',
      ),
    ) );

  }

}
