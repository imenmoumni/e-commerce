<?php
/**
 * The template for displaying all pages.
 * @package Ecommerce Hub
 */
get_header(); ?>

<?php do_action('ecommerce_hub_page_header'); ?>

<main id="maincontent" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="title-box py-5 mb-3">
        	<div class="container">
        		<h1 class="text-center"><?php the_title(); ?></h1>
        	</div>
        </div>
        <div class="container">
            <?php $ecommerce_hub_page_layout = get_theme_mod( 'ecommerce_hub_single_page_layout','One Column');
            if($ecommerce_hub_page_layout == 'One Column'){ ?>
                <div id="wrapper">
                    <div class="main-wrap-box py-4"> 
                        <?php if(get_theme_mod('ecommerce_hub_single_post_breadcrumb',true) != ''){ ?>
                            <div class="bradcrumbs">
                                <?php ecommerce_hub_the_breadcrumb(); ?>
                            </div>
                        <?php }?>
                        <div class="feature-box">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="entry-content"><?php the_content(); ?> </div>
                        <?php wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'ecommerce-hub' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span class="page-number py-2 px-3">',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ecommerce-hub' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                        )   ); ?>       
                        <div class="clearfix"></div>    
                    </div>
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
            <?php }else if($ecommerce_hub_page_layout == 'Left Sidebar'){ ?>
                <div class="row">
                    <div  id="sidebar" class="col-lg-3 col-md-4">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div id="wrapper">
                            <div class="main-wrap-box py-4"> 
                                <?php if(get_theme_mod('ecommerce_hub_single_post_breadcrumb',true) != ''){ ?>
                                    <div class="bradcrumbs">
                                        <?php ecommerce_hub_the_breadcrumb(); ?>
                                    </div>
                                <?php }?> 
                                <div class="feature-box">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="entry-content"><?php the_content(); ?> </div>
                                <?php wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'ecommerce-hub' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-number py-2 px-3">',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ecommerce-hub' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                )   ); ?>       
                                <div class="clearfix"></div>    
                            </div>
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            ?>
                        </div>
                    </div>
                </div>
            <?php }else if($ecommerce_hub_page_layout == 'Right Sidebar'){ ?>
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div id="wrapper">
                            <div class="main-wrap-box py-4"> 
                                <?php if(get_theme_mod('ecommerce_hub_single_post_breadcrumb',true) != ''){ ?>
                                    <div class="bradcrumbs">
                                        <?php ecommerce_hub_the_breadcrumb(); ?>
                                    </div>
                                <?php }?> 
                                <div class="feature-box">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="entry-content"><?php the_content(); ?> </div>
                                <?php wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title p-3">' . __( 'Pages:', 'ecommerce-hub' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span class="page-number py-2 px-3">',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'ecommerce-hub' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                )   ); ?>       
                                <div class="clearfix"></div>    
                            </div>
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    comments_template();
                                }
                            ?>
                        </div>
                    </div>
                    <div  id="sidebar" class="col-lg-3 col-md-4">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                    </div>
                </div>
            <?php }?>
        </div>
    <?php endwhile; // end of the loop. 
    wp_reset_postdata();?>
</main>

<?php do_action('ecommerce_hub_page_left_footer'); ?>

<?php get_footer(); ?>