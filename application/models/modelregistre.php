<?php



class modelregistre extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function select($sql){
        $res = $this->db->query($sql);
        $d = $res->result_array();
        return $d;
    }

    public function insert($sql){
        $res = $this->db->query($sql);


    }
    public function update($sql){
        $res = $this->db->query($sql);

        return $res;
    }

    public function returndades($sql){
        $res = $this->db->query($sql);
        $d = $res->result_array();
        return $d;
    }

}
?>