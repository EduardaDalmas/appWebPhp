<?php
    class livro_model extends CI_Model {

        public function pesquisa_livros($nome) {
            $this->db->like('nome', $nome);
            $this->db->order_by("nome");
            return $this->db->get('livros');
        }

        public function pesquisa_livros_pag($limite, $pag, $nome) {
            $this->db->like('nome', $nome);
            $this->db->order_by("nome");
            $this->db->limit($limite, $pag);
            return $this->db->get('livros');
        }

        public function getPage($limite, $pag) {
            $this->db->order_by("nome");
            $this->db->limit($limite, $pag);
            return $this->db->get('livros');
        }

        public function getLivros() {
            $sql = "SELECT * FROM livros ORDER BY nome";
            $result = $this->db->query($sql);
            $array_resultado = $result->result_array();
            return $array_resultado;
        }

        public function get($id = null) {
            if ($id) {
                $this->db->where('id', $id);
            }
            $this->db->order_by("nome");
            return $this->db->get('livros');

        }


        public function gravar($dados = null, $id = null) {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('livros', $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
            if ($this->db->insert('livros', $dados)) {
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id = null) 
        {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->delete('livros')) {
                    return true;
                } else {
                    return false;
                }
            }
        }


    }
?>