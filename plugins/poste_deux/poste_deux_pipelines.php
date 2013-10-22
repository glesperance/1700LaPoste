<?php
/**
 * Utilisations de pipelines par MilleSeptCentDeux
 *
 * @plugin     MilleSeptCentDeux
 * @copyright  2013
 * @author     admin
 * @licence    GNU/GPL
 * @package    SPIP\Poste_deux\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	

/**
 * Ajouter les objets sur les vues de rubriques
 *
 * @pipeline affiche_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function poste_deux_affiche_enfants($flux) {
	if ($e = trouver_objet_exec($flux['args']['exec'])
		AND $e['type'] == 'rubrique'
		AND $e['edition'] == false) {

		$id_rubrique = $flux['args']['id_rubrique'];
		$lister_objets = charger_fonction('lister_objets', 'inc');

		$bouton = '';
		if (autoriser('creerfactdans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("fact:icone_creer_fact"), generer_url_ecrire("fact_edit", "id_rubrique=$id_rubrique"), "fact-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('facts', array('titre'=>_T('fact:titre_facts_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'premier_champs'));
		$flux['data'] .= $bouton;

		$bouton = '';
		if (autoriser('creercontactdans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("contact:icone_creer_contact"), generer_url_ecrire("contact_edit", "id_rubrique=$id_rubrique"), "contact-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('contacts', array('titre'=>_T('contact:titre_contacts_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'nom'));
		$flux['data'] .= $bouton;

		$bouton = '';
		if (autoriser('creerrevuedans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("revue:icone_creer_revue"), generer_url_ecrire("revue_edit", "id_rubrique=$id_rubrique"), "revue-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('revues', array('titre'=>_T('revue:titre_revues_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'titre'));
		$flux['data'] .= $bouton;

	}
	return $flux;
}

function poste_deux_calculer_rubriques($flux){

	$r = sql_select("R.id_rubrique AS id, spip_rubriques AS R, spip_facts AS E, spip_contacts AS F, spip_revues AS G", 
                        "(R.id_rubrique = E.id_rubrique AND E.statut='publie' ) or ".
						"(R.id_rubrique = F.id_rubrique AND E.statut='publie' ) or ".
                        "(R.id_rubrique = G.id_rubrique AND F.statut='publie' )",
                        "R.id_rubrique");
	while ($row = sql_fetch($r))
	  sql_updateq('spip_rubriques', array('statut_tmp'=>'publie'), "id_rubrique=".$row['id']);	
		
	return $flux;
}


?>