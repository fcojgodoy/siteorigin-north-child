<?php
/**
 * Template part for displaying market gardens.
 *
 * @package siteorigin-north
 */

?>

<div class="col-3 mg-block">

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
        echo '<a class="card-image" href="' . get_the_permalink() . '"></a>';

        // echo '<h4>' . get_the_title() . '</h4>';
        echo '<div class="card-text"><h4>' . get_the_title() . '</h4>';

        // Subtitle metadata - text
        // $term = rwmb_meta( 'subtitle' );
        // if ( !empty( $term ) ) {
        //     $content = '<h5><a href="' . get_the_permalink() . '">';
        //     $content .= $term;
        //     $content .= '</a></h5>';
        //     echo $content;
        // }

        echo '</div></div>';
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
