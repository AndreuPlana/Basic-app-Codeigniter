<?php

class registre extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->view('registrar');
	}
	public function reg(){
		$this->load->helper('form');
		//$this->load->library('form_validation');
		

		$codi = $this->input->post('codi');
		$correu = $this->input->post('email');
		$password = $this->input->post('password');
		$telefon = $this->input->post('telefon');
		// La validacio funciona, pero si la poso , el model peta


		// $this->form_validation->set_rules('codi','Codi', 'required');
		// $this->form_validation->set_rules('email','Email', 'required|valid_email',array('valid_email' =>'Correu amb format incorrecte'));
		// $this->form_validation->set_rules('password','Password','required');
		// $this->form_validation->set_rules('rpassword','Confirmacio de Password','required|matches[password]',array('matches' =>'Les contrasenyes no coincideixen'));
		// $this->form_validation->set_rules('telefon','Telefon', 'required');
		
		// if ($this->form_validation->run() == FALSE){
		// 	$this->load->view('registrar');
		// }
		// else{
			$sql="insert into usuaris(codiU,correu,password,telefon) values('".$codi."','".$correu."','".$password."','".$telefon."')";
			$this->load->model("modelregistre");
			$dads=$this->modelregistre->insert($sql);
			$this->load->view('inici_sessio');
		// }
		


	}

	
}



?>