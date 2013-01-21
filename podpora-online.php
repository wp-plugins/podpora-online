<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wpguru.eu
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 1.7
Author: expres-web
Author URI: http://www.expres-web.cz
License: GPLv2 or later
*/

if(!is_admin()){
    return;
}else{


	/**********  Vytvoreni menu hlavni **********/

	function PridatMenu(){
add_action('admin_menu', 'VytvorMenu');
}

function VytvorMenu(){
add_menu_page('Aktuální novinky', 'Podpora online', 'activate_plugins', 'uvod', 'ObsahAktualniNovinky',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Kontatní formulář', 'Kontatní formulář', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
add_submenu_page('uvod', 'Žádost překladu', 'Žádost překladu', 'activate_plugins', 'zadost-prekladu', 'ObsahZadostPrekladu');
}

// Obsah obsah Aktualni novinky
function ObsahAktualniNovinky() {


include 'posledni-novinky.php';

}
// Obsah Kontaktní fomulář
function ObsahKontaktniFormular() {


include 'kontaktni-formular.php';

}
// Obsah Žádost překladu
function ObsahZadostPrekladu() {


include 'zadost-prekladu.php';

}

	/**********  Vytvoreni menu pluginy **********/

add_action('admin_menu', 'pluginy_menu');
function pluginy_menu(){
add_menu_page('Žádost o překlad', 'Překlady pluginů', 'activate_plugins', 'preklady_pluginu', 'ObsahPrekladyPluginu',plugin_dir_url( __FILE__ )."/design/plugin.png" );
add_submenu_page('preklady_pluginu', 'BuddyPress Překlady', 'BuddyPress', 'activate_plugins', 'buddypress-preklad', 'ObsahBuddyPress');
add_submenu_page('preklady_pluginu', 'Shortcodes Ultimate čeština', 'Shortcodes Ultimate', 'activate_plugins', 'shortcode-ultimate-preklad', 'ObsahShortcodesUltimate');
add_submenu_page('preklady_pluginu', 'Subscribe2 čeština', 'Subscribe2', 'activate_plugins', 'Subscribe2-preklad', 'ObsahSubscribe2');
add_submenu_page('preklady_pluginu', 'WooCommerce čeština', 'WooCommerce', 'activate_plugins', 'WooCommerce-preklad', 'ObsahWooCommerce');
add_submenu_page('preklady_pluginu', 'Connections čeština', 'Connections', 'activate_plugins', 'Connections-preklad', 'ObsahConnections');
add_submenu_page('preklady_pluginu', 'Paid Memberships Pro čeština', 'Paid Memberships Pro', 'activate_plugins', 'paid-memberships-pro-preklad', 'ObsahPaidMembershipsPro');
add_submenu_page('preklady_pluginu', 'CubePoints čeština', 'CubePoints', 'activate_plugins', 'cubepoints-preklad', 'ObsahCubePoints');
}

// Obsah Překlady pluginů
function ObsahPrekladyPluginu() {


include 'pluginy/preklady-pluginu.php';

}
// Obsah BuddyPress
function ObsahBuddyPress() {


include 'pluginy/buddypress.php';

}
// Obsah Shortcodes Ultimate
function ObsahShortcodesUltimate() {


include 'pluginy/shortcodes_ultimate.php';

}
// Obsah Subscribe2
function ObsahSubscribe2() {


include 'pluginy/subscribe2.php';

}
// Obsah WooCommerce
function ObsahWooCommerce() {


include 'pluginy/woocommerce.php';

}
// Obsah Connections
function ObsahConnections() {


include 'pluginy/connections.php';

}
// Obsah Paid Memberships Pro
function ObsahPaidMembershipsPro() {


include 'pluginy/paid-memberships-pro.php';

}
// Obsah CubePoints
function ObsahCubePoints() {


include 'pluginy/cubepoints.php';

}

	/**********  Vytvoreni menu sablony **********/

add_action('admin_menu', 'sablony_menu');
function sablony_menu(){
add_menu_page('Novinky u překladu šablon', 'Překlady šablon', 'activate_plugins', 'preklady_sablony', 'ObsahPrekladySablon',plugin_dir_url( __FILE__ )."/design/template.png" );
add_submenu_page('preklady_sablony', 'Šablona Vantage', 'Šablona Vantage', 'activate_plugins', 'sablona-vantage', 'ObsahVantageSablona');  
}

// Obsah Překlady šablon
function ObsahPrekladySablon() {


include 'sablony/preklady-sablon.php';

}
// Obsah Šablona Vantage
function ObsahVantageSablona() {


include 'sablony/vantage.php';

}

// spuštění
PridatMenu();

	// Funkce pro přidání CSS souboru do hlavičky administrace
    function PO_PridaniCssSouboru(){
        wp_enqueue_style('podpora-online-css', plugin_dir_url(__FILE__).'design/style.css');
    }

    // Funkce pro vytvoření widgetu na nástěnce
    function PO_VytvorWidget(){
		wp_add_dashboard_widget('widget_podpora-online', 'Aktuální novinky', 'PO_ZobrazWidget');
	}

	// Funkce pro zobrazení widgetu na nástěnce
	function PO_ZobrazWidget(){
		?>
		<div class="podpora-online-widget">
			<h1>Novinky</h1>
            <p>- Vytvořte si členství na <a href="http://www.wpguru.eu" target="_blank">www.wpguru.eu</a> a získejte zdarma další výhody na víc.</p>
            <p>Každý plugin a šablona jsou zobrazny zvlášť. Menu naleznete na levé dolní straně.</p>
            <p><strong>Nejnovější plugin:</strong></p>
            <p>- <a href="/wp-admin/admin.php?page=cubepoints-preklad">CubePoints</a></p>
            <p><strong>Nejnovější šablona:</strong></p>
            <p>- <a href="/wp-admin/admin.php?page=sablona-vantage">Ventage</a></p>
		</div>
		<?php
	}
	/**********   Konec definice funkcí   **********/




	// Spuštění funkce pro přidání CSS souboru do administrace
	add_action('init', 'PO_PridaniCssSouboru');

	// Spuštění funkce pro vytvoření widgetu na nástěnce
	add_action('wp_dashboard_setup', 'PO_VytvorWidget');

}

?>
