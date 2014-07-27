<?php

function unload_parent() {
          remove_action( 'cyberchimps_footer', 'cyberchimps_footer_credit' );
       }

add_action('wp_print_styles', 'unload_parent', 11);

/**
 * Adds the CyberChimps credit.
 *
 * @since 1.0
 */
function odl_footer_credit() {
	?>
	<div class="container-full-width" id="after_footer">
		<div class="container">
			<div class="container-fluid">
				<footer class="site-footer row-fluid">
					<div class="span6">
						<div id="credit">
						</div>
					</div>

					<!-- Adds the afterfooter copyright area -->
					<div class="span6">
						<?php $copyright = ( cyberchimps_get_option( 'footer_copyright_text' ) ) ? cyberchimps_get_option( 'footer_copyright_text' ) : 'CyberChimps &#169;' . date( 'Y' ); ?>
						<div id="copyright">
							<?php echo wp_kses_post( $copyright ); ?>
						</div>
					</div>
				</footer>
				<!-- row-fluid -->
			</div>
			<!-- .container-fluid-->
		</div>
		<!-- .container -->
	</div>    <!-- #after_footer -->
<?php
}

add_action( 'cyberchimps_footer', 'odl_footer_credit' );


add_filter( 'header_drag_and_drop_options', 'odl_header_drag_and_drop_defaults', 20 );

function odl_header_drag_and_drop_defaults($defaults){
	$defaults['cyberchimps_logo_menu'] = __( 'Logo + Menu', 'cyberchimps_core' );
	return $defaults;
}

// Defines action for header elelment "Logo"
function cyberchimps_logo_menu() {
?>
<header id="cc-header" class="row-fluid">
<div class="span5">
<?php if ( function_exists( 'cyberchimps_header_logo' ) ) {
cyberchimps_header_logo();
} ?>
</div>
<div class="span7">
	<?php if ( function_exists( 'odl_header_menu' ) ) {
		odl_header_menu();
} ?>
</div>
</header>
<?php
}

add_action( 'cyberchimps_logo_menu', 'cyberchimps_logo_menu' );


function odl_header_menu(){

?>
<!-- ---------------- Menu --------------------- -->
		<div class="container-fluid">
			<nav id="navigation" class="row-fluid" role="navigation">
				<div class="main-navigation navbar">
					<div class="navbar-inner">
						<div class="">

							<?php /* hide collapsing menu if not responsive */
							if (cyberchimps_get_option( 'responsive_design', 'checked' )): ?>
							<div class="nav-collapse collapse">
								<?php endif; ?>

								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav', 'walker' => new cyberchimps_walker(), 'fallback_cb' => 'cyberchimps_fallback_menu' ) ); ?>

								<?php if( cyberchimps_get_option( 'searchbar', 1 ) == "1" ) : ?>
									<div class="menu-searchbar">
										<?php get_search_form(); ?>
									</div>
								<?php endif; ?>

								<?php /* hide collapsing menu if not responsive */
								if (cyberchimps_get_option( 'responsive_design', 'checked' )): ?>
							</div>
						<!-- collapse -->

						<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
						<?php endif; ?>
						</div>
						<!-- container -->
					</div>
					<!-- .navbar-inner .row-fluid -->
				</div>
				<!-- main-navigation navbar -->
			</nav>
			<!-- #navigation -->
		</div>
		<!-- .container-fluid-->
	<!-- .container -->

<!-- #navigation_menu -->

<?php

}