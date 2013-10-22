<?php

/**
 *  Fichier généré par la Fabrique de plugin v5
 *   le 2013-10-22 03:59:18
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
    'nom' => 'MilleSeptCentDeux',
    'slogan' => '',
    'description' => '',
    'prefixe' => 'poste_deux',
    'version' => '1.0.0',
    'auteur' => 'admin',
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
      'nom' => 'Facts',
      'nom_singulier' => 'Fact',
      'genre' => 'masculin',
      'logo_variantes' => '',
      'table' => 'spip_facts',
      'cle_primaire' => 'id_fact',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'fact',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Premier-champs',
          'champ' => 'premier_champs',
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
          'nom' => 'Deuxieme-champs',
          'champ' => 'deuxieme_champs',
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
      ),
      'champ_titre' => 'premier_champs',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
        2 => 'vue_rubrique',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Facts',
        'titre_objet' => 'Fact',
        'info_aucun_objet' => 'Aucun fact',
        'info_1_objet' => 'Un fact',
        'info_nb_objets' => '@nb@ facts',
        'icone_creer_objet' => 'Créer un fact',
        'icone_modifier_objet' => 'Modifier ce fact',
        'titre_logo_objet' => 'Logo de ce fact',
        'titre_langue_objet' => 'Langue de ce fact',
        'titre_objets_rubrique' => 'Facts de la rubrique',
        'info_objets_auteur' => 'Les facts de cet auteur',
        'retirer_lien_objet' => 'Retirer ce fact',
        'retirer_tous_liens_objets' => 'Retirer tous les facts',
        'ajouter_lien_objet' => 'Ajouter ce fact',
        'texte_ajouter_objet' => 'Ajouter un fact',
        'texte_creer_associer_objet' => 'Créer et associer un fact',
        'texte_changer_statut_objet' => 'Ce fact est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
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
      'nom' => 'Contacts',
      'nom_singulier' => 'Contact',
      'genre' => 'masculin',
      'logo_variantes' => '',
      'table' => 'spip_contacts',
      'cle_primaire' => 'id_contact',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'contact',
      'champs' => 
      array (
        0 => 
        array (
          'nom' => 'Nom',
          'champ' => 'nom',
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
          'nom' => 'Poste',
          'champ' => 'poste',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        2 => 
        array (
          'nom' => 'Courriel',
          'champ' => 'courriel',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
        array (
          'nom' => 'Telephone',
          'champ' => 'telephone',
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
      'champ_titre' => 'nom',
      'rubriques' => 
      array (
        0 => 'id_rubrique',
        1 => 'id_secteur',
        2 => 'vue_rubrique',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Contacts',
        'titre_objet' => 'Contact',
        'info_aucun_objet' => 'Aucun contact',
        'info_1_objet' => 'Un contact',
        'info_nb_objets' => '@nb@ contacts',
        'icone_creer_objet' => 'Créer un contact',
        'icone_modifier_objet' => 'Modifier ce contact',
        'titre_logo_objet' => 'Logo de ce contact',
        'titre_langue_objet' => 'Langue de ce contact',
        'titre_objets_rubrique' => 'Contacts de la rubrique',
        'info_objets_auteur' => 'Les contacts de cet auteur',
        'retirer_lien_objet' => 'Retirer ce contact',
        'retirer_tous_liens_objets' => 'Retirer tous les contacts',
        'ajouter_lien_objet' => 'Ajouter ce contact',
        'texte_ajouter_objet' => 'Ajouter un contact',
        'texte_creer_associer_objet' => 'Créer et associer un contact',
        'texte_changer_statut_objet' => 'Ce contact est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
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
      'nom' => 'Revues',
      'nom_singulier' => 'Revue',
      'genre' => 'feminin',
      'logo_variantes' => '',
      'table' => 'spip_revues',
      'cle_primaire' => 'id_revue',
      'cle_primaire_sql' => 'bigint(21) NOT NULL',
      'table_type' => 'revue',
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
          'nom' => 'Extrait',
          'champ' => 'extrait',
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
          'nom' => 'Média',
          'champ' => 'media',
          'sql' => 'tinytext NOT NULL DEFAULT \'\'',
          'caracteristiques' => 
          array (
            0 => 'editable',
            1 => 'versionne',
          ),
          'recherche' => '8',
          'saisie' => 'input',
          'explication' => '',
          'saisie_options' => '',
        ),
        3 => 
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
        2 => 'vue_rubrique',
      ),
      'champ_date' => '',
      'statut' => 'on',
      'chaines' => 
      array (
        'titre_objets' => 'Revues',
        'titre_objet' => 'Revue',
        'info_aucun_objet' => 'Aucune revue',
        'info_1_objet' => 'Une revue',
        'info_nb_objets' => '@nb@ revues',
        'icone_creer_objet' => 'Créer une revue',
        'icone_modifier_objet' => 'Modifier cette revue',
        'titre_logo_objet' => 'Logo de cette revue',
        'titre_langue_objet' => 'Langue de cette revue',
        'titre_objets_rubrique' => 'Revues de la rubrique',
        'info_objets_auteur' => 'Les revues de cet auteur',
        'retirer_lien_objet' => 'Retirer cette revue',
        'retirer_tous_liens_objets' => 'Retirer toutes les revues',
        'ajouter_lien_objet' => 'Ajouter cette revue',
        'texte_ajouter_objet' => 'Ajouter une revue',
        'texte_creer_associer_objet' => 'Créer et associer une revue',
        'texte_changer_statut_objet' => 'Cette revue est :',
      ),
      'table_liens' => '',
      'roles' => '',
      'auteurs_liens' => '',
      'vue_auteurs_liens' => '',
      'echafaudages' => 
      array (
        0 => 'prive/squelettes/contenu/objets.html',
        1 => 'prive/objets/infos/objet.html',
        2 => 'prive/squelettes/contenu/objet.html',
      ),
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
    ),
  ),
);

?>