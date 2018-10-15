<?php

class Inici extends CI_Controller {

	public function index()
	{
		session_start();
		$this->load->helper('form');
		if(@$_SESSION["stat"]!="true")
		{
			$this->load->view('inici_sessio');
		}else{
			$this->load->view('main');
		}

		
	}
	public function entrar(){
		session_start();
		if(@$_SESSION["stat"]=="true")
		{
			$this->load->helper('form',array('error' => ' ' ));
			$this->load->model("modelregistre");
			$sql ="select nomF from fitxers where codiU='".$_SESSION["user"]."'";
			$dades['fit']=$this->modelregistre->select($sql);
			$sql ="select nomF from fitxers f , compartir c  where f.codiF=c.codiF and c.codiUC='".$_SESSION["user"]."'";
			$dades['fcomp']=$this->modelregistre->select($sql);
			$this->load->view('main',$dades);
			
		}
		
		$this->load->helper('form');
		$this->load->model("modelregistre");
		$correu = $this->input->post('email');
		$password = $this->input->post('password');
		

		$sql="select codiU from usuaris where correu = '".$correu."' and password='".$password."'";

		$v=$this->modelregistre->select($sql);
		
		$h=@$v[0][codiU];
		//print_r($h);

		if(!empty($h))
		{
			$_SESSION["user"]=$h;
			$_SESSION["stat"]="true";
			$this->load->model("modelregistre");
			$this->load->helper('form',array('error' => ' ' ));
			$sql ="select nomF from fitxers where codiU='".$_SESSION["user"]."'";
			$dades['fit']=$this->modelregistre->select($sql);
			$sql ="select nomF from fitxers f , compartir c  where f.codiF=c.codiF and c.codiUC='".$_SESSION["user"]."'";
			$dades['fcomp']=$this->modelregistre->select($sql);
			$this->load->view('main',$dades);
		}else{
			//$this->load->view('No',$d); // pagina de check de errors
			$this->load->helper('form');
			$this->load->view('inici_sessio');

		}


	}


}



?>