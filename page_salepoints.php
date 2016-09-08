<?php
/**
 * Template Name: Plantilla para punts de venda
 *
 * Selectable from a dropdown menu on the edit page screen.
 */

 get_header(); ?>

 	<div id="primary" class="content-area">
 		<main id="main" class="site-main" role="main">

 			<?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        	<?php if( siteorigin_page_setting( 'page_title' ) ) : ?>
        		<header class="entry-header">
        			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        			<?php siteorigin_north_breadcrumbs(); ?>
        		</header><!-- .entry-header -->
        	<?php endif; ?>

        	<div class="entry-content">
        		<?php the_content(); ?>
        		<?php
        			wp_link_pages( array(
        				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
        				'after'  => '</div>',
        			) );
        		?>
        	</div><!-- .entry-content -->

        </article><!-- #post-## -->

        <div class="container-fluid">
          <div class="row sp-list">

          <?php
            $type = 'salepoint';
            $args=array(
              'post_type' => $type,
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'caller_get_posts'=> 1
            );

            $my_query = null;
            $my_query = new WP_Query($args);
            if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post(); ?>


              <div class="col-3 sp-block">
                <div class="box">
                  <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                    <!-- Ver en content-page cómo se muestra el título y el thumbnail con un enlace dentro de forma accesible -->

                    <div class="entry-content">
                      <?php
                        the_content( sprintf(
                          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'siteorigin-north' ),
                          get_the_title()
                        ) );
                      ?>


                      <?php
                        echo '<div class="card-block">';
                        // echo '<a class="card-image" href="' . get_the_permalink() . '"></a>';

                        // echo '<h4>' . get_the_title() . '</h4>';
                        echo '<div class="card-text"><h4><a class="card-permalink" href="' . get_the_permalink() . '">'. get_the_title() . '</a></h4>';
                      ?>

                      <!-- Thumbnail -->
                      <?php $sp_thumbnail = get_the_post_thumbnail( get_the_ID(), 'full' );
                        if ( !empty( $sp_thumbnail ) ) {
                          echo $sp_thumbnail;
                        }
                      ?>

                      <!-- Subtitle -->
                      <?php $sp_subtitle = get_post_meta( get_the_ID(), 'sp_subtitle', true );
                        if ( !empty( $sp_subtitle ) ) {
                          echo "<h5>{$sp_subtitle}</h5>";
                        }
                      ?>

                      <!-- Street and pobox -->
                      <?php
                        $sp_street = get_post_meta( get_the_ID(), 'sp_street', true );
                        $sp_pobox = get_post_meta( get_the_ID(), 'sp_pobox', true );
                        if ( !empty( $sp_street ) ) {
                          echo "<p>{$sp_street}, {$sp_pobox}</br>";
                        }
                      ?>

                      <!-- City -->
                      <?php
                        $taxonomies = get_the_terms( get_the_ID(), 'sp-city-tax', true);
                        if  ($taxonomies) {
                          foreach ($taxonomies as $taxonomy ) {
                            echo $taxonomy->name . ",";
                          }
                        }
                      ?>

                      <!-- Postal code -->
                      <?php
                        $sp_postalcode = get_post_meta( get_the_ID(), 'sp_postalcode', true );
                        if ( !empty( $sp_postalcode ) ) {
                          echo "{$sp_postalcode}</br>";
                        }
                      ?>

                      <!-- State or region -->
                      <?php
                        $sp_state = get_post_meta( get_the_ID(), 'sp_state', true );
                        if ( !empty( $sp_state ) ) {
                          echo "{$sp_state}</p>";
                        }
                      ?>

                      <!-- Phone -->
                      <?php
                        $sp_phone = get_post_meta( get_the_ID(), 'sp_phone', true );
                        if ( !empty( $sp_phone ) ) {
                          echo "<a href='tel:{$sp_phone}'>{$sp_phone}</a></br>";
                        }
                      ?>

                      <?php
                        wp_link_pages( array(
                          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
                          'after'  => '</div>',
                        ) );
                      ?>
                    </div><!-- .entry-content -->

                  </article><!-- #post-## -->
                </div>
              </div>

              <?php
                endwhile;
                }
                wp_reset_query();  // Restore global post data stomped by the_post().
              ?>

          </div>
        </div>

 				<?php
 					// If comments are open or we have at least one comment, load up the comment template.
 					if ( comments_open() || get_comments_number() ) :
 						comments_template();
 					endif;
 				?>

 			<?php endwhile; // End of the loop. ?>

 		</main><!-- #main -->
 	</div><!-- #primary -->

 <?php get_sidebar(); ?>
 <?php get_footer(); ?>
