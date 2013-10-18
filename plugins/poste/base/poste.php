<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     MilleSeptCent
 * @copyright  2013
 * @author     Malik Khoubbane
 * @licence    GNU/GPL
 * @package    SPIP\Poste\Pipelines
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
function poste_declarer_tables_interfaces($interfaces) {

	$interfaces['table_des_tables']['videos'] = 'videos';
	$interfaces['table_des_tables']['textes'] = 'textes';
	$interfaces['table_des_tables']['images'] = 'images';
	$interfaces['table_des_tables']['citations'] = 'citations';

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
function poste_declarer_tables_objets_sql($tables) {

	$tables['spip_videos'] = array(
		'type' => 'video',
		'principale' => "oui",
		'field'=> array(
			"id_video"           => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"titre"              => "tinytext",
			"description"        => "text NOT NULL DEFAULT ''",
			"url"                => "tinytext NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_video",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('titre', 'description', 'url'),
		'champs_versionnes' => array('titre', 'description', 'url'),
		'rechercher_champs' => array("titre" => 10, "description" => 8),
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
		'texte_changer_statut' => 'video:texte_changer_statut_video', 
		

	);

	$tables['spip_textes'] = array(
		'type' => 'texte',
		'principale' => "oui",
		'field'=> array(
			"id_texte"           => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"titre"              => "tinytext NOT NULL DEFAULT ''",
			"description"        => "text NOT NULL DEFAULT ''",
			"texte"              => "text NOT NULL DEFAULT ''",
			"url_video"          => "tinytext NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_texte",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('titre', 'description', 'texte', 'url_video'),
		'champs_versionnes' => array('titre', 'description', 'texte', 'url_video'),
		'rechercher_champs' => array("titre" => 10, "description" => 8, "texte" => 8),
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
		'texte_changer_statut' => 'texte:texte_changer_statut_texte', 
		

	);

	$tables['spip_images'] = array(
		'type' => 'image',
		'principale' => "oui",
		'field'=> array(
			"id_image"           => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"titre"              => "tinytext NOT NULL DEFAULT ''",
			"description"        => "text NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_image",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "titre AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('titre', 'description'),
		'champs_versionnes' => array('titre', 'description'),
		'rechercher_champs' => array("titre" => 10, "description" => 8),
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
		'texte_changer_statut' => 'image:texte_changer_statut_image', 
		

	);

	$tables['spip_citations'] = array(
		'type' => 'citation',
		'principale' => "oui",
		'field'=> array(
			"id_citation"        => "bigint(21) NOT NULL",
			"id_rubrique"        => "bigint(21) NOT NULL DEFAULT 0", 
			"id_secteur"         => "bigint(21) NOT NULL DEFAULT 0", 
			"auteur"             => "tinytext NOT NULL DEFAULT ''",
			"texte"              => "text NOT NULL DEFAULT ''",
			"liens"              => "tinytext NOT NULL DEFAULT ''",
			"statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
			"maj"                => "TIMESTAMP"
		),
		'key' => array(
			"PRIMARY KEY"        => "id_citation",
			"KEY id_rubrique"    => "id_rubrique", 
			"KEY id_secteur"     => "id_secteur", 
			"KEY statut"         => "statut", 
		),
		'titre' => "auteur AS titre, '' AS lang",
		 #'date' => "",
		'champs_editables'  => array('auteur', 'texte', 'liens'),
		'champs_versionnes' => array('auteur', 'texte', 'liens'),
		'rechercher_champs' => array("auteur" => 10, "texte" => 8),
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
		'texte_changer_statut' => 'citation:texte_changer_statut_citation', 
		

	);

	return $tables;
}



?>