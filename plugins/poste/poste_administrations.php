<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin MilleSeptCent
 *
 * @plugin     MilleSeptCent
 * @copyright  2013
 * @author     Malik Khoubbane
 * @licence    GNU/GPL
 * @package    SPIP\Poste\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin MilleSeptCent.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function poste_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	$maj['create'] = array(array('maj_tables', array('spip_videos', 'spip_textes', 'spip_images', 'spip_citations')));

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin MilleSeptCent.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function poste_vider_tables($nom_meta_base_version) {

	sql_drop_table("spip_videos");
	sql_drop_table("spip_textes");
	sql_drop_table("spip_images");
	sql_drop_table("spip_citations");

	# Nettoyer les versionnages et forums
	sql_delete("spip_versions",              sql_in("objet", array('video', 'texte', 'image', 'citation')));
	sql_delete("spip_versions_fragments",    sql_in("objet", array('video', 'texte', 'image', 'citation')));
	sql_delete("spip_forum",                 sql_in("objet", array('video', 'texte', 'image', 'citation')));

	effacer_meta($nom_meta_base_version);
}

?>