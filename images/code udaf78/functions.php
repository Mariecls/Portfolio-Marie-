<?php
function woffice_child_scripts() {
	if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
		$theme_info = wp_get_theme();
		wp_enqueue_style( 'woffice-child-stylesheet', get_stylesheet_uri(), array(), WOFFICE_THEME_VERSION );
    	// wp_enqueue_script('udaf-mainjs', 'https://extranet.udaf78.fr/wp-content/themes/woffice-child-theme/js/main.js', array('jquery'), null, false);
	}
}
add_action('wp_enqueue_scripts', 'woffice_child_scripts', 30);

add_action('after_setup_theme', function () {

	// Load custom translation file for the parent theme
	load_theme_textdomain( 'woffice', get_stylesheet_directory() . '/languages/' );

	// Load translation file for the child theme
	load_child_theme_textdomain( 'woffice', get_stylesheet_directory() . '/languages' );
});

// Custom Shortcode
add_shortcode('get_categorie', 'getCat');
function getCat()
{
	$taxo = 'wpdmcategory';
	$taxGet = "";

	if ( isset($_GET['tax']) )
		$taxGet = $_GET['tax']['wpdmcategory'];

	$terms = get_terms(
		array(
			   'taxonomy'   => $taxo, // Custom Post Type Taxonomy Slug
			   'hide_empty' => true,
			   'order'      => 'asc'
		   )
		);
	
	$baliseSelect = 'Selectionnez une catégorie : <select onchange="document.location.href=this.value">';
	$baliseSelect .= '<option value="'.get_page_link().'">Toutes les catégories</option>';
	foreach ($terms as $term)
	{
		if ( $taxGet == $term->slug )
			{
				$selected = "selected";
			}
			else
			{
				$selected = "";
			}
		$baliseSelect .= '<option value="'.get_page_link().'?tax[wpdmcategory]='.$term->slug.'&annee='.$_GET['annee'].'" '.$selected.'>'.$term->name.'</option>';
	}
	
	$baliseSelect .= '</select><br/>';
	return $baliseSelect;
}
add_shortcode('get_annee', 'getYear');
function getYear()
{
	// Affichage des variables 
	$datedebut = "2020" ;
	$datefin = date('Y');
	$anneeGet = "";
	if ( isset($_GET['annee']) )
		$anneeGet = $_GET['annee'];
	
	$taxGet = "";

	if ( isset($_GET['tax']) )
		$taxGet = $_GET['tax']['wpdmcategory'];
 
	// Affichage de la selection de l'annee
	$baliseSelect = 'Selectionnez une annee : <select onchange="document.location.href=this.value">';
		$baliseSelect .= '<option value="'.get_page_link().'">Toutes les années</option>';
		for ($i = $datedebut; $i <= $datefin; $i++) {
			if ( $anneeGet == $i )
			{
				$selected = "selected";
			}
			else
			{
				$selected = "";
			}
			$baliseSelect .= '<option value="'.get_page_link().'?annee='.$i.'" '.$selected.'>'.$i.'</option>';
		}
	$baliseSelect .= '</select><br/>';
	return $baliseSelect;
}



