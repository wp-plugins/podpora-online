<?php
/*
Plugin Name: Podpora online
Plugin URI: http://expres-web.cz
Description: Online podpora pro českou komunitu. Naleznete zde překlady pluginů, šablon a mnoho dalšího.
Version: 3.1.1
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
add_menu_page('Online podpora', 'Online podpora', 'activate_plugins', 'uvod', 'ObsahUvodPlugin',plugins_url( 'podpora-online/design/podpora.png' ), 81 );
add_submenu_page('uvod', 'Poslední návody', 'Poslední návody', 'activate_plugins', 'posledni-navody', 'ObsahPosledniNavody');
add_submenu_page('uvod', 'Podpora', 'Podpora', 'activate_plugins', 'kontaktni-formular', 'ObsahKontaktniFormular');
}

// Obsah Posledni navody
function ObsahUvodPlugin() {


include 'uvod.php';

}
// Obsah Posledni navody
function ObsahPosledniNavody() {


include 'posledni-navody.php';

}
// Obsah Kontaktní fomulář
function ObsahKontaktniFormular() {


include 'kontaktni-formular.php';

}

	/**********  Vytvoreni menu pluginy **********/

add_action('admin_menu', 'pluginy_menu');
function pluginy_menu(){
add_menu_page('Žádost o překlad pluginu', 'Přeložené pluginy', 'activate_plugins', 'preklady_pluginu', 'ObsahPrekladyPluginu',plugins_url( 'podpora-online/design/plugin.png' ), '81.1' );
}

// Obsah Překlady pluginů
function ObsahPrekladyPluginu() {


include 'prelozene-pluginy.php';

}

	/**********  Vytvoreni menu sablony **********/

add_action('admin_menu', 'sablony_menu');
function sablony_menu(){
add_menu_page( 'Žádost o překlad šablon', 'Přeložené šablony', 'activate_plugins', 'preklady_sablony', 'ObsahPrekladySablon', plugins_url( 'podpora-online/design/template.png' ), '81.2' );
add_submenu_page('preklady_sablony', 'Šablona Venedor', 'Šablona Venedor', 'activate_plugins', 'sablona-venedor', 'ObsahVenedorSablona');
add_submenu_page('preklady_sablony', 'Šablona BeTheme', 'Šablona BeTheme', 'activate_plugins', 'sablona-betheme', 'ObsahBeThemeSablona');
add_submenu_page('preklady_sablony', 'Šablona Multinews', 'Šablona Multinews', 'activate_plugins', 'sablona-multinews', 'ObsahMultinewsSablona');
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
// Obsah Šablona Multinews
function ObsahMultinewsSablona() {


include 'sablony/multinews.php';

}
	/**********  Vytvoreni menu návody **********/

add_action('admin_menu', 'navody_menu');
function navody_menu(){
add_menu_page('WordPress návody', 'WordPress návody', 'activate_plugins', 'wordpress_navody', 'ObsahWordPressNavody',plugins_url( 'podpora-online/design/navody.png' ), '81.3' );
}

// Obsah Video návody
function ObsahWordPressNavody() {


include 'wordpress-navody.php';

}

// spuštění
PridatMenu();

	// Funkce pro přidání CSS souboru do hlavičky administrace
    function PO_PridaniCssSouboru(){
        wp_enqueue_style('podpora-online-css', plugin_dir_url(__FILE__).'design/style.css');
    }


	/**********   Konec definice funkcí   **********/

	// Spuštění funkce pro přidání CSS souboru do administrace
	add_action('init', 'PO_PridaniCssSouboru');

}

?>
