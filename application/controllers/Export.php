<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("MAdmin", "ma");
		$this->load->helper('download');
		$this->load->library('pdf');
	}

	public function printPerkara(){
		$data['p_on_process'] = $this->ma->tampilDataPerkara();
		$data['p_putusan'] = $this->ma->tampilDataPerkaraPutusan();
		$data['p_putus'] = $this->ma->tampilLaporanPerkaraPutus();
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->filename = "laporan_perkara_tahunan.pdf";
		$this->pdf->load_view('laporan', $data);
	}
}

?>