<?php
/*
Plugin Name: Podpora online
Plugin URI: http://wick.cz
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 2.3
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
add_menu_page('Aktuální novinky', 'Podpora online', 'activate_plugins', 'uvod', 'ObsahAktualniNovinky',plugin_dir_url( __FILE__ )."/design/podpora.png" );
add_submenu_page('uvod', 'Přeložené pluginy', 'Přeložené pluginy', 'activate_plugins', 'prelozene-pluginy', 'ObsahPrelozenepluginy');
add_submenu_page('uvod', 'Přeložené šablony', 'Přeložené šablony', 'activate_plugins', 'prelozene-sablony', 'ObsahPrelozeneSablony');
add_submenu_page('uvod', 'Kontatní formulář', 'Kontatní formulář', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
add_submenu_page('uvod', 'Žádost překladu', 'Žádost překladu', 'activate_plugins', 'zadost-prekladu', 'ObsahZadostPrekladu');
}

// Obsah Aktualni novinky
function ObsahAktualniNovinky() {


include 'posledni-novinky.php';

}
// Obsah Prelozene pluginy
function ObsahPrelozenepluginy() {


include 'docasne/pripravujeme.php';

}
// Obsah Prelozene šablony
function ObsahObsahPrelozeneSablony() {


include 'docasne/pripravujeme.php';

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
		wp_add_dashboard_widget('widget_podpora-online', 'Aktuální novinky', 'PO_ZobrazWidget');
	}

	// Funkce pro zobrazení widgetu na nástěnce
	function PO_ZobrazWidget(){
		?>
		<div class="podpora-online-widget">
			<h1><a href='http://wick.cz/'><img src='http://podpora.wick.cz/wp-content/uploads/2015/03/logo.png' alt='Wick.cz' title='Tvorba stránek a podpora pro WordPress' /></a><br />
		    Poslední změny			</h1>
			<table width="100%" border="0" cellspacing="3" cellpadding="3">
			  <tr>
			    <td><p>1.3.2015 Nyní můžete požádat o překaldy a kontaktovat nás ...</p></td>
			    <td><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Plugin - Widget -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-8881781121147805"
     data-ad-slot="8064222011"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></td>
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
