<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin MilleSeptCentDeux
 *
 * @plugin     MilleSeptCentDeux
 * @copyright  2013
 * @author     admin
 * @licence    GNU/GPL
 * @package    SPIP\Poste_deux\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin MilleSeptCentDeux.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function poste_deux_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();

	$maj['create'] = array(array('maj_tables', array('spip_facts', 'spip_contacts', 'spip_revues')));

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin MilleSeptCentDeux.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function poste_deux_vider_tables($nom_meta_base_version) {

	sql_drop_table("spip_facts");
	sql_drop_table("spip_contacts");
	sql_drop_table("spip_revues");

	# Nettoyer les versionnages et forums
	sql_delete("spip_versions",              sql_in("objet", array('fact', 'contact', 'revue')));
	sql_delete("spip_versions_fragments",    sql_in("objet", array('fact', 'contact', 'revue')));
	sql_delete("spip_forum",                 sql_in("objet", array('fact', 'contact', 'revue')));

	effacer_meta($nom_meta_base_version);
}

?>