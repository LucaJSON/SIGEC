<?php

class Usuarios_model extends CI_Model{
    public function user($usuario){
        $this->db->insert("user", $usuario);
    }
    public function telefone($telefone){
        $this->db->insert("telefone", $telefone);
    }
    public function empresa($empresa){
        $this->db->insert("empresa", $empresa);
    }

    public function buscarUser($senha){
        $this->db->select("*");
        $this->db->from("user u");
        $this->db->where("u.senha", $senha);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }
    public function buscarEmpresa($email){
        $this->db->select("*");
        $this->db->from("empresa e");
        $this->db->where("e.email", $email);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }
    public function buscarTelefone($usuario){
        $this->db->select("número");
        $this->db->from("telefone t");
        $this->db->join("empresa e", "t.empresa_user_idUser =".$usuario['idUser']);
        $telefone = $this->db->get()->row_array();
        return $telefone;
    }

    public function logarUsers($email, $senha){
        $this->db->select("*");
        $this->db->from("empresa e");
        $this->db->join("user u", "u.idUser = e.user_idUser");
        $this->db->where("e.email", $email);
        $this->db->where("u.senha", $senha);
        $usuario = $this->db->get()->row_array();
        return $usuario;
    }

    public function inserirVaga($vaga, $idCurso){
        $this->db->insert("vaga", $vaga);
        $vagaId = $this->db->insert_id();
        $vaga_curso = array(
            "vaga_idVaga" => $vagaId,
            "curso_idCurso" => $idCurso
        );
        $this->db->insert("vaga_curso",$vaga_curso);
        $this->session->set_flashdata("succes", "Cadastrada com sucesso!");
        redirect("/empresa");
    }

}
