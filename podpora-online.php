<?php
/*
Plugin Name: Podpora online
Plugin URI: http://expres-web.cz
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 2.8
Author: Expres-Web.cz
Author URI: http://expres-web.cz
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
add_menu_page('Online podpora', 'Online podpora', 'activate_plugins', 'uvod', 'ObsahUvodPlugin',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Poslední návody', 'Poslední návody', 'activate_plugins', 'posledni-navody', 'ObsahPosledniNavody');
add_submenu_page('uvod', 'Podpora', 'Podpora', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
add_submenu_page('uvod', 'Plánované překlady', 'Plánované překlady', 'activate_plugins', 'planovane-preklady', 'ObsahPlanovanePreklady');
}

// Obsah Posledni navody
function ObsahUvodPlugin() {


include 'uvod.php';

}
// Obsah Posledni navody
function ObsahPosledniNavody() {


include 'posledni-navody.php';

}
// Obsah Prelozene pluginy
function ObsahPrelozenepluginy() {


include 'prelozene-pluginy.php';

}
// Obsah Prelozene šablony
function ObsahPrelozeneSablony() {


include 'prelozene-sablony.php';

}
// Obsah Kontaktní fomulář
function ObsahKontaktniFormular() {


include 'kontaktni-formular.php';

}
// Obsah Žádost překladu
function ObsahZadostPrekladu() {


include 'zadost-prekladu.php';

}
// Obsah Planovane překlady
function ObsahPlanovanePreklady() {


include 'planovane-preklady.php';

}

	/**********  Vytvoreni menu pluginy **********/

add_action('admin_menu', 'pluginy_menu');
function pluginy_menu(){
add_menu_page('Žádost o překlad pluginu', 'Přeložené pluginy', 'activate_plugins', 'preklady_pluginu', 'ObsahPrekladyPluginu',plugin_dir_url( __FILE__ )."/design/plugin.png" );
add_submenu_page('preklady_pluginu', 'BuddyPress Překlady', 'BuddyPress', 'activate_plugins', 'buddypress-preklad', 'ObsahBuddyPress');
add_submenu_page('preklady_pluginu', 'Shortcodes Ultimate čeština', 'Shortcodes Ultimate', 'activate_plugins', 'shortcode-ultimate-preklad', 'ObsahShortcodesUltimate');
add_submenu_page('preklady_pluginu', 'Subscribe2 čeština', 'Subscribe2', 'activate_plugins', 'Subscribe2-preklad', 'ObsahSubscribe2');
add_submenu_page('preklady_pluginu', 'WooCommerce čeština', 'WooCommerce', 'activate_plugins', 'WooCommerce-preklad', 'ObsahWooCommerce');
add_submenu_page('preklady_pluginu', 'Connections čeština', 'Connections', 'activate_plugins', 'Connections-preklad', 'ObsahConnections');
add_submenu_page('preklady_pluginu', 'Sexy Login čeština', 'Sexy Login', 'activate_plugins', 'sexy-preklad', 'ObsahSexy');
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
// Obsah Sexy Login
function ObsahSexy() {


include 'pluginy/sexy-login.php';

}

	/**********  Vytvoreni menu sablony **********/

add_action('admin_menu', 'sablony_menu');
function sablony_menu(){
add_menu_page('Žádost o překlad šablon', 'Přeložené šablony', 'activate_plugins', 'preklady_sablony', 'ObsahPrekladySablon',plugin_dir_url( __FILE__ )."/design/template.png" );
add_submenu_page('preklady_sablony', 'Šablona Venedor', 'Šablona Venedor', 'activate_plugins', 'sablona-venedor', 'ObsahVenedorSablona');
add_submenu_page('preklady_sablony', 'Šablona BeTheme', 'Šablona BeTheme', 'activate_plugins', 'sablona-betheme', 'ObsahBeThemeSablona');
}

// Obsah Překlady šablon
function ObsahPrekladySablon() {


include 'sablony/preklady-sablon.php';

}
// Obsah Šablona Vantage
function ObsahVenedorSablona() {


include 'sablony/venedor.php';

}
// Obsah Šablona BeTheme
function ObsahBeThemeSablona() {


include 'sablony/betheme.php';

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
			<a href='http://expres-web.cz' target="_blank">
<img src='http://expres-web.cz/wp-content/uploads/2015/04/logo_small.png' alt='Expres-Web.cz' title='Tvorba stránek a podpora pro WordPress' />
</a><br />
		    <h1>Poslední změny</h1>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
			  <tr>
			    <td><p>2.3.2015 Přidaní poslední návody z webu wick.cz<br />
			      1.3.2015 Nyní můžete požádat o překaldy a kontaktovat nás ...<br />
			      11.4.2015 Připravujeme pro Vás automaticke aktualizace překladu pro Vaše šablony a pluginy. Veškeré nastavení a zalohy budou automaticky smazány. Doporučujeme aby jste si přečetli více o tomto
			    nastavení. Jedná se hlavně o uživatelé, kteří vyuzžívají Premium Šablony ( placené šablony )</p></td>

          </table>
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
