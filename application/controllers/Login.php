<?php
class Login extends CI_Controller {

		public function autenticar(){
            $this->load->model("usuarios_model");
            $email = $this->input->post("email");
            $senha = $this->input->post("senha");
            $usuario = $this->usuarios_model->logarUsers($email, $senha);
            $telefone = $this->usuarios_model->buscarTelefone($usuario);
            print_r($telefone);
            if($telefone){
                $usuario['telefone'] = $telefone;
            }
            if($usuario){
                $this->session->set_userdata("usuario_logado", $usuario);
                $this->session->set_flashdata("succes", "Logado com sucesso!");
                redirect("/empresa");
            }
            else{
                $this->session->set_flashdata("danger", "Usuario ou senha invalidos!");
                redirect("/empresa");
            }

		}
		public function logout(){
            $this->session->unset_userdata("usuario_logado");
            $this->session->set_flashdata("succes", "Deslogado com sucesso!");
            redirect("/empresa");
        }
}