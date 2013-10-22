<?php
/**
 * Utilisations de pipelines par MilleSeptCent
 *
 * @plugin     MilleSeptCent
 * @copyright  2013
 * @author     Malik Khoubbane
 * @licence    GNU/GPL
 * @package    SPIP\Poste\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	

/**
 * Ajouter les objets sur les vues de rubriques
 *
 * @pipeline affiche_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
**/
function poste_affiche_enfants($flux) {
	if ($e = trouver_objet_exec($flux['args']['exec'])
		AND $e['type'] == 'rubrique'
		AND $e['edition'] == false) {

		$id_rubrique = $flux['args']['id_rubrique'];
		$lister_objets = charger_fonction('lister_objets', 'inc');

		$bouton = '';
		if (autoriser('creervideodans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("video:icone_creer_video"), generer_url_ecrire("video_edit", "id_rubrique=$id_rubrique"), "video-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('videos', array('titre'=>_T('video:titre_videos_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'titre'));
		$flux['data'] .= $bouton;

		$bouton = '';
		if (autoriser('creertextedans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("texte:icone_creer_texte"), generer_url_ecrire("texte_edit", "id_rubrique=$id_rubrique"), "texte-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('textes', array('titre'=>_T('texte:titre_textes_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'titre'));
		$flux['data'] .= $bouton;

		$bouton = '';
		if (autoriser('creerimagedans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("image:icone_creer_image"), generer_url_ecrire("image_edit", "id_rubrique=$id_rubrique"), "image-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('images', array('titre'=>_T('image:titre_images_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'titre'));
		$flux['data'] .= $bouton;

		$bouton = '';
		if (autoriser('creercitationdans', 'rubrique', $id_rubrique)) {
			$bouton .= icone_verticale(_T("citation:icone_creer_citation"), generer_url_ecrire("citation_edit", "id_rubrique=$id_rubrique"), "citation-24.png", "new", "right")
					. "<br class='nettoyeur' />";
		}

		$flux['data'] .= $lister_objets('citations', array('titre'=>_T('citation:titre_citations_rubrique') , 'id_rubrique'=>$id_rubrique, 'par'=>'auteur'));
		$flux['data'] .= $bouton;

	}
	return $flux;
}

function poste_calculer_rubriques($flux){

	$r = sql_select("R.id_rubrique AS id, spip_rubriques AS R, spip_videos AS A, spip_textes AS B, spip_images AS C, spip_citations AS D", 
                        "(R.id_rubrique = A.id_rubrique AND A.statut='publie' ) or ".
                        "(R.id_rubrique = B.id_rubrique AND B.statut='publie' ) or ".
                        "(R.id_rubrique = C.id_rubrique AND C.statut='publie' ) or ".
                        "(R.id_rubrique = D.id_rubrique AND D.statut='publie' )",
                        "R.id_rubrique");
	while ($row = sql_fetch($r))
	  sql_updateq('spip_rubriques', array('statut_tmp'=>'publie'), "id_rubrique=".$row['id']);	
		
	return $flux;
}


?>