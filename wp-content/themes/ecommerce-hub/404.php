<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package Ecommerce Hub
 */
get_header(); ?>

<div class="container">
    <main id="maincontent" role="main" class="page-content">
		<div class="notfound py-3 text-center">
			<?php if(get_theme_mod('ecommerce_hub_404_title','404 Not Found')){ ?>
				<h1><?php echo esc_html( get_theme_mod('ecommerce_hub_404_title',__('404 Not Found', 'ecommerce-hub' )) ); ?></h1>
			<?php }?>
			<?php if(get_theme_mod('ecommerce_hub_404_button_label','404 Not Found')){ ?>
				<div class="read-moresec">
	        		<a href="<?php echo esc_url( home_url() ); ?>" class="button py-2 px-4"><?php echo esc_html( get_theme_mod('ecommerce_hub_404_button_label',__('Return to the home page', 'ecommerce-hub' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('ecommerce_hub_404_button_label',__('Return to the home page', 'ecommerce-hub' )) ); ?></span></a>
				</div>
			<?php }?>
		</div>
		<div class="clearfix"></div>
    </main>
</div>
	
<?php get_footer(); ?>