<?php
/**
 * Template part for displaying single Marketgardens posts.
 *
 * @package siteorigin-north
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php if( siteorigin_page_setting( 'page_title' ) ) : ?>
		<header class="entry-header">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<!-- Subtitle -->
			<?php $mg_subtitle = get_post_meta( get_the_ID(), 'mg_subtitle', true );
				if ( !empty( $mg_subtitle ) ) {
					echo "<h2>{$mg_subtitle}</h2>";
				}
			?>

		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>

		<!-- Thumbnail -->
		<?php if( has_post_thumbnail() && siteorigin_setting( 'blog_featured_single' ) ) : ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail() ?>
			</div>
		<?php endif; ?>

		<?php echo "<h3>" . __('The market garden', 'siteorigin-north') . "</h3>" ?>

		<?php $mg_who = get_post_meta( get_the_ID(), 'mg_who', true );
		// Who we are
			if ( !empty( $mg_who ) ) {
				echo "<h4>" . __('Who we are', 'siteorigin-north') . "</h4>";
				echo $mg_who;
			}
		?>

		<?php $mg_where_and_when = get_post_meta( get_the_ID(), 'mg_where_and_when', true );
		// Where and since when
			if ( !empty( $mg_where_and_when ) ) {
				echo "<h4>" . __('Where and since when?', 'siteorigin-north') . "</h4>";
				echo $mg_where_and_when;
			}
		?>

		<?php $mg_description = get_post_meta( get_the_ID(), 'mg_description', true );
		// Description metabox
			if ( !empty( $mg_description ) ) {
				echo "<h4>" . __('Description of the land', 'siteorigin-north') . "</h4>";
				echo $mg_description;
			}
		?>

		<?php $mg_sales = get_post_meta( get_the_ID(), 'mg_sales', true );
		// Type of sales metabox
			if ( !empty( $mg_sales ) ) {
				echo "<h4>" . __('Type of sales', 'siteorigin-north') . "</h4>";
				echo $mg_sales;
			}
		?>

		<?php
			// Node
			$mg_state = get_post_meta( get_the_ID(), 'mg_state', true);
			if ( !empty ($mg_state) ) {
				echo "<h3>" . __('Node', 'siteorigin-north') . "</h3>";
				echo $mg_state;
			}
		 ?>

		<?php
		// Sale point metabox
			$related = get_posts(array(
		     'post_type' => 'salepoint' // Set post type you are relating to.
		    ,'posts_per_page' => -1
		    ,'post_belongs' => $post->ID
		    ,'post_status' => 'publish'
		    ,'suppress_filters' => false // This must be set to false
		  ));

			foreach ($related as $related_post):

			  $title = $related_post->post_title;
				$link = get_permalink($related_post->ID);
				if ( !empty ( $related ) ) {
					echo "<h3>" . __('Sale points', 'siteorigin-north') . "</h3>";
					echo "<p><a href='{$link}' title='{$title}'>{$title}</a></p>";
				}

			endforeach;
		 ?>

			<!-- Contacte metabox -->
			<?php
				$mg_street = get_post_meta( get_the_ID(), 'mg_street', true );
				$mg_pobox = get_post_meta( get_the_ID(), 'mg_pobox', true );
				$mg_city = get_post_meta( get_the_ID(), 'mg_city', true );
				$mg_state = get_post_meta( get_the_ID(), 'mg_state', true );
				$mg_postalcode = get_post_meta( get_the_ID(), 'mg_postalcode', true );
				$mg_phone = get_post_meta( get_the_ID(), 'mg_phone', true );
				$mg_mobile = get_post_meta( get_the_ID(), 'mg_mobile', true );
				// Description metabox
					if ( !empty( $mg_street ) ) {
						echo "<h3>" . __('Contact', 'siteorigin-north') . "</h3>";
						echo "<h4>" . __('Address', 'siteorigin-north') . "</h4>";
						echo "<p>{$mg_street} {$mg_pobox}</br>
							{$mg_city} {$mg_postalcode}, {$mg_state}</br>";
						echo "<h4>" . __('Telephones', 'siteorigin-north') . "</h4>
							<a href='tel:{$mg_phone}'>{$mg_phone}</a></br>
							<a href='tel:{$mg_mobile}'>{$mg_mobile}</a>";
					}
			?>

			<?php
				// Web
				$mg_web = get_post_meta( get_the_ID(), 'mg_web', true );
				if ( !empty( $mg_web ) ) {
					echo '<h4>' . __('Web page', 'siteorigin-north') . '</h4>';
					echo "<a href='{$mg_web}' target='_blanck'>{$mg_web}</a>";
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
