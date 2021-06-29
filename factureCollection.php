<?php
// Customer Invoice //
$type = 0
$socid = 'retrieve the rowid from llx_societe given the nom (name)'

$sql = "INSERT INTO ".MAIN_DB_PREFIX."facture (";
$sql .= " ref";
$sql .= ", entity";
$sql .= ", ref_ext";
$sql .= ", type";
$sql .= ", fk_soc";
$sql .= ", datec";
$sql .= ", remise_absolue";
$sql .= ", remise_percent";
$sql .= ", datef";
$sql .= ", date_pointoftax";
$sql .= ", note_private";
$sql .= ", note_public";
$sql .= ", ref_client, ref_int";
$sql .= ", fk_account";
$sql .= ", module_source, pos_source, fk_fac_rec_source, fk_facture_source, fk_user_author, fk_projet";
$sql .= ", fk_cond_reglement, fk_mode_reglement, date_lim_reglement, model_pdf";
$sql .= ", situation_cycle_ref, situation_counter, situation_final";
$sql .= ", fk_incoterms, location_incoterms";
$sql .= ", fk_multicurrency";
$sql .= ", multicurrency_code";
$sql .= ", multicurrency_tx";
$sql .= ", retained_warranty";
$sql .= ", retained_warranty_date_limit";
$sql .= ", retained_warranty_fk_cond_reglement";
$sql .= ")";

$sql .= " VALUES (";
// ref
$sql .= "'(PROV)'";
// entity
$sql .= ", 1";
// ref_ext
$sql .= ", NULL";
// type
$sql .= ', ' . $type;
// fk_soc
$sql .= ", ".((int) $socid);
// datec
$sql .= ", '".$this->db->idate($now)."'";
// remise_absolue
$sql .= ", ".($this->remise_absolue > 0 ? $this->remise_absolue : 'NULL');
// remise_percent
$sql .= ", ".($this->remise_percent > 0 ? $this->remise_percent : 'NULL');
// datef
$sql .= ", '".$this->db->idate($this->date)."'";
// date_pointoftax
$sql .=
	", ".
	(
		empty($this->date_pointoftax) ? "null" : "'".
		$this->db->idate($this->date_pointoftax).
		"'"
	)
;
// note_private
$sql .= ", ".($this->note_private ? "'".$this->db->escape($this->note_private)."'" : "null");
// note_public
$sql .= ", ".($this->note_public ? "'".$this->db->escape($this->note_public)."'" : "null");
// ref_client
$sql .= ", ".($this->ref_client ? "'".$this->db->escape($this->ref_client)."'" : "null");
// ref_int
$sql .= ", ".($this->ref_int ? "'".$this->db->escape($this->ref_int)."'" : "null");
// fk_account
$sql .= ", ".($this->fk_account > 0 ? $this->fk_account : 'NULL');
// module_source
$sql .= ", ".($this->module_source ? "'".$this->db->escape($this->module_source)."'" : "null");
// pos_source
$sql .= ", ".($this->pos_source != '' ? "'".$this->db->escape($this->pos_source)."'" : "null");
// fk_fac_rec_source
$sql .= ", ".($this->fk_fac_rec_source ? "'".$this->db->escape($this->fk_fac_rec_source)."'" : "null");
// fk_facture_source
$sql .= ", ".($this->fk_facture_source ? "'".$this->db->escape($this->fk_facture_source)."'" : "null");
// fk_user_author
$sql .= ", ".($user->id > 0 ? (int) $user->id : "null");
// fk_projet
$sql .= ", ".($this->fk_project ? $this->fk_project : "null");
// fk_cond_reglement
$sql .= ", ".$this->cond_reglement_id;
// fk_mode_reglement
$sql .= ", ".$this->mode_reglement_id;
// date_lim_reglement
$sql .= ", '".$this->db->idate($this->date_lim_reglement)."'";
// model_pdf
$sql .= ", ".(isset($this->model_pdf) ? "'".$this->db->escape($this->model_pdf)."'" : "null");
// situation_cycle_ref
$sql .= ", ".($this->situation_cycle_ref ? "'".$this->db->escape($this->situation_cycle_ref)."'" : "null");
// situation_counter
$sql .= ", ".($this->situation_counter ? "'".$this->db->escape($this->situation_counter)."'" : "null");
// situation_final
$sql .= ", ".($this->situation_final ? $this->situation_final : 0);
// fk_incoterms
$sql .= ", ".(int) $this->fk_incoterms;
// location_incoterms
$sql .= ", '".$this->db->escape($this->location_incoterms)."'";
// fk_multicurrency
$sql .= ", ".(int) $this->fk_multicurrency;
// multicurrency_code
$sql .= ", '".$this->db->escape($this->multicurrency_code)."'";
// multicurrency_tx
$sql .= ", ".(double) $this->multicurrency_tx;
// retained_warranty
$sql .= ", ".(empty($this->retained_warranty) ? "0" : $this->db->escape($this->retained_warranty));
// retained_warranty_date_limit
$sql .= ", ".(!empty($this->retained_warranty_date_limit) ? "'".$this->db->idate($this->retained_warranty_date_limit)."'" : 'NULL');
// retained_warranty_fk_cond_reglement
$sql .= ", ".(int) $this->retained_warranty_fk_cond_reglement;
$sql .= ")";