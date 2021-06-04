<?php
/**
 * The Header for our theme.
 * @package Ecommerce Hub
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  }?>
  <?php if(get_theme_mod('ecommerce_hub_preloader',true)){ ?>
    <?php if(get_theme_mod( 'ecommerce_hub_preloader_type','Square') == 'Square'){ ?>
      <div id="overlayer"></div>
      <span class="tg-loader">
        <span class="tg-loader-inner"></span>
      </span>
    <?php }else if(get_theme_mod( 'ecommerce_hub_preloader_type') == 'Circle') {?>    
      <div class="preloader text-center">
        <div class="preloader-container">
          <span class="animated-preloader"></span>
        </div>
      </div>
    <?php }?>
  <?php }?>
  <header role="banner" class="header">
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'ecommerce-hub' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to Content', 'ecommerce-hub' ); ?></span></a>
    <?php if(get_theme_mod('ecommerce_hub_top_header',true)){ ?>
      <div class="social-icon">
        <div class="container">
          <div class="top-header">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <?php if ( get_theme_mod('ecommerce_hub_welcome','') != "" ) {?>
                  <div class="welcome">
                    <?php if ( get_theme_mod('ecommerce_hub_welcome','') != "" ) {?>
                      <p class="py-2 m-0 text-md-left text-center"><?php echo esc_html( get_theme_mod('ecommerce_hub_welcome','') ); ?></p>
                    <?php }?>
                  </div>
                <?php }?>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="social-media py-2 text-md-right text-center">
                  <?php if( get_theme_mod( 'ecommerce_hub_facebook' ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_facebook','' ) ); ?>" class="px-1"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'ecommerce-hub' ); ?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'ecommerce_hub_pintrest' ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_pintrest','' ) ); ?>" class="px-1"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'ecommerce-hub' ); ?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'ecommerce_hub_rss') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_rss','' ) ); ?>" class="px-1"><i class="fa fa-rss"></i><span class="screen-reader-text"><?php esc_html_e( 'RSS', 'ecommerce-hub' ); ?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'ecommerce_hub_twitter' ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_twitter','' ) ); ?>" class="px-1"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'ecommerce-hub' ); ?></span></a>
                  <?php } ?>
                  <?php if( get_theme_mod( 'ecommerce_hub_youtube' ) != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'ecommerce_hub_youtube','' ) ); ?>" class="px-1"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube', 'ecommerce-hub' ); ?></span></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div> 
    <?php }?>
    <div id="top-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12">
            <div class="logo p-2 text-lg-left text-center">
              <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if( get_theme_mod('ecommerce_hub_show_site_title',true) != ''){ ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php else : ?>
                    <p class="site-title m-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php endif; ?>
                <?php }?>
              <?php endif; ?>
              <?php if( get_theme_mod('ecommerce_hub_show_tagline',true) != ''){ ?>
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                  ?>
                    <p class="site-description m-0">
                      <?php echo esc_html($description); ?>
                    </p>
                  <?php endif; ?>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-6 col-md-9">
            <div class="search-box mt-4">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <?php if(class_exists('woocommerce')){ ?>
                    <?php get_product_search_form()?>
                  <?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?> 
                </div>
                <div class="col-lg-6 col-md-6">
                  <?php if(class_exists('woocommerce')){ ?>
                    <button role="tab" class="product-btn py-2"><?php echo esc_html_e('All Categories','ecommerce-hub'); ?><i class="fa fa-caret-down my-2 px-4" aria-hidden="true"></i></button>
                    <div class="product-cat">
                      <?php
                        $args = array(
                         //'number'     => $number,
                         'orderby'    => 'title',
                         'order'      => 'ASC',
                         'hide_empty' => 0,
                         'parent'  => 0
                         //'include'    => $ids
                        );
                       $product_categories = get_terms( 'product_cat', $args );
                       $count = count($product_categories);
                        if ( $count > 0 ){
                          foreach ( $product_categories as $product_category) {
                          $cats_id   = $product_category->term_id;
                          $cat_link = get_category_link( $cats_id );
                          if ($product_category->category_parent == 0) { ?>
                          <li class="drp_dwn_menu py-2 mx-3"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                          <?php
                          }
                          echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
                          <?php
                          }
                        }
                      ?>
                    </div>
                  <?php }else {
                  echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-lg-1 col-md-1">
            <?php if(class_exists('woocommerce')){ ?>
            <li class="cart_box">
              <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span>
            </li>
            <span class="cart_no">
              <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><img role="img" src="<?php echo esc_url(get_template_directory_uri().'/images/shopping-cart.png'); ?>" alt="<?php esc_attr_e( 'Cart Image', 'ecommerce-hub' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Cart Image', 'ecommerce-hub' ); ?></span></a>
            </span>
            <?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','ecommerce-hub').'<h6>'; }?>
          </div>
          <div class="col-lg-2 col-md-2">
            <div class="account mt-md-4 mt-0 pt-2 p-md-0 p-2 text-md-left text-center">
              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-out-alt"></i><?php esc_html_e('Logout','ecommerce-hub'); ?><span class="screen-reader-text"><?php esc_html_e( 'Logout', 'ecommerce-hub' ); ?></span></a>
              <?php } 
              else { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('Login','ecommerce-hub'); ?><span class="screen-reader-text"><?php esc_html_e( 'Login', 'ecommerce-hub' ); ?></span></a>
              <?php } ?>
            </div>
          </div>
        </div>  
      </div>
    </div>  
    <?php if (has_nav_menu('primary')){ ?>
      <div class="toggle-menu responsive-menu p-2">
        <button role="tab"><i class="fas fa-bars mr-2"></i><?php esc_html_e('Menu','ecommerce-hub'); ?><span class="screen-reader-text"><?php esc_html_e('Menu','ecommerce-hub'); ?></span></button>
      </div>
    <?php }?>
    <div id="header" class="<?php if( get_theme_mod( 'ecommerce_hub_sticky_header') != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="menu-sec">
          <div class="row">
            <div class="menubox col-lg-7 col-md-0 p-0">
              <div id="sidelong-menu" class="nav side-nav">
                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'ecommerce-hub' ); ?>">
                  <?php if (has_nav_menu('primary')){
                    wp_nav_menu( array( 
                      'theme_location' => 'primary',
                      'container_class' => 'main-menu-navigation clearfix' ,
                      'menu_class' => 'clearfix',
                      'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                      'fallback_cb' => 'wp_page_menu',
                    ) ); 
                  } ?>
                  <a href="javascript:void(0)" class="closebtn responsive-menu p-1"><?php esc_html_e('Close Menu','ecommerce-hub'); ?><i class="fas fa-times-circle m-3"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','ecommerce-hub'); ?></span></a>
                </nav>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="contact-details py-2 text-md-left text-center">
                <div class="row">
                  <?php if ( get_theme_mod('ecommerce_hub_email_text','') != "" ) {?>
                    <div class="col-lg-2 col-md-2 p-0">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 p-0">
                      <?php if ( get_theme_mod('ecommerce_hub_email_text','') != "" ) {?>
                        <p class="bold-font px-1"><?php echo esc_html( get_theme_mod('ecommerce_hub_email_text','') ); ?></p>
                      <?php }?>
                      <?php if ( get_theme_mod('ecommerce_hub_email','') != "" ) {?>
                        <p class="px-1 mb-0"><a href="mailto:<?php echo esc_attr( get_theme_mod('ecommerce_hub_email','') ); ?>"><?php echo esc_html( get_theme_mod('ecommerce_hub_email','') ); ?><span class="screen-reader-text"><?php esc_html_e('Email', 'ecommerce-hub') ?></span></a></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-6">
              <div class="contact-details py-2 text-md-left text-center">
                <div class="row">
                  <?php if ( get_theme_mod('ecommerce_hub_call_text','') != "" ) {?>
                    <div class="col-lg-2 col-md-2 p-0">
                      <i class="fas fa-user"></i>
                    </div>
                    <div class="col-lg-10 col-md-10 p-0">
                      <?php if ( get_theme_mod('ecommerce_hub_call_text','') != "" ) {?>
                        <p class="bold-font px-1"><?php echo esc_html( get_theme_mod('ecommerce_hub_call_text','' )); ?></p>
                      <?php }?>
                      <?php if ( get_theme_mod('ecommerce_hub_call_number','') != "" ) {?>
                        <p class="px-1 mb-0"><a href="tel:<?php echo esc_attr( get_theme_mod('ecommerce_hub_call_number','') ); ?>"><?php echo esc_html( get_theme_mod('ecommerce_hub_call_number','' )); ?><span class="screen-reader-text"><?php esc_html_e('Phone Number', 'ecommerce-hub') ?></span></a></p>
                      <?php }?>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php if(get_theme_mod('ecommerce_hub_post_featured_image') == 'banner' ){
    if( is_singular() ) {?>
      <div id="page-site-header">
        <div class='page-header'> 
          <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
      </div>
    <?php }
  }?>