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