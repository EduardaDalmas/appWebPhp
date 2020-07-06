<?php
    class usuario_model extends CI_Model {

        public function pesquisa_usuarios($nome) {
            $this->db->like('nome', $nome);
            $this->db->order_by("nome");
            return $this->db->get('usuarios');
        }

        public function pesquisa_usuarios_pag($limite, $pag, $nome) {
            $this->db->like('nome', $nome);
            $this->db->order_by("nome");
            $this->db->limit($limite, $pag);
            return $this->db->get('usuarios');
        }

        public function getPage($limite, $pag) {
            $this->db->order_by("nome");
            $this->db->limit($limite, $pag);
            return $this->db->get('usuarios');
        }

        public function buscaUsuario($email, $senha) {
            $this->db->where('email', $email);
            $this->db->where('senha', $senha);
            $usuario = $this->db->get("usuarios")->row_array();
            return $usuario;
        }

        public function getUsuarios() {
            $sql = "SELECT * FROM usuarios ORDER BY nome";
            $result = $this->db->query($sql);
            $array_resultado = $result->result_array();
            return $array_resultado;
        }

        public function get($id = null) {
            if ($id) {
                $this->db->where('id', $id);
            }
            $this->db->order_by("nome");
            return $this->db->get('usuarios');

        }

        public function gravar($dados = null, $id = null) {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('usuarios', $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
            if ($this->db->insert('usuarios', $dados)) {
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id = null) 
        {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->delete('usuarios')) {
                    return true;
                } else {
                    return false;
                }
            }
        }

    }
?>