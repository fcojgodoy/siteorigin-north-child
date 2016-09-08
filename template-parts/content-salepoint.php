<?php
/**
 * Template part for displaying single posts.
 *
 * @package siteorigin-north
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if( siteorigin_page_setting( 'page_title' ) ) : ?>
		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<!-- Subtitle -->
			<?php $sp_subtitle = get_post_meta( get_the_ID(), 'sp_subtitle', true );
			if ( !empty( $sp_subtitle ) ) {
				echo "<h2>{$sp_subtitle}</h2>";
			}
			?>

		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>

			<!-- Thumbnail -->
			<?php $sp_thumbnail = get_the_post_thumbnail( get_the_ID(), 'full' );
				if ( !empty( $sp_thumbnail ) ) {
					echo $sp_thumbnail;
				}
			?>


			<!-- Description -->
			<?php $sp_description = get_post_meta( get_the_ID(), 'sp_description', true );
				if ( !empty( $sp_description ) ) {
					echo "<h3>" . __('Description', 'siteorigin-north') . "</h3>";
					echo $sp_description;
				}
			?>

			<!-- Street and pobox -->
			<?php
				$sp_street = get_post_meta( get_the_ID(), 'sp_street', true );
				$sp_pobox = get_post_meta( get_the_ID(), 'sp_pobox', true );
				if ( !empty( $sp_street ) ) {
					echo "<h3>" . __('Situation and contact', 'siteorigin-north') . "</h3>";
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

			<!-- Mobile phone -->
			<?php
			$sp_mobile = get_post_meta( get_the_ID(), 'sp_mobile', true );
				if ( !empty( $sp_mobile ) ) {
					echo "<a href='tel:{$sp_mobile}'>{$sp_mobile}</a>";
				}
			?>

			<!-- Products -->
			<?php
				$products = get_the_terms( get_the_ID(), 'sp-product-tax', true);
				if  ($products) {
					echo "<h3>" . __('Products', 'siteorigin-north') . "</h3>";
					echo "<p>";
					foreach ($products as $product ) {
						echo $product->name . ', ';
					}
					echo "</p>";
				}
			?>

			<!-- Market gardens relationship -->
      <?php
        $related = get_posts(array(
          'post_type' => 'marketgarden' // Set post type you are relating to.
          ,'posts_per_page' => -1
          ,'post_has' => $post->ID
          ,'post_status' => 'publish'
          ,'suppress_filters' => false // This must be set to false
        ));

	      foreach ($related as $related_post):
	        echo "<h3>" . __('Our market gardens', 'siteorigin-north') . "</h3>";
	        echo "<ul>";
	        echo "<li>{$related_post->post_title}</li>";
	        echo "</ul>";
	      endforeach
       ?>

			 <!-- Timetable start -->
       <?php $sp_timestart = get_post_meta( get_the_ID(), 'sp_timestart', true );
 				if ( !empty( $sp_timestart ) ) {
					echo "<h3>" . __('Timetable', 'siteorigin-north') . "</h3>";
 					echo "<p><strong>" . __('From', 'siteorigin-north') . ": </strong>";
 					echo "{$sp_timestart}";
 				}
 			?>

			<!-- Timetable end -->
      <?php $sp_timeend = get_post_meta( get_the_ID(), 'sp_timeend', true );
 				if ( !empty( $sp_timeend ) ) {
 					echo "<strong>" . __('to', 'siteorigin-north') . ": </strong>";
 					echo "{$sp_timeend}</p>";
 				}
 			?>

			<!-- Open days -->
      <?php
     		$sp_days = get_post_meta( get_the_ID(), 'sp_days' );
		 			echo "<p><strong>" . __('Days of the week', 'siteorigin-north') . ": </strong></br>";
					echo "<ul>";
          foreach ( $sp_days as $sp_day ) {
						if ( !empty( $sp_day ) ) {
          	echo "<li>" . $sp_day . "</li>";
        		}
					}
					echo "</ul></p>";
     	?>

			<!-- Timetable comments -->
      <?php $sp_comment = get_post_meta( get_the_ID(), 'sp_comment', true );
 				if ( !empty( $sp_comment ) ) {
 					echo "<p><strong>" . __('Comments', 'siteorigin-north') . ": </strong>";
 					echo "{$sp_comment}</p>";
 				}
 			?>



		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'siteorigin-north' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php siteorigin_north_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
