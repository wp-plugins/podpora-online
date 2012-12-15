<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wpguru.eu
Description: Online podpora pro českou komunitu. Naleznte zde překlady pluginů, šablon a mnoho dalšího.
Version: 1.3
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
add_menu_page('Aktuální novinky', 'Aktuální novinky', 'activate_plugins', 'uvod', 'ObsahAktualniNovinky',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Přeložené pluginy', 'Přeložené pluginy', 'activate_plugins', 'prelozene-pluginy', 'ObsahPrelozenePluginy',plugin_dir_url( __FILE__ )."/design/podpora.png" );
//add_submenu_page('uvod', 'Plánované změny', 'Plánované změny', 'activate_plugins', 'planovane-zmeny', 'ObsahPlanovaneZmeny');
//add_submenu_page('uvod', 'Přeložené šablony', 'Přeložené šablony', 'activate_plugins', 'prelozene-sablony', 'ObsahPrelozeneSablony');
add_submenu_page('uvod', 'Kontatní formulář', 'Kontatní formulář', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
//add_submenu_page('uvod', 'Chat online', 'Chat online', 'activate_plugins', 'chat-online', 'ObsahChatOnline');
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
// Obsah Chat online
function ObsahChatOnline() {


include 'chat-online.php';

}
// Obsah Plánované změny
function ObsahPlanovaneZmeny() {


include 'planovane-zmeny.php';

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
			<h1>Registrace na wpguru.eu</h1>
			<p><a href="http://wpguru.eu/wp-login.php?action=register" target="_blank">Zaregistrujte se</a> na našem webu <a href="http://wpguru.eu" target="_blank">WpGuru.eu</a> a získejte další užitečné rady a informace.</p>
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
