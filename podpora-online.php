<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wpguru.eu
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 1.6b
Author: expres-web
Author URI: http://www.expres-web.cz
License: GPLv2 or later
*/

if(!is_admin()){
    return;
}else{


	/**********  Definice námi vytvořených funkcí  **********/

	function PridatMenu(){
add_action('admin_menu', 'VytvorMenu');
}

function VytvorMenu(){
add_menu_page('Aktuální novinky', 'Podpora online', 'activate_plugins', 'uvod', 'ObsahAktualniNovinky',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Přeložené pluginy', 'Přeložené pluginy', 'activate_plugins', 'prelozene-pluginy', 'ObsahPrelozenePluginy',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Přeložené šablony', 'Přeložené šablony', 'activate_plugins', 'prelozene-sablony', 'ObsahPrelozeneSablony');
add_submenu_page('uvod', 'Kontatní formulář', 'Kontatní formulář', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
add_submenu_page('uvod', 'Žádost překladu', 'Žádost překladu', 'activate_plugins', 'zadost-prekladu', 'ObsahZadostPrekladu');
}

// Obsah obsah Aktualni novinky
function ObsahAktualniNovinky() {


include 'posledni-novinky.php';

}
// Obsah Přeložené pluginy
function ObsahPrelozenePluginy() {


include 'prelozene-pluginy.php';

}
// Obsah Přeložené šablony
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

// spuštění
PridatMenu();

	// Funkce pro přidání CSS souboru do hlavičky administrace
    function PO_PridaniCssSouboru(){
        wp_enqueue_style('podpora-online-css', plugin_dir_url(__FILE__).'design/style.css');
    }

    // Funkce pro vytvoření widgetu na nástěnce
    function PO_VytvorWidget(){
		wp_add_dashboard_widget('widget_podpora-online', 'Poslení novinky na wpguru.eu', 'PO_ZobrazWidget');
	}

	// Funkce pro zobrazení widgetu na nástěnce
	function PO_ZobrazWidget(){
		?>
		<div class="podpora-online-widget">
			<h1>Členství na WpGuru.eu</h1>
            <p>Vytvořte si členství na <a href="http://www.wpguru.eu" target="_blank">www.wpguru.eu</a> a získejte zdarma další výhody na víc.</p>
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
