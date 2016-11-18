<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
 	<div class="mainContent">
    	<div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
  						the_content();
					endwhile;
				else:
			?>
  			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?> 
			<div class="featuredProd">
            	<h3 class="lineStyle"><span>FEATURED PRODUCT</span></h3>
                <ul class="clearfix">
	                <?php 
						$args = array(
						'post_type' => 'product',
						'posts_per_page' => 4,
						'orderby' =>'date',
						'order' => 'DESC' );
						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

							<li>
								<figure>
									<a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />'; ?>
									</a>
								</figure>
								<figcaption>
									<h4><a id="id-<?php the_id(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
									<p>PRODUCT DESCRIPTION</p>
									<p class="prodPrice"><strong><?php echo $product->get_price_html(); ?></strong></p>
									<p><?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?></p>
								</figcaption>
							</li>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
					
                </ul>
            </div>
			<?php
				$main_post_id = $post->ID;
				$services_options =  get_post_meta($main_post_id, 'footer_banner', true );
				if(!empty($services_options)){
					echo $services_options;
				}
			?>
		</div>
	</div>

<?php get_footer(); ?>
</div>