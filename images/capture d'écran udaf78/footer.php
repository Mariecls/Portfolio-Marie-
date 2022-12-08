<?php
/**
 * The template for displaying the footer
 */
?>
				
<?php
$is_blank_template = woffice_is_current_page_using_blank_template();
?>

				<?php // DISPLAY SCROLL
				if(!$is_blank_template) {
					$sidebar_scroll_inner = woffice_get_settings_option( 'sidebar_scroll_inner' );
					if ( $sidebar_scroll_inner == "yep" ) :
						echo '<a href="javascript:void(0)" id="can-scroll"><i class="fa fa-angle-double-down"></i></a>';
					endif;
				}?>

            <?php
            /**
             * Action 'woffice_main_container_end'
             *
             * Used to output content within the #main-content div
             *
             */
            do_action('woffice_main_container_end');
            ?>
			
			</section>
			<!-- END CONTENT -->
<?php
if(!$is_blank_template):
?>
			<!-- START FOOTER -->
            <?php $navigation_hidden_class = woffice_get_navigation_class(); ?>
			<footer id="main-footer" class="<?php echo esc_attr($navigation_hidden_class)?>">
				
				<?php // IF YOU WANT TO DISPLAY THE EXTRA FOOTER
				$extrafooter_show = woffice_get_settings_option('extrafooter_show');
				if(  $extrafooter_show == "yes" ) : 
					woffice_extrafooter();
				endif; ?>

				<?php // IF YOU WANT TO DISPLAY WIDGET AREA IN THE FOOTER
				$footer_widgets = woffice_get_settings_option('footer_widgets');
				if ($footer_widgets == "show" && is_active_sidebar('widgets')) :
					$footer_layout = woffice_get_footer_widgets_layout();
					?>
					<!-- START FOOTER WIDGETS -->
					<div id="widgets" data-widgets-layout="<?php echo esc_attr( $footer_layout) ; ?>">
						<?php get_sidebar( 'footer' ); ?>
					</div>
				<?php endif; ?>

				<!-- START COPYRIGHT -->
				<div id="copyright">
					<?php
					$footer_copyright_content = woffice_get_settings_option('footer_copyright_content');

					/**
					 * Whether we display the privacy page in the footer
                     *
                     * @since 2.7.0
                     * @param boolean
					 */
					$show_privacy = apply_filters('woffice_show_privacy_page', true);
					$has_privacy_page = (function_exists('get_privacy_policy_url') && get_privacy_policy_url() && $show_privacy);
					?>
				  	<p>
                        <?php if ($footer_copyright_content): ?>
                            <?php echo wp_kses_post($footer_copyright_content); ?>
                        <?php endif; ?>
                        <?php if ($has_privacy_page): ?>
                            <?php echo get_the_privacy_policy_link(' &mdash; ');  ?>
                        <?php endif; ?>
                    </p>
				</div>
			</footer>
			<!-- END FOOTER -->

		</div>

<?php endif; ?>

		<!-- JAVSCRIPTS BELOW AND FILES LOADED BY WORDPRESS -->
		<?php wp_footer(); ?>

		<!--  AJout de notre code ici -->
		<?php
			$anneeGet = $_GET['annee'];
		?>
		<script>
			jQuery(document).ready(function ($) {
				
				// On ajoute la classe annee-XXXX
				$('table > tbody  > tr').each(function(index, tr) { 					
					var dateUpdate = $(this).find('td .__dt_update_date').html();
					console.log(dateUpdate);
					var anneeUpdate = dateUpdate.split("/");
					$(this).addClass('annee-'+anneeUpdate[2]);
				});

				// On affiche seulement les tr qu'il faut
				<?php if ( !empty($anneeGet) ) { ?>
					$('table > tbody  > tr').hide();
					$('table > tbody  > tr.annee-<?php  echo  $anneeGet ;?>').show();
				<?php }?>
			});
 		</script>
	</body>
	<!-- END BODY -->
</html>