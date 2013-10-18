<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     MilleSeptCentDeux
 * @copyright  2013
 * @author     admin
 * @licence    GNU/GPL
 * @package    SPIP\Poste_deux\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function poste_deux_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['facts'] = 'facts';
	$interfaces['table_des_tables']['contacts'] = 'contacts';

	return $interfaces;
}


/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function poste_deux_declarer_tables_objets_sql($tables) {

	$tables['spip_facts'] = array(
		'type' => 'fact',
		'principale' => "oui",
		'field'=> array(
			"id_fact"            => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"premier_champs"     => "tinytext NOT NULL DEFAULT ''",
			"deuxieme_champs"    => "tinytext NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_fact",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "premier_champs AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('premier_champs', 'deuxieme_champs'),
		'champs_versionnes' => array('premier_champs', 'deuxieme_champs'),
		'rechercher_champs' => array("premier_champs" => 10, "deuxieme_champs" => 10),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'fact:texte_changer_statut_fact', 
		

	);

	$tables['spip_contacts'] = array(
		'type' => 'contact',
		'principale' => "oui",
		'field'=> array(
			"id_contact"         => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"nom"                => "tinytext NOT NULL DEFAULT ''",
			"poste"              => "tinytext NOT NULL DEFAULT ''",
			"courriel"           => "tinytext NOT NULL DEFAULT ''",
			"telephone"          => "tinytext NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_contact",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "nom AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('nom', 'poste', 'courriel', 'telephone'),
		'champs_versionnes' => array('nom', 'poste', 'courriel', 'telephone'),
		'rechercher_champs' => array("nom" => 10, "poste" => 8, "courriel" => 8),
		'tables_jointures'  => array(),
		'statut_textes_instituer' => array(
			'prepa'    => 'texte_statut_en_cours_redaction',
			'prop'     => 'texte_statut_propose_evaluation',
			'publie'   => 'texte_statut_publie',
			'refuse'   => 'texte_statut_refuse',
			'poubelle' => 'texte_statut_poubelle',
		),
		'statut'=> array(
			array(
				'champ'     => 'statut',
				'publie'    => 'publie',
				'previsu'   => 'publie,prop,prepa',
				'post_date' => 'date', 
				'exception' => array('statut','tout')
			)
		),
		'texte_changer_statut' => 'contact:texte_changer_statut_contact', 
		

	);

	return $tables;
}



?>