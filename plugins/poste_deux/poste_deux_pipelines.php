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
	

function poste_deux_calculer_rubriques($flux){

	$r = sql_select("R.id_rubrique AS id, spip_rubriques AS R, spip_facts AS E, spip_contacts AS F", 
                        "(R.id_rubrique = C.id_rubrique AND E.statut='publie' ) or ".
                        "(R.id_rubrique = D.id_rubrique AND F.statut='publie' )",
                        "R.id_rubrique");
	while ($row = sql_fetch($r))
	  sql_updateq('spip_rubriques', array('statut_tmp'=>'publie'), "id_rubrique=".$row['id']);	
		
	return $flux;
}



/**
 * Ajout de liste sur la vue d'un auteur
 *
 * @pipeline affiche_auteurs_interventions
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function poste_deux_affiche_auteurs_interventions($flux) {
	if ($id_auteur = intval($flux['args']['id_auteur'])) {

		$flux['data'] .= recuperer_fond('prive/objets/liste/contacts', array(
			'id_auteur' => $id_auteur,
			'titre' => _T('contact:info_contacts_auteur')
		), array('ajax' => true));

	}
	return $flux;
}


?>