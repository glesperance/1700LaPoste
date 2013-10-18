<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2013-10-16 01:26:21
 *
 *  Ce fichier de sauvegarde peut servir à recréer
 *  votre plugin avec le plugin «Fabrique» qui a servi à le créer.
 *
 *  Bien évidemment, les modifications apportées ultérieurement
 *  par vos soins dans le code de ce plugin généré
 *  NE SERONT PAS connues du plugin «Fabrique» et ne pourront pas
 *  être recréées par lui !
 *
 *  La «Fabrique» ne pourra que régénerer le code de base du plugin
 *  avec les informations dont il dispose.
 *
**/

if (!defined("_ECRIRE_INC_VERSION")) return;

$data = array (
  'fabrique' => 
  array (
    'version' => 5,
  ),
  'paquet' => 
  array (
    'nom' => 'MilleSeptCent',
    'slogan' => '',
    'description' => '',
    'prefixe' => 'poste',
    'version' => '1.0.0',
    'auteur' => 'Malik Khoubbane',
    'auteur_lien' => '',
    'licence' => 'GNU/GPL',
    'categorie' => 'outil',
    'etat' => 'dev',
    'compatibilite' => '[3.0.11;3.0.*]',
    'documentation' => '',
    'administrations' => 'on',
    'schema' => '1.0.0',
    'formulaire_config' => '',
    'formulaire_config_titre' => '',
    'fichiers' => 
    array (
      0 => 'pipelines',
    ),
    'inserer' => 
    array (
      'paquet' => '',
      'administrations' => 
      array (
        'maj' => '',
        'desinstallation' => '',
        'fin' => '',
      ),
      'base' => 
      array (
        'tables' => 
        array (
          'fin' => '',
        ),
      ),
    ),
    'scripts' => 
    array (
      'pre_copie' => '',
      'post_creation' => '',
    ),
    'exemples' => '',
  ),
  'objets' => 
  array (
    0 => 
    array (
      'nom' => 'Videos',
      'nom_singulier' => 'Video',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_videos',
      'cle_primaire' => 'id_video',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'video',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Titre',
          'champ' => 'titre',
          'sql' => 'tinytext',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '10',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Description',
          'champ' => 'description',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Url',
          'champ' => 'url',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'titre',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Videos',
        'titre_objet' => 'Video',
        'info_aucun_objet' => 'Aucune video',
        'info_1_objet' => 'Une video',
        'info_nb_objets' => '@nb@ videos',
        'icone_creer_objet' => 'Créer une video',
        'icone_modifier_objet' => 'Modifier cette video',
        'titre_logo_objet' => 'Logo de cette video',
        'titre_langue_objet' => 'Langue de cette video',
        'titre_objets_rubrique' => 'Videos de la rubrique',
        'info_objets_auteur' => 'Les videos de cet auteur',
        'retirer_lien_objet' => 'Retirer cette video',
        'retirer_tous_liens_objets' => 'Retirer toutes les videos',
        'ajouter_lien_objet' => 'Ajouter cette video',
        'texte_ajouter_objet' => 'Ajouter une video',
        'texte_creer_associer_objet' => 'Créer et associer une video',
        'texte_changer_statut_objet' => 'Cette video est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    1 => 
    array (
      'nom' => 'Textes',
      'nom_singulier' => 'Texte',
      'genre' => 'masculin',
      'logo_variantes' => '',
      'table' => 'spip_textes',
      'cle_primaire' => 'id_texte',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'texte',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Titre',
          'champ' => 'titre',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '10',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Description',
          'champ' => 'description',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Texte',
          'champ' => 'texte',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'UrlVidéo',
          'champ' => 'url_video',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'titre',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Textes',
        'titre_objet' => 'Texte',
        'info_aucun_objet' => 'Aucun texte',
        'info_1_objet' => 'Un texte',
        'info_nb_objets' => '@nb@ textes',
        'icone_creer_objet' => 'Créer un texte',
        'icone_modifier_objet' => 'Modifier ce texte',
        'titre_logo_objet' => 'Logo de ce texte',
        'titre_langue_objet' => 'Langue de ce texte',
        'titre_objets_rubrique' => 'Textes de la rubrique',
        'info_objets_auteur' => 'Les textes de cet auteur',
        'retirer_lien_objet' => 'Retirer ce texte',
        'retirer_tous_liens_objets' => 'Retirer tous les textes',
        'ajouter_lien_objet' => 'Ajouter ce texte',
        'texte_ajouter_objet' => 'Ajouter un texte',
        'texte_creer_associer_objet' => 'Créer et associer un texte',
        'texte_changer_statut_objet' => 'Ce texte est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    2 => 
    array (
      'nom' => 'Images',
      'nom_singulier' => 'Image',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_images',
      'cle_primaire' => 'id_image',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'image',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Titre',
          'champ' => 'titre',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '10',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Description',
          'champ' => 'description',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'titre',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Images',
        'titre_objet' => 'Image',
        'info_aucun_objet' => 'Aucune image',
        'info_1_objet' => 'Une image',
        'info_nb_objets' => '@nb@ images',
        'icone_creer_objet' => 'Créer une image',
        'icone_modifier_objet' => 'Modifier cette image',
        'titre_logo_objet' => 'Logo de cette image',
        'titre_langue_objet' => 'Langue de cette image',
        'titre_objets_rubrique' => 'Images de la rubrique',
        'info_objets_auteur' => 'Les images de cet auteur',
        'retirer_lien_objet' => 'Retirer cette image',
        'retirer_tous_liens_objets' => 'Retirer toutes les images',
        'ajouter_lien_objet' => 'Ajouter cette image',
        'texte_ajouter_objet' => 'Ajouter une image',
        'texte_creer_associer_objet' => 'Créer et associer une image',
        'texte_changer_statut_objet' => 'Cette image est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
    3 => 
    array (
      'nom' => 'Citations',
      'nom_singulier' => 'Citation',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_citations',
      'cle_primaire' => 'id_citation',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'citation',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Auteur',
          'champ' => 'auteur',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '10',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        1 => 
        array (
          'nom' => 'Texte',
          'champ' => 'texte',
          'sql' => 'text NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'textarea',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Liens',
          'champ' => 'liens',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
      ),
      'champ_titre' => 'auteur',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Citations',
        'titre_objet' => 'Citation',
        'info_aucun_objet' => 'Aucune citation',
        'info_1_objet' => 'Une citation',
        'info_nb_objets' => '@nb@ citations',
        'icone_creer_objet' => 'Créer une citation',
        'icone_modifier_objet' => 'Modifier cette citation',
        'titre_logo_objet' => 'Logo de cette citation',
        'titre_langue_objet' => 'Langue de cette citation',
        'titre_objets_rubrique' => 'Citations de la rubrique',
        'info_objets_auteur' => 'Les citations de cet auteur',
        'retirer_lien_objet' => 'Retirer cette citation',
        'retirer_tous_liens_objets' => 'Retirer toutes les citations',
        'ajouter_lien_objet' => 'Ajouter cette citation',
        'texte_ajouter_objet' => 'Ajouter une citation',
        'texte_creer_associer_objet' => 'Créer et associer une citation',
        'texte_changer_statut_objet' => 'Cette citation est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'autorisations' => 
      array (
        'objet_creer' => '',
        'objet_voir' => '',
        'objet_modifier' => '',
        'objet_supprimer' => '',
        'associerobjet' => '',
      ),
      'boutons' => 
      array (
        0 => 'menu_edition',
        1 => 'outils_rapides',
      ),
    ),
  ),
  'images' => 
  array (
    'paquet' => 
    array (
      'logo' => 
      array (
        0 => 
        array (
          'extension' => '',
          'contenu' => '',
        ),
      ),
    ),
    'objets' => 
    array (
      0 => 
      array (
      ),
      1 => 
      array (
      ),
      2 => 
      array (
      ),
      3 => 
      array (
      ),
    ),
  ),
);

?>