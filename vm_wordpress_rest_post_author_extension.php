<?php
/**
 * Plugin Name:     vmpublishing/vm_wordpress_rest_post_author_extension
 * Plugin URI:      github.com/vmpublishing/vm_wordpress_rest_post_author_extension
 * Description:     attached the author name to the wordpress rest api v2 post show call
 * Author:          Dirk Gustke
 * Text Domain:     vmpublishing/vm_wordpress_rest_post_author_extension
 * Version:         0.1.0
 *
 * @package         vmpublishing/vm_wordpress_rest_post_author_extension
 */




 function _vwrpae_add_author_name_to_post_show() {
     register_rest_field('post', 'author_name', array(
         'get_callback' => function($post) {
             return get_the_author_meta('display_name', $post['author']);
         },
         'scheme' => array(
             'author_name' => __('author name'),
             'type'        => 'text',
         ),
     ));
 }
 add_action('rest_api_init', '_vwrpae_add_author_name_to_post_show', 9);
