<?php
/**
 *
 * @package Flydecor
 */

get_header(); 

if (!is_home() && is_front_page()) {
	$hideslide = get_theme_mod('hide_slider', '1');
	 if($hideslide == ''){   
$flydecor_pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $flydecor_pages[] = $mod;
    }	
} 
if( !empty($flydecor_pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $flydecor_pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $flydecor_slideno[] = $i;
          $flydecor_slidetitle[] = get_the_title();
		  $flydecor_slidedesc[] = get_the_excerpt();
          $flydecor_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $flydecor_slideno as $flydecor_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $flydecor_sln ); ?>" class="nivo-html-caption">
      <div class="top-bar">
        <h2><a href="<?php echo esc_url($flydecor_slidelink[$k] ); ?>"><?php echo esc_html($flydecor_slidetitle[$k] ); ?></a></h2>
        <p><?php echo esc_html($flydecor_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="slide-button" href="<?php echo esc_url($flydecor_slidelink[$k] ); ?>">
          <?php echo esc_html(get_theme_mod('slide_text',__('Read More','flydecor')));?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

  <div class="main-container">
                       <?php $hidebox = get_theme_mod('hide_section', '1'); ?>  
             <?php if($hidebox  == '') { ?>
              <?php if(get_theme_mod('page-setting1',true) != '' ) { ?>  
             <section id="pagearea">
<div class="container">
  <div class="pagearea-inner">
         <?php if(get_theme_mod('page-setting1') != '') { ?>
         	<?php $page_query = new WP_Query(array('page_id' => get_theme_mod('page-setting1'))); ?>
         		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                          <div class="one_half">
							  	<div class="thumb">
									<?php if(has_post_thumbnail()) { ?>
												<?php the_post_thumbnail(); ?>
									  <?php } ?>
								</div><!-- thumb -->
						  </div><!-- one_half -->
							<div class="one_half">
								<h5><?php the_title(); ?></h5>
								<p> <?php the_excerpt(); ?> </p>
								<a href="<?php the_permalink(); ?>" class="wel-read"><?php esc_html_e('Read More','flydecor'); ?></a>
						 	 </div><!-- one_half -->
                <?php endwhile; ?>
	  			<?php wp_reset_postdata(); ?>
                <?php } ?>
					<div class="clear"></div>
                </div><!-- .pagearea-inner -->
    </div><!-- container-->
</section>
                       <?php } }?>
                                     
       <div class="content-area">
        <div class="middle-align content_sidebar">
            <div class="site-main" id="sitemain">
				<?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content-page', get_post_format() );
						
                    endwhile;
                    // Previous/next post navigation.
                    the_posts_pagination();
					wp_reset_postdata();
                
                else :
                    // If no content, include the "No posts found" template.
                     get_template_part( 'no-results' );
                
                endif;
                ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div>
    </div>
<?php get_footer(); ?>