<?php
// This is a SPIP language file  --  Ceci est un fichier langue de SPIP
// extrait automatiquement de http://trad.spip.net/tradlang_module/verifier?lang_cible=fr_tu
// ** ne pas modifier le fichier **

if (!defined('_ECRIRE_INC_VERSION')) return;

$GLOBALS[$GLOBALS['idx_lang']] = array(

	// E
	'erreur_code_postal' => 'Ce code postal est incorrect.',
	'erreur_date' => 'La date n’est pas valide.',
	'erreur_date_format' => 'Le format de la date n’est pas accepté.',
	'erreur_decimal' => 'La valeur doit être un nombre décimal.',
	'erreur_decimal_nb_decimales' => 'Le nombre ne doit pas avoir plus de @nb_decimales@ chiffres après la virgule.',
	'erreur_email' => '@email@</em> n’a pas un format valide.',
	'erreur_email_nondispo' => 'L’adresse de courriel <em>@email@</em> est déjà utilisée.',
	'erreur_entier' => 'La valeur doit être un entier.',
	'erreur_entier_entre' => 'La valeur doit être comprise entre @min@ et @max@.',
	'erreur_entier_max' => 'La valeur doit être inférieure à @max@.',
	'erreur_entier_min' => 'La valeur doit être supérieure à @min@.',
	'erreur_id_document' => 'Cet identifiant de document n’est pas valide.',
	'erreur_numerique' => 'Le format du nombre n’est pas valide.',
	'erreur_regex' => 'Le format de la chaîne n’est pas valide.',
	'erreur_siren' => 'Le numéro de SIREN n’est pas valide.',
	'erreur_siret' => 'Le numéro de SIRET n’est pas valide.',
	'erreur_taille_egal' => 'La valeur doit comprendre exactement @egal@ caractères.', # MODIF
	'erreur_taille_entre' => 'La valeur doit comprendre entre @min@ et @max@ caractères.', # MODIF
	'erreur_taille_max' => 'La valeur doit comprendre au maximum @max@ caractères.', # MODIF
	'erreur_taille_min' => 'La valeur doit comprendre au minimum @min@ caractères.', # MODIF
	'erreur_telephone' => 'Le numéro n’est pas valide.', # MODIF
	'erreur_url' => 'L’adresse <em>@url@</em> n’est pas valide.',
	'erreur_url_protocole' => 'L’adresse saisie <em>(@url@)</em> doit commencer par @protocole@',
	'erreur_url_protocole_exact' => 'L’adresse saisie <em>(@url@)</em> ne commence pas par un protocole valide (http:// par exemple)',

	// O
	'option_decimal_nb_decimales_label' => 'Nombre de décimales après la virgule',
	'option_email_disponible_label' => 'Adresse disponible',
	'option_email_disponible_label_case' => 'Vérifier que l’adresse n’est pas déjà utilisée par un utilisateur',
	'option_email_mode_5322' => 'Vérification la plus conforme aux standards disponibles',
	'option_email_mode_label' => 'Mode de vérification des courriels',
	'option_email_mode_normal' => 'Vérification normale de SPIP',
	'option_email_mode_strict' => 'Vérification moins permissive',
	'option_entier_max_label' => 'Valeur maximum',
	'option_entier_min_label' => 'Valeur minimum',
	'option_regex_modele_label' => 'La valeur doit correspondre au masque suivant',
	'option_siren_siret_mode_label' => 'Que veux-tu vérifier ?', # MODIF
	'option_siren_siret_mode_siren' => 'le SIREN',
	'option_siren_siret_mode_siret' => 'le SIRET',
	'option_taille_max_label' => 'Taille maximum',
	'option_taille_min_label' => 'Taille minimum',
	'option_url_mode_complet' => 'Vérification complète de l’url',
	'option_url_mode_label' => 'Mode de vérification des urls',
	'option_url_mode_php_filter' => 'Vérification complète de l’url via le filtre FILTER_VALIDATE_URL de php',
	'option_url_mode_protocole_seul' => 'Vérification uniquement de la présence d’un protocole', # MODIF
	'option_url_protocole_label' => 'Nom du protocole à vérifier',
	'option_url_type_protocole_exact' => 'Saisir un protocole ci-dessous :',
	'option_url_type_protocole_ftp' => 'Protocoles ftp: ftp ou sftp',
	'option_url_type_protocole_label' => 'Type de protocole à vérifier',
	'option_url_type_protocole_mail' => 'Protocoles mail : imap, pop3 ou smtp',
	'option_url_type_protocole_tous' => 'Tous protocoles acceptés',
	'option_url_type_protocole_web' => 'Protocoles web : http ou https',

	// T
	'type_date' => 'Date',
	'type_date_description' => 'Vérifie que la valeur est une date au format JJ/MM/AAAA. Le séparateur est libre (".", "/", etc).',
	'type_decimal' => 'Nombre décimal',
	'type_decimal_description' => 'Vérifie que la valeur est un nombre décimal, avec la possibilité de restreindre entre deux valeurs et de préciser le nombre de décimales après la virgule.',
	'type_email' => 'Adresse de courriel',
	'type_email_description' => 'Vérifie que l’adresse de courriel a un format correct.',
	'type_email_disponible' => 'Disponibilité d’une adresse de courriel',
	'type_email_disponible_description' => 'Vérifie que l’adresse de courriel n’est pas déjà utilisé par un autre utilisateur du système.',
	'type_entier' => 'Nombre entier',
	'type_entier_description' => 'Vérifie que la valeur est un entier, avec la possibilité de restreindre entre deux valeurs.',
	'type_regex' => 'Expression régulière',
	'type_regex_description' => 'Vérifie que la valeur correspond au masque demandé. Pour l’utilisation des masques, reporte-toi à <a href="http://fr2.php.net/manual/fr/reference.pcre.pattern.syntax.php">l’aide en ligne de PHP</a>.', # MODIF
	'type_siren_siret' => 'SIREN ou SIRET',
	'type_siren_siret_description' => 'Vérifie que la valeur est un numéro valide du <a href="http://fr.wikipedia.org/wiki/SIREN">Système d’Identification du Répertoire des ENtreprises</a> français.',
	'type_taille' => 'Taille',
	'type_taille_description' => 'Vérifie que la taille de la valeur correspond au minimum et/ou au maximum demandé.',
	'type_telephone' => 'Numéro de téléphone',
	'type_telephone_description' => 'Vérifie que le numéro de téléphone correspond à un schéma reconnu.',
	'type_url' => 'URL',
	'type_url_description' => 'Vérifie que l’url correspond à un schéma reconnu.'
);

?>
