<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php 

$args = array(
    'numberposts' => 2,
    'offset' => 0,
    'category' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post',
    'post_status' => 'publish',
    'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args );

$author = get_the_author(); 

 ?>




<?php $sbs_theme_options = get_option('sbs_theme_options'); 

  //  echo "<pre>";print_r($sbs_theme_options);exit;

?>



	<footer class="footer">
    	<div class="container clearfix">
                


                <?php if(!empty($sbs_theme_options['sbs_footer_address'])){

                echo htmlspecialchars_decode(stripslashes(str_replace('#TEMPLATE_URI#',get_template_directory_uri(),$sbs_theme_options['sbs_footer_address'])),ENT_QUOTES);

                }

                ?>
            
            <div class="Fcol">
            	<h5>ABOUT US</h5>
				
                <nav class="footerNav">
                <?php wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'clearfix',
                    'container' => null,
                 ) ); ?>
            </nav>
            </div>
            
            <div class="Fcol">
            	<h5>INSTAGRAM</h5>
                
            </div>    
            
            <div class="Fcol">
            	<h5>RECENT POSTS</h5>
                <div class="blogEntries">
                	<ul class="clearfix">
                    <?php
                        foreach( $recent_posts as $recent ){
    
                            $dt = new DateTime($recent['post_date']);
                            $month = $dt->format('M');
                            $date = $dt->format('d');
                           
                           
                             echo '<li><div class="dateStyle"><span>'.$date.'</span><small>'.$month.'</small></div>
                             <div class="bPostContent"><h6><a href="' . get_permalink($recent["post_title"]) . '">' .   $recent["post_title"].'</a></h6>  <p><small>by '.$author.'</small></p></div></li> ';
                            }
                            wp_reset_query();
                    ?>
                    	
                    </ul>
                </div>
            </div>    
            
        </div>
        
        <div class="container">
        	<div class="copyright">
                <?php if(!empty($sbs_theme_options['sbs_footer_social_links'])){

                echo htmlspecialchars_decode(stripslashes(str_replace('#TEMPLATE_URI#',get_template_directory_uri(),$sbs_theme_options['sbs_footer_social_links'])),ENT_QUOTES);

                }

                ?>
                <?php if(!empty($sbs_theme_options['sbs_footer_cl_links'])){

                echo htmlspecialchars_decode(stripslashes(str_replace('#TEMPLATE_URI#',get_template_directory_uri(),$sbs_theme_options['sbs_footer_cl_links'])),ENT_QUOTES);

                }

                ?>
            </div>
        </div>
    </footer>


	<!--	</div> .site-content -->
<!-- 
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav>
			<?php endif; ?>

			<div class="site-info">
				<?php
					do_action( 'twentysixteen_credits' );
				?>
				<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'WordPress' ); ?></a>
			</div>
		</footer>
	</div>
</div> -->

<?php wp_footer(); ?>


</body>
</html>
