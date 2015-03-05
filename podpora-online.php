<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wick.cz
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 2.4
Author: Wick.cz
Author URI: http://wick.cz
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
add_submenu_page('uvod', 'Přeložené pluginy', 'Přeložené pluginy', 'activate_plugins', 'prelozene-pluginy', 'ObsahPrelozenepluginy');
add_submenu_page('uvod', 'Přeložené šablony', 'Přeložené šablony', 'activate_plugins', 'prelozene-sablony', 'ObsahPrelozeneSablony');
add_submenu_page('uvod', 'Podpora', 'Podpora', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
add_submenu_page('uvod', 'Žádost překladu', 'Žádost překladu', 'activate_plugins', 'zadost-prekladu', 'ObsahZadostPrekladu');
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
			<h1><a href='http://wick.cz/' target="_blank">
<img src='http://wick.cz/plugin_img/podpora_online/logo.png' alt='Wick.cz' title='Tvorba stránek a podpora pro WordPress' />
</a><br />
		    Poslední změny			</h1>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
			  <tr>
			    <td><p>2.3.2015 Přidaní poslední návody z webu wick.cz<br />
			      1.3.2015 Nyní můžete požádat o překaldy a kontaktovat nás ...</p></td>

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
