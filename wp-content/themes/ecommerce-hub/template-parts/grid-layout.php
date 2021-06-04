<?php
/**
 * The template part for displaying services
 * @package Ecommerce Hub
 * @subpackage ecommerce_hub
 * @since 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<div class="col-lg-4 col-md-4">
  <article class="blog-sec p-2 mb-4">
    <div class="mainimage">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <h2><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if(get_the_excerpt()) { ?>
      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( ecommerce_hub_string_limit_words( $excerpt, esc_attr(get_theme_mod('ecommerce_hub_post_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('ecommerce_hub_button_excerpt_suffix','...') ); ?></p></div>
    <?php }?>
    <?php if ( get_theme_mod('ecommerce_hub_blog_button_text','Read Full') != '' ) {?>
      <div class="blogbtn mt-3">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small hvr-sweep-to-right" ><?php echo esc_html( get_theme_mod('ecommerce_hub_blog_button_text',__('Read Full', 'ecommerce-hub')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('ecommerce_hub_blog_button_text',__('Read Full', 'ecommerce-hub')) ); ?></span></a>
      </div>
    <?php }?>
  </article>
</div>