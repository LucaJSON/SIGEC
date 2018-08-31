<?php
class Usuarios extends CI_Controller {

		public function novo(){
            $this->load->model("usuarios_model");

            $senha = array(
                "senha"=> $this->input->post('senhaC')
            ) ;
            $this->usuarios_model->user($senha);
            $usuario = $this->usuarios_model->buscarUser($this->input->post('senhaC'));
            print_r($usuario);
            if($usuario){
                $this->cadastroEmpresa($usuario);
                $this->telefone($usuario);

                $this->session->set_flashdata("succes", "Cadastrado com sucesso!");
                redirect("/empresa");
            }
            print_r($usuario);

		}
        public function cadastroEmpresa($usuario){
            $empresa = array(
                "nome"=> $this->input->post('nome'),
                "email"=> $this->input->post('emailC'),
                "descrição"=> $this->input->post('descricao'),
                "user_idUser" => $usuario['idUser']
            );
            $this->usuarios_model->empresa($empresa);
        }
		public function telefone(){
            $usuario = $this->usuarios_model->buscarEmpresa($this->input->post('emailC'));
            $telefone = array(
                "ddd" => $this->input->post("ddd"),
                "número" => $this->input->post("telefone"),
                "empresa_idEmpresa" => $usuario['idEmpresa'],
                "empresa_user_idUser" => $usuario['user_idUser']
            );
            $this->usuarios_model->telefone($telefone);
        }
		public function criarVagas(){
            $usuarioId = $this->session->userdata("usuario_logado");
            $vaga =array(
                "descrição" => $this->input->post("descricao"),
                "cargaHoraria" => $this->input->post("cargaHoraria"),
                "quantidade" => $this->input->post("quantidade"),
                "titulo" => $this->input->post("titulo"),
                "empresa_idEmpresa" => $usuarioId['idEmpresa']
            );
            $idCurso = $this->input->post("curso");
            $this->load->model("usuarios_model");
            $this->usuarios_model->inserirVaga($vaga, $idCurso);
        }

}