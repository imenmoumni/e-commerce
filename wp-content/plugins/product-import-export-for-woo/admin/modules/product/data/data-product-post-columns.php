<?php

if (!defined('WPINC')) {
    exit;
}

if (function_exists('wc_get_filename_from_url')) {
    $file_path_header = 'downloadable_files';
} else {
    $file_path_header = 'file_paths';
}


$post_columns = array(
    'post_title' => 'Product Name',
    'post_name' => 'Product Slug',
    'post_parent' => 'Parent ID',
    'ID' => 'ID',
    'post_excerpt' => 'Short Description',
    'post_content' => 'Description',
    'post_status' => 'Status',
    'post_password' => 'post_password',
    'menu_order' => 'menu_order',
    'post_date' => 'post_date',
    'post_author' => 'post_author',
    'comment_status' => 'comment_status',
    // Meta

    '_sku' => 'sku',
    'parent_sku' => 'parent_sku',
    'parent' => 'Parent Title',
    '_children' => 'children', //For Grouped products
    '_downloadable' => 'downloadable',
    '_virtual' => 'virtual',
    '_stock' => 'stock',
    '_regular_price' => 'Regular Price',
    '_sale_price' => 'Sale Price',
    '_weight' => 'weight',
    '_length' => 'length',
    '_width' => 'width',
    '_height' => 'height',
    '_tax_class' => 'tax_class',
    '_visibility' => 'visibility',
    '_stock_status' => 'stock_status',
    '_backorders' => 'backorders',
    '_sold_individually' => 'sold_individually',
    '_low_stock_amount' => 'low_stock_amount',
    '_manage_stock' => 'manage_stock',
    '_tax_status' => 'tax_status',
    '_upsell_ids' => 'upsell_ids',
    '_crosssell_ids' => 'crosssell_ids',
    '_featured' => 'featured',
    '_purchase_note' => '_purchase_note',
    '_sale_price_dates_from' => 'sale_price_dates_from',
    '_sale_price_dates_to' => 'sale_price_dates_to',
    // Downloadable products
    '_download_limit' => 'download_limit',
    '_download_expiry' => 'download_expiry',    
    // Virtual products
    '_product_url' => 'product_url',
    '_button_text' => 'button_text',



    'images' => 'Images (featured and gallery)',
    "$file_path_header" => 'Downloadable file paths',
    'product_page_url' => 'Product Page URL',
    //'taxonomies' => 'Taxonomies (cat/tags/shipping-class)',
    //'meta' => 'Meta (custom fields)',
    //'attributes' => 'Attributes',
);

if(class_exists('WPSEO_Options')){
    /* Yoast is active */

    $post_columns['meta:_yoast_wpseo_focuskw'] = 'meta:_yoast_wpseo_focuskw';
    $post_columns['meta:_yoast_wpseo_canonical'] = 'meta:_yoast_wpseo_canonical';
    $post_columns['meta:_yoast_wpseo_bctitle'] = 'meta:_yoast_wpseo_bctitle';
    $post_columns['meta:_yoast_wpseo_meta-robots-adv'] = 'meta:_yoast_wpseo_meta-robots-adv';
    $post_columns['meta:_yoast_wpseo_is_cornerstone'] ='meta:_yoast_wpseo_is_cornerstone';
    $post_columns['meta:_yoast_wpseo_metadesc'] = 'meta:_yoast_wpseo_metadesc';
    $post_columns['meta:_yoast_wpseo_linkdex'] = 'meta:_yoast_wpseo_linkdex';
    $post_columns['meta:_yoast_wpseo_estimated-reading-time-minutes'] = 'meta:yoast_wpseo_estimated-reading-time-minutes';
    $post_columns['meta:_yoast_wpseo_content_score'] = 'meta:_yoast_wpseo_focuskw';
    $post_columns['meta:_yoast_wpseo_title'] = 'meta:_yoast_wpseo_title';
    $post_columns['meta:_yoast_wpseo_metadesc'] = 'meta:_yoast_wpseo_metadesc';
    $post_columns['meta:_yoast_wpseo_metakeywords'] = 'meta:_yoast_wpseo_metakeywords';
    
}

if (function_exists( 'aioseo' )) {
    /* All in One SEO is active */

    $post_columns['meta:_aioseo_title'] = 'meta:_aioseo_title';
    $post_columns['meta:_aioseo_description'] =  'meta:_aioseo_description';
    $post_columns['meta:_aioseo_keywords'] =  'meta:_aioseo_keywords';
    $post_columns['meta:_aioseo_og_title'] =  'meta:_aioseo_og_title';
    $post_columns['meta:_aioseo_og_description'] =  'meta:_aioseo_og_description';
    $post_columns['meta:_aioseo_twitter_title'] =  'meta:_aioseo_twitter_title';
    $post_columns['meta:_aioseo_og_article_tags'] =  'meta:_aioseo_og_article_tags';
    $post_columns['meta:_aioseo_twitter_description'] =  'meta:_aioseo_twitter_description';
}

if (apply_filters('wpml_setting', false, 'setup_complete')) {

    $post_columns['wpml:language_code'] = 'wpml:language_code';
    $post_columns['wpml:original_product_id'] = 'wpml:original_product_id';
    $post_columns['wpml:original_product_sku'] = 'wpml:original_product_sku';
}

return apply_filters('wt_iew_product_post_columns',$post_columns);