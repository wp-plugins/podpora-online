<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wpguru.eu
Description: Online podpora pro českou komunitu. Naleznte zde překlady pluginů, šablon a mnoho dalšího.
Version: 1.0
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
//add_submenu_page('uvod', 'Přeložené šablony', 'Přeložené šablony', 'activate_plugins', 'prelozene-sablony', 'ObsahPrelozeneSablony');
//add_submenu_page('uvod', 'Kontatní formulář', 'Kontatní formulář', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
}

function ObsahAktualniNovinky(){
// obsah Aktualni novinky
		?>
<div id="primary" class="sidebar">
<ul>
	<li id="text-1" class="widget widget_text">
	  <h3 class="widgettitle">Aktuální novinky</h3>
		<div class="textwidget"><script id="feed-135498515220154" type="text/javascript" src="http://rss.bloople.net/?url=http%3A%2F%2Fwpguru.eu%2Ffeed%2F&showtitle=false&forceutf8=true&type=js&id=135498515220154"></script></div>
	</li>               
</ul>
</div>
		<?php
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
			<p><script id="feed-135498515220154" type="text/javascript" src="http://rss.bloople.net/?url=http%3A%2F%2Fwpguru.eu%2Ffeed%2F&showtitle=false&forceutf8=true&type=js&id=135498515220154"></script></p>
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
