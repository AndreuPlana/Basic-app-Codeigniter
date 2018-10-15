<?php

class loged extends CI_Controller {
	public function __construct()
        {
        	parent::__construct();
			$this->load->helper(array('form', 'url'));
		} 

	public function index()
	{

		session_start();
			
		$this->load->helper('form');
		if($_SESSION["stat"]!="true")
		{
			$this->load->view("inici_sessio");
		}else{
			//print_r($_SESSION["user"]);
			$this->load->helper('form',array('error' => ' ' ));
			$this->load->model("modelregistre");
			$sql ="select nomF from fitxers where codiU='".$_SESSION["user"]."'";
			$dades['fit']=$this->modelregistre->select($sql);
			$sql ="select nomF from fitxers f , compartir c  where f.codiF=c.codiF and c.codiUC='".$_SESSION["user"]."'";
			$dades['fcomp']=$this->modelregistre->select($sql);
			$this->load->view('main',$dades);
		}
		
	}

	public function upload()
		{
			session_start();
			$config['upload_path']= './uploads/';
	        $config['allowed_types']= 'gif|jpg|png|pdf|zip';
	        $config['max_size'] = 4000;
	        $config['max_width'] = 1024;
	        $config['max_height'] = 768;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('main');

			}
			else{
				 $upload_data= $this->upload->data();
				 $this->load->model("modelregistre");
				$sql="insert into fitxers(nomF,tipusF,data,contingut,codiU) values('".$upload_data['file_name']."','".substr($upload_data['file_ext'], 1)."','".date('Y-m-d H:i:s')."','".$upload_data['full_path']."','".$_SESSION["user"]."')";
				$dads=$this->modelregistre->insert($sql);
				$sql ="select nomF from fitxers where codiU='".$_SESSION["user"]."'";
				
				$dades['fit']=$this->modelregistre->select($sql);
				$sql ="select nomF from fitxers f , compartir c  where f.codiF=c.codiF and c.codiUC='".$_SESSION["user"]."'";
				$dades['fcomp']=$this->modelregistre->select($sql);
				$this->load->view('main',$dades);
			}
		}

		public function accio(){
			session_start();

			$accio = $this->input->post('acc');
			$fitxer = $this->input->post('fitxers');
			$this->load->model("modelregistre");
			//print_r($accio);
			if($accio=="Eliminar")
			{

				$sql = "select codiF from fitxers where nomF='".$fitxer."'";
				$code=$this->modelregistre->select($sql);
				$sql = "delete from compartir where codiF ='".$code[0]['codiF']."'";
				$this->modelregistre->insert($sql);	
				$sql = "delete from fitxers  where nomF='".$fitxer."'";
				$this->modelregistre->insert($sql);


			}
			if($accio=="Descarregar")
			{
				//print_r("entrat");
				$this->load->helper('download');
				$loc = "./uploads/".$fitxer;
				force_download($loc, NULL);
			}

			if($accio=="Compartir")
			{
				$user = $this->input->post('compa');
				$sql ="select codiF from fitxers where nomF = '".$fitxer."'";
				$codi = $this->modelregistre->select($sql);
				//print_r($codi[0]["codiF"]);
				$sql = "Insert into compartir(codiF,codiUC) values ('".$codi[0]["codiF"]."','".$user."')";
				$this->modelregistre->insert($sql);

			}

			if($accio=="Info")
			{
				$sql = "select nomF as NomFitxer,data,codiU as CodiUsuari from fitxers where nomF='".$fitxer."'";
				$dades['info']=$this->modelregistre->select($sql);
				$sql = "select codiF from fitxers where nomF='".$fitxer."'";
				$code=$this->modelregistre->select($sql);
				$sql = "select codiUC from compartir where codiF='".$code[0]['codiF']."'";
				$dades['ucomp']=$this->modelregistre->select($sql);



			}
			if($accio=="Info2")
			{
				$sql = "select nomF as NomFitxer,data,codiU as CodiUsuari from fitxers where nomF='".$fitxer."'";
				$dades['info2']=$this->modelregistre->select($sql);
				$sql = "select codiF from fitxers where nomF='".$fitxer."'";
				$code=$this->modelregistre->select($sql);
				$sql = "select codiUC from compartir where codiF='".$code[0]['codiF']."'";
				$dades['ucomp2']=$this->modelregistre->select($sql);

			}


			$this->load->helper('form',array('error' => ' ' ));
			$this->load->model("modelregistre");
			$sql ="select nomF from fitxers where codiU='".$_SESSION["user"]."'";
			$dades['fit']=$this->modelregistre->select($sql);
			$sql ="select nomF from fitxers f , compartir c  where f.codiF=c.codiF and c.codiUC='".$_SESSION["user"]."'";
			$dades['fcomp']=$this->modelregistre->select($sql);
			$this->load->view('main',$dades);


		}



	public function exit(){

		session_start();
		session_destroy();
		
		$this->load->helper('form');
		$this->load->view('inici_sessio');
	}
	

}
?>