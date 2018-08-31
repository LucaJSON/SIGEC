<?php

class Empresas_model extends CI_Model{
    public function dadosEmpresa(){
        return $this->db->get("empresa")->result_array();
    }
}
