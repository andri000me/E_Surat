
<?php

class M_read extends CI_Model{
	function tampil_datasliderhome(){
		$query = $this->db->get('tbl_slider');
		return $query->result();
	}

	function tampil_datavisimisihome(){
		$query = $this->db->get('tbl_visimisi');
		return $query->result();
	}

	function tampil_datasurat(){
		$query = $this->db->get('surat');
		return $query->result();
	}

	function tampil_dataprofil(){
		$query = $this->db->get('sejarah');
		return $query->result();
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function tampil_datapaket(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('tbl_paket');
		return $query->result();
	}
	function tampil_databerita(){
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('tbl_berita');
		return $query->result();
	}

	function tampil_datagaleri(){
		$query = $this->db->get('tbl_galeri');
		return $query->result();
	}

	function tampil_datagalerivideo(){
		$query = $this->db->get('tbl_video');
		return $query->result();
	}

	function tampil_datacontact(){
		$query = $this->db->get('tbl_contact');
		return $query->result();
	}

	function tampil_datahajiplus(){
		$query = $this->db->get('tbl_hajiplus');
		return $query->result();
	}
	function tampil_datalayanan(){
		//$this->db->join('layanan', 'layanan.id = detil_layanan.id_layanan');
		$query = $this->db->get('layanan');
		return $query->result();
	}

	function tampil_datakategorilayanan(){
		$query = $this->db->get('layanan');
		return $query->result();
	}

	function tampil_datapesancontact(){
		$query = $this->db->get('tbl_pesan');
		return $query->result();
	}

	function tampil_datapesan($where,$table){
		return $this->db->get_where($table,$where);
	}

	function tampil_datapesanan(){
		$this->db->join('tbl_paket', 'tbl_paket.id = pesanan.id_paket');
		$query = $this->db->get('pesanan');
		return $query->result();
	}

	function tampil_datakategorilayananwhere($where){
		$query = $this->db->query("SELECT detil_layanan.*, layanan.* FROM detil_layanan JOIN layanan ON layanan.id = detil_layanan.id_layanan WHERE detil_layanan.id_detillayanan='$where'");
		return $query;
	}

	function lihatgambarpaket($where){
		$query = $this->db->query("SELECT * FROM tbl_fotopaket WHERE idpaket = '$where'");
		return $query;
	}

	function editgambarpaket($where){
		$query = $this->db->query("SELECT tbl_fotopaket.*, tbl_paket.*, tbl_fotopaket.`id` AS idgambarpaket
		FROM tbl_paket
		JOIN tbl_fotopaket ON tbl_fotopaket.`idpaket` = tbl_paket.`id`
		WHERE tbl_paket.id='$where'");
		return $query;
	}

	function tampilpaket(){
		$query = $this->db->query("SELECT foto FROM tbl_fotopaket");
		return $query;
	}

	function tampil_datapaket_id(){
		$query = $this->db->query("SELECT MAX(id) AS idtambah FROM tbl_paket LIMIT 1");
		return $query;
	}

	function layananbackend(){
		$query = $this->db->query("SELECT layanan.*, detil_layanan.*
		FROM layanan
		JOIN detil_layanan ON detil_layanan.`id_layanan` = layanan.`id`");
		return $query;
	}

	function tampil_datakategorigaleri(){
		$query = $this->db->get('tbl_kategorifoto');
		return $query->result();
	}

	function kategorifoto(){
		$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
		FROM tbl_galeri
		JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
		ORDER BY tbl_galeri.`id` DESC");
		return $query;
	}

	function kategorieditfoto($id){
		$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
		FROM tbl_galeri
		JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
		WHERE tbl_galeri.`id` = '$id'");
		return $query;
	}

	function folderdetail($id){
		$query = $this->db->query("SELECT tbl_galeri.*, tbl_kategorifoto.*, tbl_galeri.`id` AS idfolder
		FROM tbl_galeri
		JOIN tbl_kategorifoto ON tbl_kategorifoto.`id` = tbl_galeri.`id_kategorifoto`
		WHERE tbl_galeri.`id_kategorifoto` = '$id'
		ORDER BY tbl_galeri.`id` DESC");
		return $query;
	}

}