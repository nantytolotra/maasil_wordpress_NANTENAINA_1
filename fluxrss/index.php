<?php
/**
 * Plugin Name: Flux RSS
 * Plugin URI: #
 * Description: FLUX RSS Shortcode
 * Version: 1.0
 * Author: Your Name
 * Author URI: #
 */


require_once(WP_PLUGIN_DIR."/fluxrss/autoload.php"); 
function theme_fluxrss_shortcode( $atts, $content = null ) {

extract( shortcode_atts( array(
        "url" => '',
    ), $atts));
 
  include_once( ABSPATH . WPINC . '/feed.php' );
 
// Obtenez un objet de fil SimplePie à partir de la source d'alimentation spécifiée.
$rss = fetch_feed( '"'.$atts["url"].'"' );
 
$maxitems = 0;
 
if ( ! is_wp_error( $rss ) ) : // Vérifie que l'objet est correctement créé
 
    // Déterminez le nombre total d'articles, mais limitez-le à 5. 
    $maxitems = $rss->get_item_quantity( 5 ); 
 
    // Construit un tableau de tous les éléments, en commençant par l'élément 0 (premier élément).
    $rss_items = $rss->get_items( 0, $maxitems );
 
endif;
?>
 
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'wpdocs_textdomain' ); ?></li>
    <?php else : ?>
        <?php // Boucle sur chaque élément de fil et affiche chaque élément sous forme de lien hypertexte. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'wpdocs_textdomain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
 <?php
}
 add_shortcode( 'display-rss', 'theme_fluxrss_shortcode' );